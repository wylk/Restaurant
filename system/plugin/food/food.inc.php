<?php
if(!defined('IN_PLUGIN')) { exit('Access Denied');}


    $action = isset($_GET['type'])?$_GET['type']:'index';

    switch ($action) {
    	case 'index':
    			include(PLUGIN_PATH . PLUGIN_ID . '/template/supermaster/main.php');
    		break;

    	case 'doaddrole':
                if (IS_POST) {
                	$data = clear_html($_POST);
                    addrole($data);
                }
    			$authInfo = model('store_auth')->where(array('auth_pid'=>0 ))->select();
    			include(PLUGIN_PATH . PLUGIN_ID . '/template/supermaster/addrole.php');
    		break;

    	case 'doroleLidt':
    		    $authInfo = model('store_auth')->select();
    		    $authInfos = GetTree($authInfo,0,0);
    		    //var_dump($authInfos);die;
    			include(PLUGIN_PATH . PLUGIN_ID . '/template/supermaster/rolelist.php');
    		break;

    	case 'do_del_role':
			if ($_GET) {
				$id = clear_html($_GET['id']);

				if (model('store_auth')->where(array('auth_pid'=>$id))->select()) {
					dexit(array('error'=>1,'msg'=>'还有子类不能删除'));
				}


				if (model('store_auth')->where(array('id'=>$id))->delete()) {
					dexit(array('error'=>0,'msg'=>'删除成功'));
				}else{

					dexit(array('error'=>1,'msg'=>'删除失败'));
				}


			}
    	break;

    	case 'do_up_role':
		    $id = clear_html($_GET['roleid']);
		    $authInfo1 = model('store_auth')->where(array('id'=>$id ))->find();
		    $authInfo = model('store_auth')->where(array('auth_pid'=>0 ))->select();
			include(PLUGIN_PATH . PLUGIN_ID . '/template/supermaster/up_role.php');
    	break;

    	case 'do_update_role':
			if (IS_POST) {
            	$data = clear_html($_POST);
                updaterole($data);
            }
    	break;

    	case 'index1':
    		include(PLUGIN_PATH . PLUGIN_ID . '/template/supermaster/main.php');
    		break;
        case 'shop_manger':
            //分页
            $_count=model('company')->where(array('status'=>0))->count();
            require_once(UPLOAD_PATH.'common_page.class.php');
            $p = new Page($_count, 1);
            $pagebar = $p->show(1);
            $data=model('company')->query('select * from hd_company where status=0 order by addtime desc limit '.$p->firstRow.' ,'.$p->listRows);
            include(PLUGIN_PATH.PLUGIN_ID.'/template/supermaster/shop_manger.php');
            break;
        case 'shop_check':
            $data1=clear_html($_GET);
            if($data1['status']==1)
            {
                //通过
                $return=model('company')->data(array('status'=>1))->where(array('id'=>$data1['id']))->save();
            }elseif($data1['status']==0)
            {
                $return=model('company')->data(array('status'=>2))->where(array('id'=>$data1['id']))->save();
            }
            if($return)
            {
                echo "<script>alert('操作成功');history.go(-1);</script>";
                die;
            }else
            {
                echo "<script>alert('操作失败');history.go(-1);</script>";
                die;
            }
            break;
    	default:
    		# code...
    		break;
    }

   //无限极分类
  	function GetTree($arr,$pid,$step){
	    global $tree;
	    foreach($arr as $key=>$val) {
	        if($val['auth_pid'] == $pid) {
	            $flg = str_repeat('└―',$step);
	            $val['name'] = $flg.$val['name'];
	            $tree[] = $val;
	            GetTree($arr , $val['id'] ,$step+1);
	        }
    	}
    	return $tree;
   }
    //添加权限模块
    function addrole($data)
    {
     	if ($data['auth_pid'] == 0) {
    		$data['auth_level'] = 0;
    	}else{
    		$data['auth_level'] = 1;
    	}

    	if (model('store_auth')->data($data)->add()) {
    		dexit(array('error'=>0,'msg'=>'添加成功'));
    	}else{
    		dexit(array('error'=>0,'msg'=>'添加失败'));
    	}
    }

    function updaterole($data)
    {
    	$id = $data['id'];
    	if (model('store_auth')->where(array('auth_pid'=>$id))->select()) {
    		dexit(array('error'=>1,'msg'=>'还有子类不能修改'));
    	}

     	if ($data['auth_pid'] == 0) {
    		$data['auth_level'] = 0;
    	}else{
    		$data['auth_level'] = 1;
    	}
        unset($data['id']);
    	if (model('store_auth')->data($data)->where(array('id'=>$id))->update()) {
    		dexit(array('error'=>0,'msg'=>'修改成功'));
    	}else{
    		dexit(array('error'=>1,'msg'=>'修改失败'));
    	}
    }

<<<<<<< HEAD
=======
    function clear_html($array)
	{
        if (!is_array($array))
            return trim(htmlspecialchars($array, ENT_QUOTES));
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $this->clear_html($value);
            } else {
                $array[$key] = trim(htmlspecialchars($value, ENT_QUOTES));
            }
        }
        return $array;
	}

	function dexit($data = '')
	{
		if (is_array($data)) {
		    echo json_encode($data);
		} else {
		    echo $data;
		}
		exit();
	}
>>>>>>> 3647bb02e1d51d00de340ea8bcd1782af1c7242a

