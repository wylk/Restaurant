<?php
if (!defined('IN_ADMIN')) {
    exit('Access Denied');
}
$plugins = cache('plugins');
$plugins = $plugins[$_GET['mod']];
$info = cache('order_auto_cancel', '', 'plugin');
if (IS_POST) {
    $status = (int)$_POST['status'];
    $time = (int)$_POST['time'];
    if (!$time > 0) showmessage(lang('right_time', 'order_auto_cancel#language'));
    if (!in_array($status, array(0, 1))) showmessage(lang('not_exist', 'order_auto_cancel#language'));
    $info = cache('order_auto_cancel', $_POST, 'plugin');
    if ($info == ture) {
        showmessage(lang('finish_config', 'order_auto_cancel#language'));
    } else {
        showmessage(lang('config_failed', 'order_auto_cancel#language'));
    }
} else {
    include(PLUGIN_PATH . PLUGIN_ID . '/template/index.php');
}