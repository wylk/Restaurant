<?php
if(!defined('IN_PLUGIN')) { exit('Access Denied');}

    if (!$_GET['type']) {

        echo (PLUGIN_PATH . PLUGIN_ID . '/template/index.php');
        // die;
       // include(PLUGIN_PATH . PLUGIN_ID . '/template/index.php');
    }