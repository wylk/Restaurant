<?php
//接收支付成功的通知，并把状态更改为已支付
$xml=file_get_contents('php://input');//接收传过来的xml数据
//  解析xml
$xml=(array)simplexml_load_string($xml);
//计算签名
$wxsign=$xml['sign'];//先取出对方计算的签名并删除
unset($xml['sign']);
ksort($xml);//以键名排序
$string='';
foreach($xml as $k=>$v)
{
    $string.="$k=$v&";
}
//把秘钥连接到参数上
$string.='key=s04HHQZ8KOrr44xzj0008HJNH8HremXX';
//把链接的字符串全部大写再MD5加密
$sign=strtoupper(md5($string));
if($wxsign==$sign)
{
    if($xml['result_code']=='SUCCESS')
    {
        //把支付状态更改为已支付
        DB::update("update order set is_pay=y where id=?",$xml['out_trade_no']);//伪代码
        //更多操作 更新会员积分等等
    }
}else
{
    die('error~');
}
