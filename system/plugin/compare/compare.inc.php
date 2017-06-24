<?php
if(!defined('IN_PLUGIN')) {
    exit('Access Denied');
}
// 商品对比
$config = cache('compare', '', 'plugin');
if (IS_POST) {
    // 配置
    cache('geetest_config', $_GET, 'plugin');
    showmessage(lang('finish_config','compare#language'));
} else {
    include(PLUGIN_PATH . PLUGIN_ID . '/template/index.php');
}