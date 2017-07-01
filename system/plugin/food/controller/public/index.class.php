<?php
class index extends plugin
{
    public function _initialize()
    {
        parent::_initialize();
    }

    public function manager()
    {
        $this->display('manager');
    }

    public function super_login()
    {
      if(IS_POST)
      {
        $data=$this->clear_html($_POST);
        $data1=model('company')->where(array('phone'=>$data['phone']))->find();
        if($data1)
        {
          if($data1['status']==0)
          {
            $this->dexit(array('error'=>1,'msg'=>'正在审核，请耐心等待'));
          }elseif($data1['status']==2)
          {
            $this->dexit(array('error'=>2,'msg'=>'你的审核未通过,请修改','cid'=>$data1['id']));
          }elseif($data1['status']==1)
          {
            //验证密码是否正确
            if(md5($data['password'])!=$data1['password'])
            {
              $this->dexit(array('error'=>1,'msg'=>'密码错误'));
            }else
            {
              //密码正确
              $_SESSION['cid']=$data1['id'];
              $_SESSION['phone']=$data1['phone'];
              $this->dexit(array('error'=>0,'msg'=>'登录成功'));
            }
          }
        }else
        {
          $this->dexit(array('error'=>1,'msg'=>'手机号码不存在，请先注册'));
        }
      }
      $this->display('super_login');
    }
    public function edit_company()
    {
      $data=$this->clear_html($_GET);
      $data1=model('company')->where(array('id'=>$data['cid']))->find();
      if(IS_POST)
      {
        $data2=$this->clear_html($_POST);
        $result=$this->file_upload($data1['phone']);
        // $_count=count($result);
        if($result)
        {
          unlink($data1['licence_path']);
          unlink($data1['frontal_view']);
          unlink($data1['back_view']);
          $data2['licence_path']=$result['licence_path'];
          $data2['frontal_view']=$result['frontal_view'];
          $data2['back_view']=$result['back_view'];

          $data2['status']=0;
          unset($data2['repass']);
          unset($data2['code']);
        }else
        {
          $data2['status']=0;
          unset($data2['repass']);
          unset($data2['code']);
        }
        $data3=model('company')->data($data2)->where(array('id'=>$data2['cid']))->save();
        if($data3)
        {
          echo "<script>alert('修改成功');history.go(-1);</script>";
                die;
        }else
        {
          echo "<script>alert('修改失败，请稍后再试');history.go(-1);</script>";
                die;
        }
      }
      $this->assign('data1',$data1);
      $this->display('edit_company');
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
    //店铺登录
    public  function do_shop_login()
    {
        if (IS_POST) {
            $data=$this->clear_html($_POST);
            $where = "username='".$data['phone']."' or phone='".$data['phone']."' and status=0";

            $employee = model('employee')->where($where)->find();
            if (empty($employee)) {
                $this->dexit(array('error'=>1,'msg'=>'登录名不对'));
            }
            if (md5($data['password']) != $employee['password']) {
                $this->dexit(array('error'=>1,'msg'=>'登录密码不对'));
            }else{
                $_SESSION['employee'] = $employee;
                $this->dexit(array('error'=>0,'msg'=>'登录成功'));
            }
            
        }
        
        $this->display('shop_login');
    }
     //店铺退出登录
    public function do_shop_out_login()
    {
    		if ($_SESSION['cid']) {
    			header('Location:?m=plugin&p=admin&cn=index1&id=food:sit:test');

    		}else{
            unset($_SESSION['employee']);
    		    header('Location:?m=plugin&p=public&cn=index&id=food:sit:manager');
    		}
        
    }

}