<?php
class index extends init_control{

	public function _initialize()
	{
		parent::_initialize();
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

           //var_dump($authInfoA);die;      
        include PLUGIN_PATH.PLUGIN_ID.'/template/shop/public/left_menu.php';
    }

    public function test()
    {
        $this->left_menu();
        include PLUGIN_PATH.PLUGIN_ID.'/template/shop/test.php';
    }

}