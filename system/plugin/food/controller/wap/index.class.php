<?php
class index extends plugin
{

	public function _initialize()
	{
		parent::_initialize();
    }

    public function test()
    {
        $this->display('index1');
    }

}