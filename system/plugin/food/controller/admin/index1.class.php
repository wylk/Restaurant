<?php
class index1 extends plugin
{


    public function _initialize()
    {
        parent::_initialize();

    }


    public function test()
    {
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/index.php';
    }

    public function user_list()
    {
        //门店管理
        // echo PLUGIN_PATH.PLUGIN_ID;
        // die;
      $this->display('user-list');
        // include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/user-list.php';
    }
    public function create_shop()
    {
        //创建门店
        $this->display('new-user');
        // include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/new-user.php';
    }
    public function order_list()
    {
        //订单中心
        $this->display('tables');
        // include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/tables.php';
    }
    public function shop_type()
    {
        //门店类型

        $data=model('shop_type')->where(array('cid'=>83))->select();
        $this->assign('data',$data);
        $this->display('shop_type');

    }
    public function create_shop_type()
    {
        //创建门店类型
        if(IS_POST)
        {
            $data=clear_html($_POST);
            $phone='18811480487';

            $result=$this->file_upload($phone);
            $data['type_img']=$result['type_img'];

            $data['cid']=83;
            $data['create_time']=time();
            $return=model('shop_type')->data($data)->add();
            if($return)
            {
                echo "<script>alert('创建成功');history.go(-1);</script>";
                   die;
            }else
            {
                echo "<script>alert('创建失败，请稍后再试');history.go(-1);</script>";
                   die;
            }
        }
        $this->display('create_shop_type');
        // include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/create_shop_type.php';
    }
    public function employee()
    {
        //员工管理
        $this->display('employee');
        // include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/employee.php';
    }
    public function create_employee()
    {
        //创建账号
        $this->display('create_employee');
        // include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/create_employee.php';
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
          $url = clear_html($_FILES);
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