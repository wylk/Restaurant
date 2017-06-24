<?php
if (!defined('IN_ADMIN')) {
    exit('Access Denied');
}
$plugins = cache('plugins');
$plugins = $plugins[$_GET['mod']];
$config = cache('geetest_config', '', 'plugin');
if (IS_POST) {
    // 配置
    cache('geetest_config', $_GET, 'plugin');
    showmessage(lang('finish_config','geetest#language'));
} else {
    include(PLUGIN_PATH . PLUGIN_ID . '/template/index.php');
}