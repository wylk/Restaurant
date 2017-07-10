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
        $mid=isset($_SESSION['employee']['shop_id'])?$_SESSION['employee']['shop_id']:$GET['shop_id'];
        $this->mid=$mid;
        $this->table_id=$_GET['table_id'];
        $this->uid=6;
        if($this->table_id=='')
        {
            echo "<script>alert('没有获取到桌号，请稍后再试');history.go(-1);</script>";
            die;
        }
    }

    public function test()
    {
        $shop_id=$this->mid;
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
        $data1=model('shop')->where(array('id'=>$this->mid))->find();
        $data=model('food_cart')->query('select a.*,b.goods_name,b.goods_img,c.cat_name from hd_food_cart as a left join hd_food_goods as b on a.goods_id=b.id left join hd_food_cat as c on b.cat_id=c.id  where a.uid='.$this->uid.' and a.is_show=0');
        $this->assign(array('data'=>$data,'data1'=>$data1));
        $this->display('cart_index');
    }
    public function add_order_goods()
    {
        if(IS_POST)
        {
            $data=$this->clear_html($_POST);
            $data['shop_id']=$this->mid;
            $data['table_id']=$this->table_id;
            $data['goods_price']=$data['total']/$data['goods_num'];
            $data['addtime']=time();
            $return1=model('food_order_goods')->data($data)->add();
            if($return1)
            {
                $_SESSION['order_id'][]=$return1;
                $_SESSION['goods_id'][]=$data['goods_id'];
                // $_data[]=$return1;
                $this->dexit(array('error'=>0,'msg'=>'success'));
            }else
            {
                $this->dexit(array('error'=>1,'msg'=>'fail'));
            }
        }
    }
    public function add_order()
    {
        //添加到订单表
        if(IS_POST)
        {

            $data=$this->clear_html($_POST);
            $data['shop_id']=$this->mid;
            $data['uid']=$this->uid;
            $data['table_id']=$this->table_id;
            $data['order_no']=date(Ymd).time();
            $data['addtime']=time();
            $return=model('food_order')->data($data)->add();
            if($return)
            {
                foreach($_SESSION['order_id'] as $v)
                {
                    $result=model('food_order_goods')->data(array('order_id'=>$return))->where(array('id'=>$v))->save();
                }
                // foreach($_SESSION['goods_id'] as $v1)
                // {
                //     $result1=model('food_cart')->data(array('is_commit'=>1))->where(array('goods_id'=>$v1))->save();
                //     // $this->dexit(array('error'=>0,'msg'=>$v1));
                // }
                // $this->dexit(array('error'=>0,'msg'=>'error'));
                if($result)
                {
                     $_SESSION['order_id']=[];
                     // $_SESSION['goods_id']=[];
                    $this->dexit(array('error'=>0,'msg'=>'添加到订单表成功'));
                }else
                {
                    $this->dexit(array('error'=>1,'msg'=>'失败'));
                }

            }else
            {
                $this->dexit(array('error'=>1,'msg'=>'添加失败'));
            }

        }

    }
   public function pay()
   {
        echo '微信支付';
   }
   public function test11()
   {

        dump($_SESSION['goods_id']);
        foreach($_SESSION['goods_id'] as  $v)
        {
            $result=model('food_cart')->query('update hd_food_cart set is_show=1 where goods_id='.$v);
            // echo $v;
            // $result=model('food_cart')->data(array('is_show'=>1))->where(array('goods_id'=>$v))->save();
        }
        // $data=[12,13];
        // foreach($data as  $v)
        // {
        //     //$result=model('food_cart')->query('update hd_food_cart set is_show=1 where goods_id='.$v);
        //      echo $v;
        //      $result=model('food_cart')->data(array('is_show'=>1))->where(array('id'=>$v))->save();
        // }
        dump($result);
        die;
        if($result)
        {
            echo 'success';
        }else
        {
            echo 'fail';
        }
   }

}