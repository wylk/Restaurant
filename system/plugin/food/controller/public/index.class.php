<?php
class index extends init_control
{
    public function _initialize()
    {
        parent::_initialize();
    }
    public function create_company()
    {
        include_once PLUGIN_PATH.PLUGIN_ID.'/template/public/create_company.php';
    }
}