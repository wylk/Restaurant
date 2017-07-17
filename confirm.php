<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>点餐系统购物车</title>
<style type="text/css">
*{margin:0; padding:0; list-style:none;}
body{font-family:SimHei,'Helvetica Neue',Arial,'Droid Sans',sans-serif;font-size:14px;color:#333;background:#f2f2f2;}
a, a.link{color:#666;text-decoration:none;font-weight:500;}
a, a.link:hover{color:#666;}

/*头部开始*/
.header{position:relative;width:100%;height:44px;background:#fff;border-bottom:1px solid #e0e0e0;}
.header h1{font-size:16px;color:#333;height:44px;line-height:44px;display:block;text-align:center;}
.header a{position: absolute;top:0;display:block;height:44px;line-height:44px;}
.header a.back{left:0px;}
.header a.back span{display:inline-block;width:25px;height:25px;margin:10px 5px;background: url("<?php echo FOOD_PATH?>wap/img/icon/icon-back.png") no-repeat;background-size:100%;}
.header .home{}
/*头部结束*/

.shopping{clear:both;overflow:hidden;height:auto;padding-bottom: 60px;}
.shop-group-item{margin-bottom:5px;}

.shop-group-item ul li{border-bottom:1px solid #e0e0e0;}
/*.shop-group-item .buyerMessage{color:#888; height: 35px; width:100%; background: #FFF; border-bottom:1px solid #e0e0e0; padding-left: 3%; line-height: 250%;}*/
.shop-group-item textarea{width:90%; height: auto; border:0px solid #e0e0e0; padding:1% 5%; margin:;  color:#333;}
.shop-name{background:#fff;height:35px;line-height:35px;padding:0 1px;position:relative;}
.shop-name h4{float:left;font-size:14px;background:url(<?php echo FOOD_PATH?>wap/img/icon/icon-kin.png) no-repeat left center;background-size:20px 22px;padding-left:25px;margin-left: 5px;}

.shop-info{background:#f5f5f5;height:100px;padding:0 15px;position:relative;}
.shop-info .shop-info-img{position:absolute;top:10px;left:25px;width:80px;height:80px;}
.shop-info .shop-info-img img{width:100%;height:100%;}
.shop-info .shop-info-text{margin-left:110px;padding:15px 0;}
.shop-info .shop-info-text h4{font-size:14px;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;overflow: hidden;}
.shop-info .shop-info-text .shop-price{height:24px;line-height:24px;position:relative;}
.shop-info .shop-info-text .shop-arithmetic{position:absolute;right:0px;top:-20px;width:84px;box-sizing:border-box;white-space:nowrap;height:100%; text-align: right;}
.shop-info .shop-info-text .shop-arithmetic .num{color:#999;}

.shopPrice{background:#fff;height:35px;line-height:35px;padding:0 15px;text-align:right;}
.shopPrice span{color:#ff6600;}

  .shopPay {width:95%; margin: 0 auto;}

  .weixinPay, .shopOther{font-weight: 600; text-align: center;width:100%;
  display: inline-block; line-height: 280%;  font-size: 1rem; color: #fff;  font-weight: 500;  border-radius: 4px;  background: #06bf04;
  border: 1px solid #7ea13d; cursor: pointer;   -webkit-transition: all .1s linear; -moz-transition: all .1s linear;  transition: all .1s linear; }
   .weixinPay:active {
    -webkit-box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.3) inset;
    -moz-box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.3) inset;
    box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.3) inset;
    background: #30628b;
    opacity: 1; }
  .weixinPay:hover {   text-decoration: none;    opacity: 0.87;    color: #fff; }
  .shopOther{color: #333;  background: #FFF;  border: 1px solid #ccc; margin-top:5px; }

  </style>
<script type="text/javascript" src="<?php echo FOOD_PATH?>wap/js/jquery-2.1.4.min.js"></script>
</head>
<body>

<!--头部开始-->
<div class="header">
	<h1>未付款订单</h1>
	<a href="#" class="back"><span></span></a>
	<a href="#" class=""></a>
</div>
<!--头部结束-->
<div class="shopping">
	<div class="shop-group-item">
		<div class="shop-name">
			<h4><a href="#"><?php echo $shop['shop_name']?></a></h4>
		</div>
		<ul>
            <?php
            if(!empty($data1))
            {
                foreach($data1 as   $v):
            ?>
			<li>
				<div class="shop-info">
					<div class="shop-info-img"><a href="#"><img src="<?php echo $v['goods_img']?>" /></a></div>
					<div class="shop-info-text">
						<h4><?php echo $v['goods_name']?></h4>
						<div class="shop-price">
							<div class="shop-arithmetic">
								<strong>￥<?php echo $v['goods_price']?></strong><br>
								<span class="num" >×<?php echo $v['goods_num']?></span>
							</div>
						</div>
					</div>
				</div>
			</li>
            <?php endforeach;}else{?>
                暂无数据
            <?php };?>
		</ul>

		<!-- <textarea name="remark" id="remark" cols="99%" rows="5" onfocus="if (value =='添加备注'){value =''}" onblur="if (value =='添加备注'){value=''}"
>
         添加备注

        </textarea> -->
        <textarea name="remark" id="remark" cols="" rows="" onfocus="if ($.trim(value) =='添加备注'){value =''}" onblur="if ($.trim(value) ==''){value='添加备注'}">
        添加备注
        </textarea>



		<div class="shopPrice">总计：￥<span class="shop-total-amount ShopTotal"><?php echo $data2['total']?></span></div>
	</div>
	<div class="shopPay">
		<a class="weixinPay">微信支付</a>

	</div>
</div>
</body>
</html>

<script>
    $(function(){
        $('.weixinPay').click(function(){
            var a1=$.trim($("#remark").val());
            var order_id="<?php echo $data2['id']?>";
            var total="<?php echo $data2['total']?>";
            var shop_name="<?php echo $shop['shop_name']?>";
            var openid="oIXPDwozTo_z-QNATZWhDGEWpwU0";
            var postData={remark:a1};
            postData.order_id=order_id;
            // console.log(postData);
            $.post('?m=plugin&p=wap&cn=index&id=food:sit:confirmPay',postData,function(re){
                if(re.error==0)
                {
                    console.log(re.msg);
                    var postdata={};
                    postdata.total=total;
                    postdata.shop_name=shop_name;
                    postdata.openid=openid;
                    console.log(postdata);
                      $.ajax({
                        type: 'get',  //这里用GET
                        url: 'https://lepay.51ao.com/merchants.php?m=Index&c=api&a=wxjs_pay',
                        dataType: 'jsonp',  //类型
                        data: postdata,
                        jsonp: 'callback', //jsonp回调参数，必需
                        async: false,
                        success: function(re) {//返回的json数据
                            console.log(re);
                            WeixinJSBridge.invoke("getBrandWCPayRequest",re.param,function(res){
                                WeixinJSBridge.log(res.err_msg);
                                if(res.err_msg=="get_brand_wcpay_request:ok"){

                                    setTimeout("window.location.href = '?m=plugin&p=wap&cn=index&id=food:sit:test&table_id=7&shop_id=7'",2);

                                }else{
                                    if(res.err_msg == "get_brand_wcpay_request:cancel"){
                                      var err_msg = "您取消了支付";
                                    }else if(res.err_msg == "get_brand_wcpay_request:fail"){
                                      var err_msg = "支付失败<br/>错误信息："+res.err_desc;
                                    }else{
                                      var err_msg = res.err_msg +"<br/>"+res.err_desc;
                                    }
                                    alert(err_msg);
                                }
                            });
                    },

                    })
                }else
                {
                    console.log(re.msg);
                }
            },'json');
        });
    });
</script>
