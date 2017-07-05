<?php
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

        if ($_SESSION['cid']) {
            $cid = $_SESSION['cid'];
            if (!model('shop')->where(array('company_id'=>$cid,'id'=>$this->mid))->find()) {
                echo "<script>alert('非法访问！');window.history.go(-1);</script>";die;   
            }
            
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
        

        
        //dump($_SESSION);die;
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
            $shop = model('shop')->where(array('id'=>$this->mid))->find();
            $data['company_id'] = $shop['company_id'];
            
            
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
    
    //餐桌管理
    public function do_shop_table()
    {
        $this->displays('shop/shop_table');

    }

    //添加餐桌
    public function do_shop_table_add()
    {
        if (IS_POST) {
            $data = $this->clear_html($_POST);
            $data['store_id'] = $this->mid; 
             $this->dexit(['error'=>0,'msg'=>$data]);
        }

        $datas = model('food_shop_tablezones')->field('id,title')->where(array('status'=>1,'store_id'=>$this->mid))->order('displayorder asc')->select();
        $printlabel = model('food_shop_print_label')->field('id,title')->where(array('status'=>1,'store_id'=>$this->mid))->order('displayorder asc')->select();
        $this->displays('shop/shop_table_add',array('datas'=>$datas,'printlabel'=>$printlabel));  
    }

    public function do_shop_table_printlabel_add()
    {
        if (IS_POST) {
            $data = $this->clear_html($_POST);
            $data['store_id'] = $this->mid;
            if (model('food_shop_print_label')->data($data)->add()) {
                $this->dexit(['error'=>0,'msg'=>'添加成功']); 
            }else{
                $this->dexit(['error'=>1,'msg'=>'添加失败']);
            }
        }

        $this->displays('shop/shop_table_printlabel_add');
    
    }

    //餐桌类型管理
    public function do_shop_table_type()
    {
        $datas = model('food_shop_tablezones')->where(array('status'=>1,'store_id'=>$this->mid))->order('displayorder asc')->select();
        //dump($datas);die;
        $this->displays('shop/shop_table_type',array('datas'=>$datas));

    }
    //餐桌类型排序
    public function do_shop_table_type_order()
    {
        $data = $this->clear_html($_POST);
        $ids = explode(',',rtrim($data['table_id'],','));
        $vs = explode(',',rtrim($data['orders'],','));
        $status = [];
        foreach ($ids as $k => $v) {
           foreach ($vs as $key => $value) {
              if ($k == $key) {
                $status[] = model('food_shop_tablezones')->data(array('displayorder'=>$value,'store_id'=>$this->mid))->where(array('id'=>$v))->save();  
              }
           }
        }
        if ($status) {
            $this->dexit(array('error'=>0,'msg'=>'修改成功'));
            
        }else{
            
            $this->dexit(array('error'=>0,'msg'=>'修改失败'));

        }
    }

    //餐桌类型删除
    public function do_shop_table_type_del()
    {
        $id = $this->clear_html($_GET['del_id']);
        if (model(food_shop_tablezones)->where(array('id'=>$id,'store_id'=>$this->mid))->delete()) {
            $this->dexit(array('error'=>0,'msg'=>'删除成功'));  
        }else{

            $this->dexit(array('error'=>1,'msg'=>'删除失败'));
        }
           
    }

    //编辑餐桌类型
    public function do_shop_table_type_edit()
    {
        if (IS_POST) {
            $data = $this->clear_html($_POST);
            $id = $data['order_id'];
            unset($data['order_id']);
            if (model('food_shop_tablezones')->data($data)->where(array('id'=>$id,'store_id'=>$this->mid))->save()) {
                $this->dexit(array('error'=>0,'msg'=>'修改成功'));
               
            }else{

                $this->dexit(array('error'=>1,'msg'=>'修改失败'));
            }

        }

        $id = $_GET['type_id'];
        $datas = model('food_shop_tablezones')->where(array('id'=>$id,'store_id'=>$this->mid))->find();
        $this->displays('shop/shop_table_type_edit',array('datas' =>$datas));
    }
    //添加餐桌类型
    public function do_shop_table_type_add()
    {
        if (IS_POST) {
           $data = $this->clear_html($_POST);
           $data['store_id'] = $this->mid;

           if (model('food_shop_tablezones')->data($data)->add()) {
                $this->dexit(array('error'=>0,'msg'=>'添加成功'));
           }else{
                $this->dexit(array('error'=>1,'msg'=>'添加失败'));
           }
        }
        $this->displays('shop/shop_table_type_add');

    }

    //排队管理
    public function do_shop_queue()
    {
        $this->displays('shop/shop_queue');

    }
    
    //预定管理
    public function do_shop_reserve()
    {
        $this->displays('shop/shop_reserve');
    }
     
    public function displays($c,$data=array())
    {
        foreach($data as $key =>$value){
            $$key=$value;
        }

        $this->left_menu();
        include PLUGIN_PATH.PLUGIN_ID.'/template/shop/'.$c.'.php'; 
    }

}