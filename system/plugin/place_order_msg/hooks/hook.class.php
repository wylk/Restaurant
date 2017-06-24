<?php
class plugin_place_order_msg_hook extends plugin{
	public function after_pay_success(&$order_sn) {
		// echo '下单成功钩子';
		$this->execute($order_sn);
	}

	/**
	 * [execute 通知执行接口]
	 */
	public function execute($order_sn,$level = 100){
		$buyer_id = model('order/order')->where(array('sn' => $order_sn))->getField('buyer_id');
		$member['member'] = model('member/member')->where(array('id' => $buyer_id))->find();
		$member['order_sn'] = $order_sn;
		$admin_msg = cache('place_order_msg', '', 'plugin');
		if(isset($admin_msg['phone'])){
	        $admin_msg['phone'] =preg_replace("/(\s)/",'',preg_replace("/(\n)|(\t)|(\')|(')|(，)/" ,',' ,$admin_msg['phone']));
	    }
		if($admin_msg['msg_status'] == 1 && !empty($admin_msg)){
			$member['member']['mobile'] = explode(',',$admin_msg['phone']);    //接受短信的管理员号码
			
			//获取控制台下单成功短信模版
			$cloud = model('admin/cloud','service');
		    $data = $cloud->getsmstpl();
		    foreach ($data['result'] as $k => $v) {
		    	if($v['tpl_type'] == 'n_mobile_plug' && $v['id'] == $admin_msg['template_id']){
		    		$template = $v['content'];
		    	}
		    }
		    
		    //订单信息
		    $order = model('order/order_sub')->where(array('order_sn' => $member['order_sn']))->find();
		    
			//组织模版内容替换
			$setting = cache('setting', '', 'common');
			$replace = array(
				'{username}' => $member['member']['username'] ? $member['member']['username'] : '',
				'{site_name}' => $setting['site_name'],
				'{order_sn}' => $member['order_sn'],
				'{remark}' => $order['remark'] ? $order['remark'] : ' ',
				'{real_price}' => $order['real_price'],
			);
			
			$mobile = $member['member']['mobile'];
			if(!$mobile) break;
			$template_replace = $this->template_replace();
			$format_data = array();
			foreach ($replace as $k => $v) {
				if(!empty($v)){
					$format_data[$template_replace[$k]] = $v;
				}
			}
			foreach ($mobile as $k => $v) {
				$data = array();
				$data['mobile'] = $v;
				$data['tpl_id'] = 224;
				$data['tpl_vars'] = $this->format_sms_data($format_data);

				if(!empty($data)){
					$params = unit::json_encode($data);
					model('notify/queue','service')->add('sms','send',$params,$level);
				} 
			}
		
		}
		return TRUE;
	}

	/**
	 * [template_replace 替换模版内容]
	 * @return [type] [description]
	 */
	public function template_replace(){
		$replace = array(
			'{site_name}' => '{商城名称}',
			'{order_sn}' => '{订单号}',
			'{remark}' => '{描述}',
			'{real_price}' => '{金额}'
		);
		return $replace;
	}

	public function format_sms_data($data){
		foreach ($data as $k => $v) {
			if(preg_match('/\{(.+?)\}/', $k)){
				$_data[preg_replace('/\{(.+?)\}/','$1',$k)] = $v;
			}
		}
		return $_data;
	}


}

