<?php
class index extends plugin{
    public $c = '';
    public $mid = '';
	public function _initialize()
	{
		parent::_initialize();
        $urse = model('employee')->where(array('username'=>'test1','password'=>123))->find();
        $_SESSION['employee'] = $urse;
        if (!$_SESSION['employee']) {
         $js = <<<eof
            <script type="text/javascript">
               window.history.go(-1);
            </script>
eof;
            echo $js;  
        }
        $id = $_GET['id'];
        list($id,$module,$c) = explode(':', $id);
        $this->c =  $c;
        $this->mid =  $_SESSION['employee']['shop_id'];
       // var_dump($_SESSION['employee']);die;
    }


    public function doindex()
    {
         $this->displays('index');
    }


    public function left_menu()
    {
        $role= model('store_role')->where(array('store_id'=>1))->find();
        $authInfoA = model('store_auth')
                ->where(array(
                    'auth_level'=>0,
                    'id'=>array('in',$role['role_auth_ids'])))
                ->select();

        //var_dump($authInfoA);die        
        $authInfoB = model('store_auth')
                ->where(array(
                    'auth_level'=>1,
                    'id'=>array('in',$role['role_auth_ids'])))
                ->select();
        $c = $this->c;     
        include PLUGIN_PATH.PLUGIN_ID.'/template/shop/public/left_menu.php';
    }
    //员工列表
    public function do_employee_list()
    {
       
         $employees = model('employee')->where(array('shop_id'=>$this->mid,'status'=>array(' in','0,1')))->select();
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
        $sql = 'select b.is_shopowner from hd_employee as a Left Join hd_store_role as b on a.role_id=b.id where a.id='.$id;
        $datas = model('employee')->query($sql);

        if ($datas[0]['is_shopowner']) {
            $this->dexit(array('error'=>1,'msg'=>'店长不能删除'));  
        }
         
        if (model('employee')->data(array('status'=>2))->where(array('id'=>$id))->save()) {
           $this->dexit(array('error'=>0,'msg'=>'删除成功'));
        }else{
        $this->dexit(array('error'=>1,'msg'=>'删除失败'));
        }

    }

    public function do_employee_add()
    {
        if (IS_POST) {
            $data = $this->clear_thml($_POST);
            $data['shop_id'] = $this->mid;

        }
        $roles = model('store_role')->where(array('store_id'=>$this->mid))->order('id desc')->select();
        $this->displays('employee_add',array('roles'=>$roles));
      
    }
     
     public function do_employee_role()
     {
    
        $role = model('store_role')->where(array('store_id'=>$this->mid))->select();
        $this->displays('employee_role',array('role'=>$role));
     }

     public function do_empolyee_role_del()
     {
         $id = $this->clear_html($_GET['del_id']);
         if (model('store_role')->where(array('id'=>$id))->delete()) {
            $this->dexit(array('error'=>0,'msg'=>'删除成功')); 
         }else{
            $this->dexit(array('error'=>1,'msg'=>'删除成功')); 
         }
     }

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
         foreach($data as $key =>$value)
        {
            $$key=$value;
        }

        $this->left_menu();
        include PLUGIN_PATH.PLUGIN_ID.'/template/shop/'.$c.'.php'; 
     }

}