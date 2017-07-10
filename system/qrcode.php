<?php
define('PIGCMS_PATH', dirname(__FILE__).'/');
$table_id = $_GET['table_id'];
$shop_id = $_GET['shop_id'];
//$url = 'http://hd.com/index.php?m=plugin&p=wap&cn=index&id=food:sit:test&table_id='.$table_id.'&shop_id='.$shop_id;
$url = 'http://hd.com';
$url = str_replace('&amp;', '&', $url);
include_once PIGCMS_PATH."library/phpqrcode.class.php";
QRcode::png(urldecode($url),false,2,7,2);
?>