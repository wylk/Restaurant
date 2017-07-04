<?php
header("Content-type: text/html; charset=utf-8");
class index extends plugin{
    public $c = '';
    public $mid = '';
	public function _initialize()
	{

		parent::_initialize();
        $id = $_GET['id'];
        $action = $_GET['cn'];
        list($id,$module,$c) = explode(':', $id);
        $this->c =  $c;

        if (isset($_GET['store_id'])) {

            $_SESSION['employee']['shop_id']= $_GET['store_id'];
            $this->mid  = $_SESSION['employee']['shop_id'];
        }else{
            $this->mid = $_SESSION['employee']['shop_id'];

        }

        $nowAC = $action.'-'.$c;
        if (empty($_SESSION['employee']) && empty($_SESSION['cid'])) {
          echo   '<script type="text/javascript"> window.top.location.href = "?m=plugin&p=public&cn=index&id=food:sit:manager";</script>';
        }else{

            if (isset($_SESSION['employee']) && $_SESSION['employee']['role_id'] != 0) {
                $role= model('store_role')->where(array('store_id'=>$this->mid,'id'=>$_SESSION['employee']['role_id']))->find();
            }
            $allAC = "index-doindex,index-left_menu";
            if (strpos($role['role_auth_ac'],$nowAC) === false && strpos($allAC,$nowAC) === false && $_SESSION['employee']['role_id'] != 0 && empty($_SESSION['cid']) ){
                echo "<script>alert('非法访问！');window.history.go(-1);</script>";die;
            }
        }



        //dump($this->mid);die;
    }
    public function do_goods_spec()
    {
      $shop_id=$this->mid;
      if(IS_POST)
      {
        $data=$this->clear_html($_POST);
        $data['shop_id']=$shop_id;
        $data['addtime']=time();
        $datas = [];
        foreach ($data['spec_value'] as $key => $value) {
          foreach ($data['proportion'] as $k => $v) {
             if ($key == $k) {
                $datas[] = array('id'=>$key,'spec_name'=>$value,'proportion'=>$v);
             }
          }
        }
        $data['spec_value'] = json_encode($datas);
        $return=model('food_spec')->data($data)->add();
        if($return)
        {
          echo "<script>alert('添加成功');history.go(-1);</script>";
          die;
        }else
        {
          echo "<script>alert('添加失败，请稍后再试');history.go(-1);</script>";
          die;
        }
      }
      $this->displays('do_goods_spec');
    }
    public function do_spec_add()
    {
      $this->displays('do_spec_add');
    }
    public function do_cat_edit()
    {
      $data=$this->clear_html($_GET);
      $data1=model('food_cat')->where(array('id'=>$data['cid']))->find();
      $data2=model('food_cat')->where(array('shop_id'=>$this->mid,'pid'=>0))->select();
      if(IS_POST)
      {
        $data3=$this->clear_html($_POST);
        $data4=model('food_cat')->data($data3)->where(array('id'=>$data3['cid']))->save();
        if($data4)
        {
          $this->dexit(array('error'=>0,'msg'=>'修改成功'));
        }else
        {
          $this->dexit(array('error'=>1,'msg'=>'修改失败，请稍后再试'));
        }
      }
      $this->displays('do_cat_edit',array('data1'=>$data1,'data2'=>$data2));
    }
    public function do_cat_del()
    {
      //删除分类
      $data=$this->clear_html($_GET);
      $return=model('food_cat')->where(array('id'=>$data['del_id']))->delete();
      if($return)
      {
        $this->dexit(array('error'=>0,'msg'=>'删除成功'));
      }else
      {
        $this->dexit(array('error'=>1,'msg'=>'删除失败，请稍后再试'));
      }
    }
    public function do_goods_cat()
    {
      $shop_id=$this->mid;
      $data1=model('food_cat')->field('id,cat_name')->where(array('shop_id'=>$shop_id,'pid'=>0))->select();
      $data=model('food_cat')->where(array('shop_id'=>$shop_id))->select();
      $data=$this->GetTree($data,0,0);

      $this->displays('do_goods_cat',array('data'=>$data,'data1'=>$data1));
    }

    public function cat_add()
    {
      //添加商品分类
      $shop_id=$this->mid;
      $data=model('food_cat')->where(array('shop_id'=>$shop_id,'pid'=>0))->select();
      if(IS_POST)
      {
        $data=$this->clear_html($_POST);
        $data['shop_id']=$shop_id;
        $data['addtime']=time();

        $return=model('food_cat')->data($data)->add();
        if($return)
        {
          $this->dexit(array('error'=>0,'msg'=>'添加成功'));
        }else
        {
          $this->dexit(array('error'=>0,'msg'=>'添加失败，请稍后再试'));
        }
      }
      $this->displays('cat_add',array('data'=>$data));
    }
    public function do_goods_add()
    {
      $data=model('food_cat')->where(array('shop_id'=>$this->mid))->select();
      $data1=model('food_spec')->query('select distinct spec_name from hd_food_spec where shop_id='.$this->mid.' order by sort desc');
      if(IS_POST)
      {
        $data2=$this->clear_html($_POST);
        $data2['shop_id']=$this->mid;
        $data2['addtime']=time();
        $result=$this->file_upload('18811480487');
        if($result!='')
        {
          $data2['goods_img']=$result['goods_img'];
        }
        $data2['suppy_time']=implode(',',$data2['suppy_time']);

        $return=model('food_goods')->data($data2)->add();
        if($return)
        {
          echo "<script>alert('添加成功');history.go(-1)</script>";
          die;
        }else
        {
          echo "<script>alert('添加失败，请稍后再试');history.go(-1);</script>";
          die;
        }
      }
      $this->displays('do_goods_add',array('data'=>$data,'data1'=>$data1));
    }
    public function doindex()
    {
         $this->displays('index');
    }


    public function left_menu()
    {
        if (isset($_SESSION['cid']) || $_SESSION['employee']['role_id'] == 0) {
            $authInfoA = model('store_auth')->where(array('auth_level'=>0,'is_show'=>1))->select();
            $authInfoB = model('store_auth')->where(array('auth_level'=>1,'is_show'=>1))->select();
        }else{
            $role= model('store_role')->where(array('store_id'=>$this->mid,'id'=>$_SESSION['employee']['role_id']))->find();
            $authInfoA = model('store_auth')
                    ->where(array(
                        'auth_level'=>0,
                        'is_show'=>1,
                        'id'=>array('in',$role['role_auth_ids'])))
                    ->select();

            //var_dump($authInfoA);die
            $authInfoB = model('store_auth')
                    ->where(array(
                        'auth_level'=>1,
                        'is_show'=>1,
                        'id'=>array('in',$role['role_auth_ids'])))
                    ->select();
        }
        $c = $this->c;
        include PLUGIN_PATH.PLUGIN_ID.'/template/shop/public/left_menu.php';
    }
    //员工列表
    public function do_employee_list()
    {

         $employees = model('employee')->where(array('shop_id'=>$this->mid,'status'=>array(' in','0,1'),'role_id'=>array('neq',0)))->select();
         //dump($this->mid);die;
         foreach ($employees as $key => &$v) {
             $roles = model('store_role')->where(array('store_id'=>$this->mid,'id'=>$v['role_id']))->find();
             $v['role_name'] = $roles['role_name'];
         }
        $this->displays('employee_list',array('employees'=>$employees));
    }
   //删除员工
    public function do_empolyee_del()
    {
        $id = $this->clear_html($_GET['del_id']);
        $sql = 'select a.role_id from hd_employee as a Left Join hd_store_role as b on a.role_id=b.id where a.id='.$id;
        $datas = model('employee')->query($sql);

        if ($datas[0]['role_id'] == 0) {
            $this->dexit(array('error'=>1,'msg'=>'店长不能删除'));
        }

        if (model('employee')->data(array('status'=>2))->where(array('id'=>$id))->save()) {
           $this->dexit(array('error'=>0,'msg'=>'删除成功'));
        }else{
        $this->dexit(array('error'=>1,'msg'=>'删除失败'));
        }

    }
    //编辑员工
    public function do_employee_edit()
    {   if (IS_POST) {
            $data = $this->clear_html($_POST);

            $employee = model('employee')->where(array('truename'=>$data['truename'],'status'=>array('in','0,1'),'id'=>array('neq',$data['employee_id'])))->select();
            if ($employee) {
               $this->dexit(array('error'=>1,'msg'=>'真实姓名也存在'));
            }

            $employee1 = model('employee')->where(array('username'=>$data['username'],'status'=>array('in','0,1'),'id'=>array('neq',$data['employee_id'])))->select();
            if ($employee1) {
               $this->dexit(array('error'=>1,'msg'=>'登录账号也存在'));
            }

            $employee2 = model('employee')->where(array('phone'=>$data['phone'],'status'=>array('in','0,1'),'id'=>array('neq',$data['employee_id'])))->select();
            if ($employee2) {
               $this->dexit(array('error'=>1,'msg'=>'手机号码也存在'));
            }

            $employee3 = model('employee')->where(array('email'=>$data['email'],'status'=>array('in','0,1'),'id'=>array('neq',$data['employee_id'])))->select();
            if ($employee3) {
               $this->dexit(array('error'=>1,'msg'=>'邮箱号码也存在'));
            }

            $id = $data['employee_id'];
            unset($data['employee_id']);
            if ($data['password'] == '') {
              unset($data['password']);
            }else{
              $data['password'] = md5($data['password']);
            }

            if (model('employee')->data($data)->where(array('shop_id'=>$this->mid,'status'=>array(' in','0,1'),'id'=>$id))->save()) {
               $this->dexit(array('error'=>0,'msg'=>'修改成功'));
            }else{
                $this->dexit(array('error'=>1,'msg'=>'修改失败'));
            }


        }
        $id = $this->clear_html($_GET['employee_id']);
        $employee = model('employee')->where(array('shop_id'=>$this->mid,'status'=>array(' in','0,1'),'id'=>$id))->find();
        $roles = model('store_role')->where(array('store_id'=>$this->mid))->order('id desc')->select();
        $this->displays('employee_edit',array('employee'=>$employee,'roles'=>$roles));
    }
   //添加员工
    public function do_employee_add()
    {
        if (IS_POST) {
            $data = $this->clear_html($_POST);
            $data['shop_id'] = $this->mid;
            $data['remark'] = '员工';
            $employee = model('employee')->where(array('truename'=>$data['truename'],'status'=>array('in','0,1')))->select();
            if ($employee) {
               $this->dexit(array('error'=>1,'msg'=>'真实姓名也存在'));
            }
            $employee1 = model('employee')->where(array('username'=>$data['username'],'status'=>array('in','0,1')))->select();
            if ($employee1) {
               $this->dexit(array('error'=>1,'msg'=>'登录账号也存在'));
            }
            $employee2 = model('employee')->where(array('phone'=>$data['phone'],'status'=>array('in','0,1')))->select();
            if ($employee2) {
               $this->dexit(array('error'=>1,'msg'=>'手机号码也存在'));
            }
            $employee3 = model('employee')->where(array('email'=>$data['email'],'status'=>array('in','0,1')))->select();
            if ($employee3) {
               $this->dexit(array('error'=>1,'msg'=>'邮箱号码也存在'));
            }
            $data['password'] = md5($data['password']);
            $time = time();
            $data['create_time'] = $time;
            if (model('employee')->data($data)->add()) {
                $this->dexit(array('error'=>0,'msg'=>'添加成功'));
            }else{
                $this->dexit(array('error'=>1,'msg'=>'添加失败'));
            }


        }
        $roles = model('store_role')->where(array('store_id'=>$this->mid))->order('id desc')->select();
        $this->displays('employee_add',array('roles'=>$roles));

    }
     //角色列表
     public function do_employee_role()
     {
        $role = model('store_role')->where(array('store_id'=>$this->mid))->select();
        $this->displays('employee_role',array('role'=>$role));
     }
    //删除角色
     public function do_empolyee_role_del()
     {
         $id = $this->clear_html($_GET['del_id']);
         if (model('store_role')->where(array('id'=>$id))->delete()) {
            $this->dexit(array('error'=>0,'msg'=>'删除成功'));
         }else{
            $this->dexit(array('error'=>1,'msg'=>'删除成功'));
         }
     }
     //添加角色
     public function do_employee_role_add()
     {

        if ($_POST) {
            $datas= $this->clear_html($_POST);
            $ids = rtrim($datas['all_id'],',');

            $auths = model('store_auth')->field('auth_a,auth_c')->where(array('id'=>array('in',$ids)))->select();
            $ac = '';
            foreach ($auths as  $v) {
               $ac.=$v['auth_a'].'-'.$v['auth_c'].',';
            }
            $data['store_id'] = $this->mid;
            $data['role_name'] = $datas['role_name'];
            $data['role_auth_ids'] = $ids;
            $data['role_auth_ac'] =  $ac;

            if (model('store_role')->data($data)->add()) {

                $this->dexit(array('error'=>0,'msg'=>'添加成功'));
            }else{
                $this->dexit(array('error'=>1,'msg'=>'添加失败'));
            }
        }

        // die;
        $auth1 = model('store_auth')->where(array('auth_level'=>0))->select();
        $auth2 = model('store_auth')->where(array('auth_level'=>1))->select();
        // var_dump($auth2);die;
        $this->displays('employee_role_add',array('auth1'=>$auth1,'auth2'=>$auth2));
     }
     #编辑角色
     public function do_employee_role_up()
     {
        if (IS_POST) {
            $datas= $this->clear_html($_POST);
            $ids = rtrim($datas['all_id'],',');

            $auths = model('store_auth')->field('auth_a,auth_c')->where(array('id'=>array('in',$ids)))->select();
            $ac = '';
            foreach ($auths as  $v) {
               $ac.=$v['auth_a'].'-'.$v['auth_c'].',';
            }
            $data['store_id'] = $this->mid;
            $data['role_name'] = $datas['role_name'];
            $data['role_auth_ids'] = $ids;
            $data['role_auth_ac'] =  $ac;

            if (model('store_role')->data($data)->where(array('id'=>$datas['role_id']))->save()) {

                $this->dexit(array('error'=>0,'msg'=>'修改成功'));
            }else{
                $this->dexit(array('error'=>1,'msg'=>'修改失败'));
            }
        }

        $role_id = $this->clear_html($_GET['role_id']);
        $roles = model('store_role')->where(array('id'=>$role_id))->find();
        $auth1 = model('store_auth')->where(array('auth_level'=>0))->select();
        $auth2 = model('store_auth')->where(array('auth_level'=>1))->select();
        $this->displays('employee_role_up',array('auth1'=>$auth1,'auth2'=>$auth2,'roles'=>$roles));
     }



     public function displays($c,$data=array())
     {
         foreach($data as $key =>$value){
            $$key=$value;
        }

        $this->left_menu();
        include PLUGIN_PATH.PLUGIN_ID.'/template/shop/'.$c.'.php';
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
//无限极分类
    public function GetTree($arr,$pid,$step){
      global $tree;
      foreach($arr as $key=>$val) {
          if($val['pid'] == $pid) {
              $flg = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-----',$step);
              $val['name'] = $flg.$val['name'];
              $tree[] = $val;
              $this->GetTree($arr , $val['id'] ,$step+1);
          }
      }
      return $tree;
   }


}