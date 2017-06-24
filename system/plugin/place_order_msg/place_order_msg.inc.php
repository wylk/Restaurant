<?php
if(!defined('IN_ADMIN')) {
    exit('Access Denied');
}
$plugins = cache('plugins');
$plugins = $plugins[$_GET['mod']];
$info = cache('place_order_msg', '', 'plugin');
if(IS_POST){
    $info = cache('place_order_msg', $_POST, 'plugin');
    if($info == ture){
        showmessage(lang('_operation_success_'));
    }else{
        showmessage(lang('_operation_fail_'));
    }
}else{
    include(PLUGIN_PATH . PLUGIN_ID . '/template/index.php');
}