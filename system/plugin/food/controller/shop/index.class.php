<?php
class index extends init_control{
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
        $this->left_menu();
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/shop/index.php'; 
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

    public function do_employee_list()
    {
       
         $employees = model('employee')->where(array('shop_id'=>$this->mid,'status'=>array(' in','0,1')))->select();
         foreach ($employees as $key => &$v) {
             $roles = model('store_role')->where(array('store_id'=>$this->mid,'id'=>$v['role_id']))->find();
             $v['role_name'] = $roles['role_name'];
         }
        $this->left_menu();
        include PLUGIN_PATH.PLUGIN_ID.'/template/shop/do_employee_list.php';
    }

    public function do_empolyee_del()
    {

    }

}