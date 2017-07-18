<?php
class pay{

	public function paying($fee,$goods_name,$truename,$appid,$apiSecret,$mch_id,$openid,$trade_no)
	{
		$api='https://lepay.51ao.com/pay/api';
		//构造参数
		$data=[
		'appid'=>$appid,
		'mch_id'=>$mch_id,
		'openid'=> $openid,
		'goods_name'=>$goods_name,
		'out_trade_no'=>$trade_no,
		'total_fee'=>$fee*100,//单位是分
		'notify_url'=>'https://ct.51ao.com/index.php?m=plugin&p=wap&cn=index&id=food:sit:weixinPay',
		'tname'=>$truename,
		'trade_type'=>'NATIVE',
		];
		ksort($data);//以键名排序
		$string='';
		foreach($data as $k=>$v)
		{
		    $string.="$k=$v&";
		}
		//把秘钥连接到参数上
		$string.='key='.$apiSecret;
		//把链接的字符串全部大写再MD5加密
		$sign=strtoupper(md5($string));
		//把参数和签名放到一起
		$data['sign']=$sign;
		//参数转成xml
		$xml='<xml>';
		foreach($data as $k=>$v)
		{
		    $xml.="<$k>$v</$k>";
		}
		$xml.='</xml>';

		$ret=$this->post($api,$xml);
		return $ret;
		}
	// var_dump($ret);

	public function post($url, $data = '', $isHttps = TRUE)
	{
	    // 创建curl对象
	    $ch = curl_init ();
	    // 配置这个对象
	    curl_setopt ( $ch, CURLOPT_URL, $url);  // 请求的URL地址
	    if($isHttps)
	    {
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
	        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); // 从证书中检查SSL加密算法是否存在
	    }
	    curl_setopt ( $ch, CURLOPT_POST, 1);  // 是否是POST请求
	    curl_setopt ( $ch, CURLOPT_HEADER, 0);  // 去掉HTTP协议头
	    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1);  // 返回接口的结果，而不是输出
	    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data);  // 提交的数据
	    // 发出请求
	    $return = curl_exec ( $ch );
	    // 关闭对象
	    curl_close ( $ch );
	    // 返回数据
	    return $return;
	 }
	}
 //    header("Content-type: text/html; charset=utf-8");
	// $pay = new pay();
	// $fee = 1;
	// $apiSecret = '175608b1d03d9acd88155d1a64936a5b';
	// $trade_no = '201707131109';
	// $pay ->paying($fee,$apiSecret,$trade_no);