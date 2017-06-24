<?php
class index extends init_control{

	public function _initialize()
	{
		parent::_initialize();
    }

    public function test()
    {
        echo 'ok';
        echo FOOD_PATH;
    }

    public function test1()
    {
        $limit = model('app')->select();

        include_once PLUGIN_PATH.PLUGIN_ID.'/template/wap/index.php';
    }
}