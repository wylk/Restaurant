<?php
if (!defined('IN_ADMIN')) {
    exit('Access Denied');
}
// 2016.07.20 UEditor编辑器
$plugins = cache('plugins');
$plugins = $plugins[$_GET['mod']];

// 缓存配置文件
$config = cache('ueditor_config', '', 'plugin');

if (IS_POST) {
    // 百度UEditor编辑器模块安装后，用户可以在后台选择，使用默认编辑器还是百度UEditor编辑器
    // 如果选择使用百度UEditor，则后台所有编辑器均替换为百度UEditor
    // 此处要研究的重点是，通知系统中用到了UEditor，但是被我们做了开发，如果这块无法替换为UEditor
    // 则除去通知系统的编辑器，其余所有编辑器进行替换，并且用户可以在后台随意切换要用默认编辑器，还是百度UEditor
    $config = $_GET;
    cache('ueditor_config', $config, 'plugin');
    showmessage(lang('finish_config','ueditor#language'));
} else {
    include(PLUGIN_PATH . PLUGIN_ID . '/template/index.php');
}