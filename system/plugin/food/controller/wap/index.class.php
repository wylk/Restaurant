<?php
class index extends init_control{

	public function _initialize()
	{
		parent::_initialize();
    }
<<<<<<< HEAD
    
    public function test()
    {
        echo 'ok';
=======

    public function test()
    {
        echo 'ok';
        echo FOOD_PATH;
    }

    public function test1()
    {
        $limit = model('app')->select();

        include_once PLUGIN_PATH.PLUGIN_ID.'/template/wap/index.php';
>>>>>>> e2a1e5c899f283938f7c27a06693520088530b3e
    }

    public function test1()
    {
        $limit = model('app')->select();
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/wap/index.php';
    }
}