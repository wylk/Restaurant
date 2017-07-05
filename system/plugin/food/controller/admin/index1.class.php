<?php
class index1 extends plugin
{


    public function _initialize()
    {
        parent::_initialize();
        if(empty($_SESSION['cid']))
        {
            header('Location:?m=plugin&p=public&cn=index&id=food:sit:super_login');
        }

    }

    public function logout()
    {
        $_SESSION=[];

        header('Location:?m=plugin&p=public&cn=index&id=food:sit:super_login');

    }
    public function test()
    {
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/index.php';
    }

    public function user_list()
    {
        //门店管理
        $cid=$_SESSION['cid'];
        $_count=model('shop')->where(array('company_id'=>$cid))->count();
        require_once(UPLOAD_PATH.'common_page.class.php');
        $p = new Page($_count, 10);
        $pagebar = $p->show(10);
        if(IS_POST)
        {
            $data=$this->clear_html($_POST);
            if($data['shop_name'])
            {
                $where=' and a.shop_name="'.$data['shop_name'].'"';
                $data1=model('shop')->where(array('shop_name'=>$data['shop_name']))->find();
                $this->assign('data1',$data1);
            }else
            {
                $where='';
            }

        }

        $data=model('shop')->query('select a.*,b.typename from hd_shop as a left join hd_shop_type as b on a.type_id=b.id where a.company_id='.$cid.$where.'  order by a.add_time desc limit '.$p->firstRow.','.$p->listRows);
        $this->assign('pagebar',$pagebar);
        $this->assign('data',$data);
        $this->display('user_list');

    }
    public function shop_edit()
    {
        //门店修改
        $data=$this->clear_html($_GET);
        $data1=model('shop')->where(array('id'=>$data['bid']))->find();
        $data2=model('shop_type')->select();
        if(IS_POST)
        {
            $data3=$this->clear_html($_POST);
            // $this->dexit(array('error'=>0,'msg'=>$data3['bid']));
            $data4=model('shop')->data($data3)->where(array('id'=>$data3['bid']))->save();
            if($data4)
            {
                $this->dexit(array('error'=>0,'msg'=>'修改成功'));
            }else
            {
                $this->dexit(array('error'=>1,'msg'=>'修改失败，请稍后再试'));
            }
        }
        $this->assign(array('data1'=>$data1,'data2'=>$data2));
        $this->display('shop_edit');
    }
    public function shop_del()
    {
        //门店删除
        $data=$this->clear_html($_GET);
        $data1=model('shop')->where(array('id'=>$data['bid']))->delete();
        if($data1)
        {
            echo "<script>alert('删除成功');history.go(-1);</script>";
                   die;
        }else
        {
            echo "<script>alert('删除失败，请稍后再试');history.go(-1);</script>";
                   die;
        }
    }
    public function create_shop()
    {
        $cid=$_SESSION['cid'];
        //创建门店
        $data=model('shop_type')->where(array('cid'=>$cid))->select();
        if(IS_POST)
        {
            $data=$this->clear_html($_POST);
            $data['add_time']=time();
            $data['company_id']=$cid;
            $data1=model('shop')->data($data)->add();
            if($data1)
            {
                $this->dexit(array('error'=>0,'msg'=>'创建成功'));
            }else
            {
                $this->dexit(array('error'=>1,'msg'=>'创建失败，请稍后再试'));
            }
        }
        $this->assign('data',$data);
        $this->display('new_user');

    }
    public function order_list()
    {
        //订单中心
        var_dump($_SESSION['cid']);
        die;
        $this->display('tables');

    }
    public function shop_type()
    {
        //门店类型
        $cid=$_SESSION['cid'];
        $_count=model('shop_type')->where(array('cid'=>$cid))->count();
        require_once(UPLOAD_PATH.'common_page.class.php');
        $p = new Page($_count, 10);
        $pagebar = $p->show(10);
        if(IS_POST)
        {
            $data1=$this->clear_html($_POST);

            if($data1['typename'])
            {
                $where=" and typename='".$data1['typename']."'";
                $data2=model('shop_type')->where(array('typename'=>$data1['typename']))->find();

                $this->assign('data2',$data2);
            }else
            {
                $where='';
            }

        }
        $data=model('shop_type')->query('select * from hd_shop_type where cid='.$cid.$where.' order by create_time desc limit '.$p->firstRow.','.$p->listRows);
        $this->assign('pagebar',$pagebar);
        $this->assign('data',$data);
        $this->display('shop_type');

    }
    public function shop_type_del()
    {
        //删除门店类型
        $data=$this->clear_html($_GET);
        $data1=model('shop_type')->where(array('id'=>$data['sid']))->delete();
        if($data1)
        {
            echo "<script>alert('删除成功');history.go(-1);</script>";
                   die;
        }else
       {
            echo "<script>alert('删除失败，请稍后再试');history.go(-1);</script>";
                   die;
       }

    }
    public function shop_type_edit()
    {
        //编辑门店类型
        $data=$this->clear_html($_GET);
        $data1=model('shop_type')->where(array('id'=>$data['sid']))->find();
        if(IS_POST)
        {
            $data2=$this->clear_html($_POST);
            $result=$this->file_upload($_SESSION['phone']);
            if($result)
            {
                unlink($data1['type_img']);
                $data2['type_img']=$result['type_img'];
            }

            $data3=model('shop_type')->data($data2)->where(array('id'=>$data2['sid']))->save();
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
        $this->display('shop_type_edit');
    }
    public function create_shop_type()
    {
        //创建门店类型
        if(IS_POST)
        {
            $cid=$_SESSION['cid'];
            $data=$this->clear_html($_POST);
            $phone=$_SESSION['phone'];

            $result=$this->file_upload($phone);
            $data['type_img']=$result['type_img'];

            $data['cid']=$cid;
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

    }
    public function employee()
    {
        //员工管理
        $cid=$_SESSION['cid'];
        $shop=model('shop')->field('id')->where(array('company_id'=>$cid))->select();
        $shop_id = '';
        foreach ($shop as $key => $v) {
           $shop_id.=$v['id'].',';
        }
        $shop_id = rtrim($shop_id,',');
        $where = 'role_id=0 and shop_id in ('.$shop_id.')';
        $_count=model('employee')->where($where)->count();
        require_once(UPLOAD_PATH.'common_page.class.php');
        $p = new Page($_count, 10);
        $pagebar = $p->show(10);
        if(IS_POST)
        {
            $data1=$this->clear_html($_POST);
            if($data1['truename'])
            {
                $where1=" and a.truename='".$data1['truename']."'";
                $data2=model('employee')->where(array('truename'=>$data1['truename']))->find();
                $this->assign('data2',$data2);
            }else
            {
                $where1='';
            }

        }

        $data=model('employee')->query('select a.*,b.shop_name from hd_employee as a left join hd_shop as b on a.shop_id=b.id where a.role_id=0  '.$where1.' and a.shop_id in ('.$shop_id.')  order by a.create_time desc limit '.$p->firstRow.','.$p->listRows);

        $this->assign('pagebar',$pagebar);
        $this->assign('data',$data);
        $this->display('employee');

    }
    public function employee_edit()
    {
        $cid=$_SESSION['cid'];
        $data=$this->clear_html($_GET);
        $data1=model('employee')->where(array('id'=>$data['bid']))->find();
        $data2=model('shop')->where(array('company_id'=>$cid))->select();
        if(IS_POST)
        {
            $data3=$this->clear_html($_POST);
            $data3['password']=md5($data3['password']);
            $data4=model('employee')->data($data3)->where(array('id'=>$data3['bid']))->save();
            if($data4)
            {
                $this->dexit(array('error'=>0,'msg'=>'修改成功'));
            }else
            {
                $this->dexit(array('error'=>1,'msg'=>'修改失败，请稍后再试'));
            }
        }
        $this->assign(array('data1'=>$data1,'data2'=>$data2));
        $this->display('employee_edit');
    }
    public function employee_del()
    {
        $data=$this->clear_html($_GET);
        $data1=model('employee')->where(array('id'=>$data['bid']))->delete();
        if($data1)
        {
            echo "<script>alert('删除成功');history.go(-1);</script>";
                   die;
        }else
        {
            echo "<script>alert('删除失败，请稍后再试');history.go(-1);</script>";
                   die;
        }
    }
    public function create_employee()
    {
        //创建账号
        $cid=$_SESSION['cid'];
        $data=model('shop')->where(array('company_id'=>$cid))->select();
        if(IS_POST)
        {
            $data1=$this->clear_html($_POST);
            $data1['password']=md5($data1['password']);
            $data1['create_time']=time();
            $data1['company_id']=$cid;
            $data2=model('employee')->data($data1)->add();

            if($data2)
            {
                $this->dexit(array('error'=>0,'msg'=>'店长账号创建成功'));
            }else
            {
                $this->dexit(array('error'=>1,'msg'=>'店长账号创建失败，请稍后再试'));
            }
        }
        $this->assign('data',$data);
        $this->display('create_employee');

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