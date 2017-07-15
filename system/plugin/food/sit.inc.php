<?php
if (!defined('IN_PLUGIN')) { exit('Access Denied');}
    $a = isset($_GET['p'])?$_GET['p']:'wap';
    $b = isset($_GET['cn'])?$_GET['cn']:'index';
    $file_plugin_url = PLUGIN_PATH.$id.'/controller/plugin.class.php';
    require_once $file_plugin_url;

    $file_url = PLUGIN_PATH.$id.'/controller/'.$a.DIRECTORY_SEPARATOR.$b.'.class.php';
    // echo $file_url;die;
    require_once $file_url;
    require_once PLUGIN_PATH.$id.'/ucenter-config.php';
    require_once APP_ROOT.'uc_client/client.php';
    if (class_exists($b)) {
         call_user_func_array(array(new $b, $c),array());

    }



