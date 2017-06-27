<?php
class index1 extends init_control
{
    public function _initialize()
    {
        parent::_initialize();
    }


    public function test()
    {
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/index.php';
    }
    public function user_list()
    {
        //门店管理
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/user-list.php';
    }
    public function create_shop()
    {
        //创建门店
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/new-user.php';
    }
    public function order_list()
    {
        //订单中心
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/tables.php';
    }
    public function shop_type()
    {
        //门店类型
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/shop_type.php';
    }
    public function create_shop_type()
    {
        //创建门店类型
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/create_shop_type.php';
    }
    public function employee()
    {
        //员工管理
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/employee.php';
    }
    public function create_employee()
    {
        //创建账号
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/create_employee.php';
    }

}