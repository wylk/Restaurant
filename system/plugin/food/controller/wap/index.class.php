<?php
class index extends plugin
{
    protected $mid;
    protected $table_id;
    protected $uid;
    protected $order_id;
	public function _initialize()
	{
		parent::_initialize();
        // $mid=isset($_SESSION['employee']['shop_id'])?$_SESSION['employee']['shop_id']:$GET['shop_id'];
        $mid=isset($_SESSION['shop_id'])?$_SESSION['shop_id']:'';
        $this->mid=$mid;
        // $table_id=$_GET['table_id'];
        // $_SESSION['table_id']=$table_id;
        $table_id=isset($_SESSION['table_id'])?$_SESSION['table_id']:'';
        $this->table_id=$table_id;
        // echo $this->table_id;
        // die;
        $this->uid=6;
        // if(empty($this->table_id))
        // {
        //     echo "<script>alert('没有获取到桌号，请稍后再试');history.go(-1);</script>";
        //     die;
        // }
    }
    public function all_order()
    {
        $data=model('food_order')->query('SELECT a . * , b.shop_name
        FROM  `hd_food_order` AS a
        LEFT JOIN hd_shop AS b ON a.shop_id = b.id
        WHERE a.status in(1,2,3)
        AND a.uid ='.$this->uid);
        $data1=[];
        foreach($data as $v)
        {
            $data1[]=model('food_order_goods')->query('select a.*,b.goods_img,b.goods_name from hd_food_order_goods as a left join hd_food_goods as b on a.goods_id=b.id where a.order_id='.$v['id']);
        }
        $this->assign(array('data'=>$data,'data1'=>$data1));
        $this->display('all_order');
    }
    public function cart_list()
    {
        //购物车
        $data=model('food_cart')->query('select a.* from hd_shop as a left join hd_food_cart as b on a.id=b.shop_id where b.uid='.$this->uid.' group by a.id');
        $data1=model('food_cart')->query('select a.*,b.goods_name,b.goods_img,c.cat_name from hd_food_cart as a left join hd_food_goods as b on a.goods_id=b.id left join hd_food_cat as c on b.cat_id=c.id where a.uid='.$this->uid);
        $this->assign(array('data'=>$data,'data1'=>$data1));
        $this->display('cart_list');
    }
    public function done()
    {
        $data=model('food_order')->query('SELECT a . * , b.shop_name
        FROM  `hd_food_order` AS a
        LEFT JOIN hd_shop AS b ON a.shop_id = b.id
        WHERE a.status =3
        AND a.uid ='.$this->uid);
        $data1=[];
        foreach($data as $v)
        {
            $data1[]=model('food_order_goods')->query('select a.*,b.goods_img,b.goods_name from hd_food_order_goods as a left join hd_food_goods as b on a.goods_id=b.id where a.order_id='.$v['id']);
        }
        $this->assign(array('data'=>$data,'data1'=>$data1));
        $this->display('done');
    }
    public function paid()
    {
        $data=model('food_order')->query('SELECT a . * , b.shop_name
        FROM  `hd_food_order` AS a
        LEFT JOIN hd_shop AS b ON a.shop_id = b.id
        WHERE a.status =2
        AND a.uid ='.$this->uid);
        $data1=[];
        foreach($data as $v)
        {
            $data1[]=model('food_order_goods')->query('select a.*,b.goods_img,b.goods_name from hd_food_order_goods as a left join hd_food_goods as b on a.goods_id=b.id where a.order_id='.$v['id']);
        }
        $this->assign(array('data'=>$data,'data1'=>$data1));
        $this->display('paid');
    }
    public function unpay()
    {
        $data=model('food_order')->query('SELECT a . * , b.shop_name
        FROM  `hd_food_order` AS a
        LEFT JOIN hd_shop AS b ON a.shop_id = b.id
        WHERE a.status =1
        AND a.uid ='.$this->uid);
        $str='';
        $data1=[];
        foreach($data as $v)
        {
            $data1[]=model('food_order_goods')->query('select a.*,b.goods_img,b.goods_name from hd_food_order_goods as a left join hd_food_goods as b on a.goods_id=b.id where a.order_id='.$v['id']);
        }
        $this->assign(array('data'=>$data,'data1'=>$data1));
        $this->display('unpay');
    }
    //我的订单页面
    public function myindex()
    {
        // select a.*,b.*,c.goods_name,c.goods_img from hd_food_order as a left join hd_food_order_goods as b on a.id=b.order_id left join hd_food_goods as c on c.id=b.goods_id where a.status=1 and a.uid=6        //未支付

        $this->display('myindex');
    }
    public function dc()
    {

        $this->display('dc');
    }
    public function edit_default()
    {
        $data=$this->clear_html($_GET);
        $return=model('food_user_address')->data(array('is_default'=>0))->where(array('uid'=>$this->uid))->save();
        if($return)
        {
            $return1=model('food_user_address')->data(array('is_default'=>1))->where(array('uid'=>$this->uid,'id'=>$data['aid']))->save();
            if($return1)
            {
                echo "<script>alert('应用新地址成功');history.go(-1);</script>";
                die;
            }else
            {
                echo "<script>alert('网络错误，请稍后再试');history.go(-1);</script>";
                die;
            }
        }
    }
    public function del_address()
    {

        $data=$this->clear_html($_POST);
        $return=model('food_user_address')->where(array('id'=>$data['aid']))->delete();
        if($return)
        {
            $this->dexit(array('error'=>0,'msg'=>'删除成功'));
        }else
        {
            $this->dexit(array('error'=>1,'msg'=>'删除失败'));
        }



    }
    public function edit_address()
    {
        $data=$this->clear_html($_GET);
        $data1=model('food_user_address')->where(array('id'=>$data['aid']))->find();
        if(IS_POST)
        {
            $data3=$this->clear_html($_POST);
            $return=model('food_user_address')->data($data3)->where(array('id'=>$data['aid']))->save();
            if($return)
            {
                $this->dexit(array('error'=>0,'msg'=>'修改成功'));
            }else
            {
                $this->dexit(array('error'=>1,'msg'=>'修改失败'));
            }
        }
        $this->assign(array('data1'=>$data1));
        $this->display('edit_address');
    }
    public function address_list()
    {
        $data=model('food_user_address')->where(array('uid'=>$this->uid))->order('is_default desc')->select();
        // var_dump($data);
        // die;
        $this->assign(array('data'=>$data));
        $this->display('address_list');
    }
    public function weixinPay()
    {
        // // $data=$this->clear_html($_GET);
        // // $this->display()
        // echo $_SESSION['cid'];
        // file_put_contents('./1.txt','hello');
        // echo '微信支付';
        $xml = file_get_contents('php://input');
        $array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        var_dump($array_data);

    }
    public function add_address()
    {
        $return1=model('food_user_address')->where(array('uid'=>$this->uid))->count('id');
        if(IS_POST)
        {
            $data=$this->clear_html($_POST);
            // $this->dexit(array('error'=>0,'msg'=>$data['detail']));
            $data['uid']=$this->uid;
            $data['addtime']=time();
            if($return1==0)
            {
                $data['is_default']=1;
            }
            $return=model('food_user_address')->data($data)->add();
            if($return)
            {
                $this->dexit(array('error'=>0,'msg'=>'添加成功'));
            }else
            {
                $this->dexit(array('error'=>1,'msg'=>'添加失败'));
            }
        }
        $this->display('add_address');
    }
    public function confirmPay()
    {
        $data=$this->clear_html($_GET);
        $shop=model('shop')->where(array('id'=>$this->mid))->find();
        $data1=model('food_order_goods')->query('select a.*,b.goods_img,b.goods_name from hd_food_order_goods as a left join hd_food_goods as b on a.goods_id=b.id where a.order_id='.$data['order_id']);
        $data2=model('food_order')->where(array('id'=>$data['order_id']))->find();
        // echo $this->uid;
        // die;
        $uid=$this->uid;
        if($_SESSION['not_shop'])
        {
            $return1=model('food_user_address')->where(array('uid'=>$uid,'is_default'=>1))->find();

        }
        if(IS_POST)
        {
            $data3=$this->clear_html($_POST);
            if(empty($data3['remark']))
            {
                unset($data3['remark']);
                $data3['pay_type']='weixin';
                $data3['confirm_time']=time();
            }else
            {
                $data3['pay_type']='weixin';
                $data3['confirm_time']=time();
            }
            // $this->dexit(array('error'=>0,'msg'=>$data3));
            $return=model('food_order')->data($data3)->where(array('id'=>$data3['order_id']))->save();

            if($return)
            {
                $this->dexit(array('error'=>0,'msg'=>'修改成功'));
            }else
            {
                $this->dexit(array('error'=>1,'msg'=>'修改失败'));
            }
        }
        $this->assign(array('data1'=>$data1,'shop'=>$shop,'data2'=>$data2,'return1'=>$return1));
        $this->display('confirm');
    }
    public function delete_cart()
    {
        $data=$this->clear_html($_GET);
        $return=model('food_cart')->where(array('goods_id'=>$data['goods_id']))->delete();
        if($return)
        {
            $this->dexit(array('error'=>0,'msg'=>'删除成功'));
        }else
        {
            $this->dexit(array('error'=>1,'msg'=>'删除失败'));
        }
    }
    public function test()
    {

        $data2=$this->clear_html($_GET);
        // echo $data2['table_id'];
        // die;
        $mid=$_SESSION['shop_id']=$data2['shop_id'];
        $this->mid=$mid;
        $shop_id=$this->mid;
        if($data2['table_id'])
        {
            $table_id=$_SESSION['table_id']=$data2['table_id'];
            $this->table_id=$table_id;
        }else
        {
            $_SESSION['not_shop']=true;
        }

        if (!$_SESSION['not_shop']) {
            $_SESSION['not_shop'] = false;
        }
        //unset($_SESSION['not_shop']);
        // dump($_SESSION['not_shop']);
        $data=model('food_cat')->where(array('shop_id'=>$shop_id,'pid'=>0,'status'=>1))->order('sort desc')->select();
        $data[0]['default']=1;
        $sql = 'select distinct a.cat_id,a.*,b.cat_name from hd_food_goods as a left join hd_food_cat as b on a.cat_id=b.id where  a.shop_id='.$shop_id.' and a.is_onsale=1   order by b.sort desc';
        $data1=model('food_goods')->query($sql);
        $data1[0]['default']=2;
        $this->assign(array('data'=>$data,'data1'=>$data1));
        $this->display('index1');
    }
    public function cart()
    {
        //接收传过来的值
        $data=$this->clear_html($_GET);
        $result=model('food_cart')->where(array('goods_id'=>$data['goods_id']))->find();
        if($result)
        {
            //累加
            $data1['num']=$data['num'];
            $data1['total']=$data['num']*$data['goods_price'];
            // $this->dexit(array('error'=>0,'msg'=>$data));
            $return1=model('food_cart')->data($data1)->where(array('goods_id'=>$data['goods_id']))->save();
            if($return1)
            {
                $this->dexit(array('error'=>0,'msg'=>'修改成功'));
            }else
            {
                $this->dexit(array('error'=>1,'msg'=>'修改失败'));
            }

        }else
        {
            $data['shop_id']=$this->mid;
            $data['table_id']=$this->table_id;
            $data['uid']=6;
            $data['num']=$data['num'];
            $data['total']=$data['num']*$data['goods_price'];
            $data['addtime']=time();
            $return=model('food_cart')->data($data)->add();
            if($return)
            {
                $this->dexit(array('error'=>0,'msg'=>'添加成功'));
            }else
            {
                $this->dexit(array('error'=>1,'msg'=>'添加失败'));
            }
        }
    }
    public function cart_index()
    {
        // echo $this->table_id;
        $data1=model('shop')->where(array('id'=>$this->mid))->find();
        $data=model('food_cart')->query('select a.*,b.goods_name,b.goods_img,c.cat_name from hd_food_cart as a left join hd_food_goods as b on a.goods_id=b.id left join hd_food_cat as c on b.cat_id=c.id  where a.uid='.$this->uid);
        $this->assign(array('data'=>$data,'data1'=>$data1));
        $this->display('cart_index');
    }
    public function add_order_goods()
    {

        if(IS_POST)
        {
            $data=$this->clear_html($_POST);
            $data['shop_id']=$this->mid;
            $data['uid']=$this->uid;
            $data['order_no']=date(Ymd).time().rand(11111,99999);
            $data['status']=1;
            if($this->table_id)
            {

                $data1=model('food_shop_tables')->where(array('id'=>$this->table_id))->find();
                $data2=model('food_shop_tablezones')->where(array('id'=>$data1['tablezonesid']))->find();
                $data['seat_type']=$data2['title'];

                $data['eat_type']=1;
                $data['table_id']=$this->table_id;
            }else
            {
                $data['eat_type']=2;
            }
            $data['addtime']=time();
            // $this->dexit(array('error'=>1,'msg'=>$data));
            $return=model('food_order')->data($data)->add();
             // $this->dexit(array('error'=>1,'msg'=>$return));
            //添加到订单商品表
            $ids = rtrim($data['cat_id'],',');
            $where['id'] = array('in',$ids);
            $cats = model('food_cart')->where($where)->select();
            // $this->dexit(array('error'=>0,'msg'=>$cats));
            if($return)
            {
                foreach($cats as $v)
                {
                    $result = model('food_order_goods')->data(['shop_id'=>$this->mid,'order_id'=>$return,'goods_id'=>$v['goods_id'],'goods_price'=>$v['goods_price'],'goods_num'=>$v['num'],'addtime'=>time()])->add();

                }
                if($result)
                {
                    $result1=model('food_cart')->where($where)->delete();
                    $this->dexit(array('error'=>0,'msg'=>$return));
                }else
                {
                    $this->dexit(array('error'=>1,'msg'=>'fail'));
                }
            }
        }
    }
    
    //排队 hd_food_queue_buyer
    public function do_queue_buyer()
    {
        if (IS_POST) {
            $data = $this->clear_html($_POST);
            $data['store_id'] = $this->mid;
            $data['u_id'] = 3;
            $status = model('food_queue_buyer')->where(array('u_id'=>$data['u_id'],'status'=>1))->find();
            if ($status) {
               $this->dexit(array('error'=>1,'msg'=>'你已经排号成功了，不可再排号，取消可重新排号。。'));
            }
            $datas = model('food_queue_add_lin')->where(array('status'=>1,'store_id'=>$this->mid))->order('displayorder asc')->select();
            $a = 100000000000;
            $id = 0;
            foreach ($datas as $v) {
                if ($data['buyer_num'] >=  $v['limit_num']) {
                    $b = abs($v['limit_num']-$data['buyer_num']);
                    if ($a > $b) {
                        $a  = $b;
                        $id = $v[id];
                    }
                      
                }
            }
            $data['queue_id'] = $id;
            $data['add_time'] = time();
            $todey = strtotime(date('Ymd'));
            $buyer = model('food_queue_buyer')->where(array('status'=>1,'add_time'=>array('gt',$todey)))->order('buyer_id desc')->select();
            if ($buyer) {
               $data['buyer_id'] = $buyer[0]['buyer_id']+1;
            }else{
                $data['buyer_id'] = 10001;
            }
            $num = model('food_queue_buyer')->data($data)->add();
            if ($num) {
                $this->dexit(array('error'=>0,'msg'=>'你已经排号成功。。'));
              
            }else{
                $this->dexit(array('error'=>1,'msg'=>'你排号失败。。'));
            
            }
        }
        $this->display('queue_buyer');
    }

     //显示排队位置
    public function do_queue_buyer_show()
    {
        $u_id = 1;
        $buyer = model('food_queue_buyer')->where(array('u_id'=>$u_id,))->find();
        $queue = model('food_queue_add_lin')->where(array('id'=>$buyer['queue_id']))->find();
        //
        $buyers = model('food_queue_buyer')->where(array('queue_id'=>$buyer['queue_id'],'status'=>1))->order('add_time asc')->limit(0,$queue['notify_number'])->select();
        //我这一组我排第几
        $num = model('food_queue_buyer')->field('count(*) as num')->where(array('add_time'=>array('lt',$buyer['add_time'])))->find();
        //dump($buyers);
        //dump($num);
        $this->assign(array('num'=>$num['num'],'buyers'=>$buyers,'buyer'=>$buyer));
        $this->display('queue_buyer_show');
    }
    //排队定时任务
    public function do_queue_buyer_times()
    {
        $bl = 2;
         $this->do_queue_buyer_time($bl);
        
        for ($i=0; $i < 3; $i++) { 
            $table = model('food_shop_tables')->where(array('status'=>0))->select();
            if ($table) {
                $this->do_queue_buyer_time($bl+1+$i);
            }
        }
        
    }
    public function do_queue_buyer_time($bl)
    {
        $queues = model('food_queue_add_lin')->where(array('status'=>1))->select();
        $tables = model('food_shop_tables')->where(array('status'=>0))->select();
        //limit_num user_count
        $aa = [];
        if ($tables) {
            foreach ($queues as $key => $vv) {
                $sm = 100000000000;
                $a = [];
                
                foreach ($tables as $k=> $v) {
                    if ($v['store_id'] == $vv['store_id']) { 
                        if ($v['user_count'] >= $vv['limit_num'] ) {
                            $n = abs($v['user_count']-$vv['limit_num']); 
                            if ($sm > $n & $n < $bl) {
                                $sm = $n;
                                $a['table'] = $v;
                                $a['queue'] = $vv; 
                            }       
                        } 
                    } 
                }
                if (isset($a)) {
                    $aa[]=$a;
                }
               
            }
                    
        } 

        foreach ($aa as $kk => $vv) {
            $table_id = $vv['table']['id'];
            $queue_id = $vv['queue']['id'];
            $buyer = model('food_queue_buyer')->where(array('status'=>1,'queue_id'=>$queue_id))->find(); 
            //echo $table_id;
            $data['status'] = 2;
            $data['table_id'] = $table_id;
            if (model('food_queue_buyer')->data($data)->where(array('id'=>$buyer['id']))->save()) {
                model('food_shop_tables')->data(array('status'=>1))->where(array('id'=>$table_id))->save(); 
            }


        }  
        
    }


}