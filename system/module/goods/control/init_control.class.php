<?php
class init_control extends control
{
	//public $arrays = array();
	public function _initialize() {
		defined('IN_PLUGIN') OR define('IN_PLUGIN', TRUE);
		parent::_initialize();
		$this->member = $this->load->service('member/member')->init();
		$this->load->librarys('View')->assign('member',$this->member);
		define('SKIN_PATH', __ROOT__.(str_replace(DOC_ROOT, '', TPL_PATH)).config('TPL_THEME').'/');
		$cloud =  unserialize(authcode(config('__cloud__','cloud'),'DECODE'));
		define('SITE_AUTHORIZE', (int)$cloud['authorize']);
		define('COPYRIGHT', 'Powered by <a href="http://www.haidao.la/" target="_blank">Haidao</a> '.HD_VERSION.'<br/>© 2013-2016 Dmibox Inc.');
		/* 检测商城运营状态 */
		runhook('site_isclosed');
	}
	/*public function display($a)
	{

		 foreach($this->arrays as $key =>$value)
        {
            $$key=$value;
        }

	    include_once(DISPLAY_PATH.$_GET['p'].'/'.$a.'.php');
	}
	public function assign($field, $value = '')
	{
		if (!empty($value)) {
			 $this->arrays[$field] = $value;
		}
		else if (is_array($field)) {
			foreach ($field as $key => $value) {
				$this->arrays[$key] = $value;
			}
		}
		else {
			 $this->arrays[$field] = $value;
		}
	}*/
}