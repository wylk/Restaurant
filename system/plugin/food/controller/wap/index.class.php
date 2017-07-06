<?php
class index extends plugin{

	public function _initialize()
	{
		parent::_initialize();
    }


    public function test()
    {
        $this->display('index1');
    }
    // public function test()
    // {
    //     echo 'ok';
    //     echo FOOD_PATH;
    // }

    public function test1()
    {
        $limit = model('app')->select();

        include_once PLUGIN_PATH.PLUGIN_ID.'/template/wap/index.php';

    }

}