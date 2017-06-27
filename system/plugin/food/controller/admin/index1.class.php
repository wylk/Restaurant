<?php
class index1 extends init_control
{
    public function _initialize()
    {
        parent::_initialize();
    }

    // public function index1()
    // {
    //     $setting = model('app')->select();
    //     var_dump($setting);
    //     die;

    // }
    public function test()
    {
         // echo APP_PATH;
         //  die;
        // die;
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/index.html';
    }

}