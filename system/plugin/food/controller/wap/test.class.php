<?php
class test extends plugin
{
	public function index()
	{
		
		$this->display('test-ucenter');

	}

	public function adduser()
	{
		if (IS_POST) {
			$data = $this->clear_html($_POST);
			$uid = uc_user_register($data['username'], $data['password'], $data['email']);
			$this->dexit($uid);
		}

	}
}