<?php
class index extends plugin
{
    public function _initialize()
    {
        parent::_initialize();
    }
    public function create_company()
    {
        if(IS_POST)
        {
            $data=$this->clear_html($_POST);

            $result=$this->file_upload($data['phone']);
            $data['licence_path']=$result['licence_path'];
            $data['frontal_view']=$result['frontal_view'];
            $data['back_view']=$result['back_view'];
            $data['password']=md5($data['password']);
            $data['addtime']=time();
            unset($data['code']);

            $return=model('company')->data($data)->add();

            if($return)
            {
                // echo 'success';
                echo "<script>alert('创建成功');location.href='?m=plugin&p=admin&cn=index1&id=food:sit:test'</script>";
                die;
            }else
            {
                // echo 'fail';
                echo "<script>alert('创建失败，请稍后再试');history.go(-1)</script>";
                die;
            }

        }
       $this->display('create_company');
    }

    public function validate_company_name()
    {
        if(IS_POST)
        {
            $data=$this->clear_html($_POST);
            $return=model('company')->where(array('company_name'=>$data['company_name']))->find();
            if($return)
            {
                $this->dexit(array('valid'=>false));
            }else
            {
                $this->dexit(array('valid'=>true));
            }
        }
    }
    public function file_upload($phone)
    {
        require_once(UPLOAD_PATH.'upload/UploadTp.class.php');
        $up = new FileUpload();
        $up -> set("path", "./uploadfile/images/");
        $up -> set("maxsize", 5120000);
        $up -> set("allowtype", array("png", "jpg","jpeg"));
        $up -> set("israndname", true);
        $up->path .= $phone.'/';

            if(!file_exists($up->path))//文件夹不存在，先生成文件夹
            {
                mkdir($up->path);
            }



        $urlarr=array();
        if($_FILES)
        {
          $url = $this->clear_html($_FILES);
          foreach ($url as $k =>  $v) {
             if($v['size'] > 5120000)
               {

                   echo "<script>alert('上传图片不能超过5120kb！');window.history.go(-1);</script>";
                   die;
               }

             if($v['error']===0)
             {
                //使用Upload.class.php功能类，实现附件上传

                   if($up -> upload($v))
                         {
                            $bigPathName = $up ->path.$up->getFileName();
                              //echo $bigPathName;
                            $urlarr[$k] =  $bigPathName;
                              //var_dump($urlarr[$k]);die;

                          }

               }


           }
           return   $urlarr;

          }
    }

}