<?php
class index extends init_control{

	public function _initialize()
	{
		parent::_initialize();
    }

    public function index()
    {
    	$limit = model('app')->select();
        // var_dump($limit);
        echo 'hello';
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/wap/index.php';








        die;

    }
}