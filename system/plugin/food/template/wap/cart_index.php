<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>点餐系统购物车</title>

<script type="text/javascript" src="<?php echo FOOD_PATH?>wap/js/jquery-2.1.4.min.js"></script>

<style type="text/css">
*{margin:0; padding:0; font-weight: normal;list-style:none;}
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

input[type="checkbox"]{-webkit-appearance:none;outline: none;}
input.check{background:url(<?php echo FOOD_PATH?>wap/img/icon/icon_radio3.png) no-repeat center left;background-size:20px 20px;position:absolute;top:50%;left:10px;margin-top:-18px;width:20px;height:35px;}
input.check:checked{background:url(<?php echo FOOD_PATH?>/wap/img/icon/icon_radio4.png) no-repeat center left;background-size:20px 20px;}
input.goodsCheck:checked{background:url(<?php echo FOOD_PATH?>/wap/img/icon/icon_radio4.png) no-repeat center left;background-size:20px 20px;}
input.check:checked{background:url(<?php echo FOOD_PATH?>/wap/img/icon/icon_radio4.png) no-repeat center left;background-size:20px 20px;}
.checked{background:url(<?php echo FOOD_PATH?>/wap/img/icon/icon_radio4.png) no-repeat left center;background-size:20px 20px;position:absolute;top:50%;left:15px;margin-top:-18px;width:20px;height:35px;}

/*尾部开始*/
.footer .copyright{height:44px;line-height:44px;text-align:center;color:#848689;font-size:12px;}
/*尾部结束*/
	/*购物车*/
.shopping{clear:both;overflow:hidden;height:auto;padding-bottom: 60px;}
.shop-group-item{margin-bottom:5px;}
.shop-group-item ul li{border-bottom:1px solid #fff;}
.shop-group-item ul li:last-child{border-bottom:none;}

.shop-name{background:#fff;height:35px;line-height:35px;padding:0 15px;position:relative;}
.shop-name h4{float:left;font-size:14px;background:url(<?php echo FOOD_PATH?>/wap/img/icon/icon-kin.png) no-repeat left center;background-size:20px 20px;padding-left:25px;margin-left: 28px;}
.shop-name .coupons{float:right;}
.shop-name .coupons span{display:inline-block;padding:0 5px;}
.shop-name .coupons em{color:#e0e0e0;}

.shop-info{background:#f5f5f5;height:120px;padding:0 15px;position:relative;}
.shop-info .checkbox{background:url(<?php echo FOOD_PATH?>/wap/img/icon/icon_radio3.png) no-repeat left center;background-size:20px 20px;position:absolute;top:50%;left:15px;margin-top:-60px;width:20px;height:120px;}
.shop-info .checkbox1{background:url(<?php echo FOOD_PATH?>/wap/img/icon/icon_radio4.png) no-repeat left center;background-size:20px 20px;position:absolute;top:50%;left:15px;margin-top:-60px;width:20px;height:120px;}
.shop-info .shop-info-img{position:absolute;top:15px;left:45px;width:90px;height:90px;}
.shop-info .shop-info-img img{width:100%;height:100%;}
.shop-info .shop-info-text{margin-left:130px;padding:15px 0;}
.shop-info .shop-info-text h4{font-size:14px;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;overflow: hidden;}
.shop-info .shop-info-text .shop-brief{height:25px;line-height:25px;font-size:12px;color:#81838e;white-space:nowrap;}
.shop-info .shop-info-text .shop-brief span{display:inline-block;margin-right:8px;}
.shop-info .shop-info-text .shop-price{height:24px;line-height:24px;position:relative;}
.shop-info .shop-info-text .shop-price .shop-pices {color:red;font-size:16px;}
.shop-info .shop-info-text .shop-arithmetic{position:absolute;right:0px;top:0;width:84px;box-sizing:border-box;white-space:nowrap;height:100%;border:1px solid #e0e0e0;}
.shop-info .shop-info-text .shop-arithmetic a{display:inline-block;width:23px;height:22px;line-height:22px;text-align:center;background:#fff;font-size:16px;}
.shop-info .shop-info-text .shop-arithmetic .minus{border-right:1px solid #e0e0e0;}
.shop-info .shop-info-text .shop-arithmetic .failed{color:#d1d1d1;}
.shop-info .shop-info-text .shop-arithmetic .plus{border-left:1px solid #e0e0e0;}
.shop-info .shop-info-text .shop-arithmetic .num{width:32px;text-align:center;border:none;display: inline-block;height:100%;box-sizing:border-box;vertical-align:top;margin:0 -6px;}
.shopPrice{background:#fff;height:35px;line-height:35px;padding:0 15px;text-align:right;}
.shopPrice span{color:#f00;}




.payment-bar{clear:both;overflow:hidden;width:100%;height:49px;position:fixed;bottom:0;border-top:1px solid #e0e0e0;background:#fff;}
.payment-bar .all-checkbox{float:left;line-height:49px;padding-left:40px;}
.payment-bar .shop-total{float:left;-webkit-box-flex:1.0;box-flex:1.0;margin:9px 10px 9px 20px;}
.payment-bar .shop-total strong{display:block;font-size:16px;}
.payment-bar .shop-total span{display:block;font-size:12px;}
.payment-bar .settlement{display:inline-block;float:right;width:100px;height:49px;line-height:49px;text-align:center;color:#fff;font-size:16px;background:#f23030;}

</style>

</head>
<body>

<!--头部开始-->
<div class="header">
	<h1>购物车</h1>
	<a href="#" class="back"><span></span></a>
	<a href="#" class=""></a>
</div>
<!--头部结束-->
<div class="shopping">

	<div class="shop-group-item">
		<div class="shop-name">
			<input type="checkbox" class="check goods-check shopCheck">
			<h4><a href="#"><?php echo $data1['shop_name']?></a></h4>
			<div class="coupons"><span>编辑</span></div>
		</div>
		<ul>
        <?php if(!empty($data))
        {
            foreach($data as $v):
        ?>
			<li>
				<div class="shop-info">
					<input type="checkbox" class="check goods-check goodsCheck">
					<div class="shop-info-img"><a href="#"><img src="<?php echo $v['goods_img']?>" /></a></div>
					<div class="shop-info-text">
						<h4><?php echo $v['goods_name']?></h4>
						<div class="shop-brief"><?php echo $v['cat_name']?></div>
						<div class="shop-price">
							<div class="shop-pices">￥<b class="price"><?php echo $v['goods_price']?></b></div>
							<div class="shop-arithmetic">
								<a href="javascript:;" class="minus"  data-id="<?php echo $v['goods_id']?>" price="<?php echo $v['goods_price']?>" disabled="true">-</a>
								<span class="num" ><?php echo $v['num']?></span>
                                <span class="goods_id" style="display:none"><?php echo $v['goods_id']?></span>
								<a href="javascript:;" class="plus" data-id="<?php echo $v['goods_id']?>" price="<?php echo $v['goods_price']?>">+</a>
							</div>
						</div>
					</div>
				</div>
			</li>
            <?php endforeach;}else{?>
                暂无数据
            <?php };?>
		</ul>
		<div class="shopPrice">总计：￥<span class="shop-total-amount ShopTotal">0.00</span></div>
        <div class="shopNum" style="display:none"><span class="shop-total-amount Shopnum">0</span></div>
	</div>


<div class="payment-bar">
	<div class="all-checkbox"><input type="checkbox" class="check goods-check" id="AllCheck">全选</div>
	<div class="shop-total">
		<strong>总价：<i class="total" id="AllTotal">0.00</i></strong>
        <strong>数量：<i class="total" id="allnum">0</i></strong>
	</div>
	<a href="#" class="settlement">结算</a>
</div>
</body>
</html>

<script type="text/javascript">
	$(function(){
	// 数量减
	$(".minus").click(function() {
		var t = $(this).parent().find('.num');
        var n = $(this).next().text();
        var num = parseInt(n) - 1;
        // console.log(num);
        if(num<=0)
        {
            alert('商品数量至少有1个');
            return false;
        }
		t.text(parseInt(t.text()) - 1);
		if (t.text() <= 1) {
			t.text(1);
		}
		TotalPrice();
        var goods_id=$(this).data('id');
        // console.log(goods_id);
        var goods_price=$(this).attr('price');
        // console.log(goods_price);
        var postData={goods_id:goods_id};
        postData.goods_price=goods_price;
        postData.num=num;
        console.log(postData);
          // return false;
        $.get('?m=plugin&p=wap&cn=index&id=food:sit:cart&table_id=1&shop_id=7',postData,function(re){
            if(re.error==0)
            {
                console.log(re.msg);
                // window.location.href='?m=plugin&p=wap&cn=index&id=food:sit:cart&table_id=1&shop_id=7';
            }else
            {
                console.log(re.msg);
            }
        },'json');
	});
	// 数量加
	$(".plus").click(function() {
		var t = $(this).parent().find('.num');
        var n = $(this).prev().text();
        var num = parseInt(n) + 1;
        // console.log(num);
		t.text(parseInt(t.text()) + 1);
		if (t.text() <= 1) {
			t.text(1);
		}
		TotalPrice();
        var goods_id=$(this).data('id');
        // console.log(goods_id);
        var goods_price=$(this).attr('price');
        // console.log(goods_price);
        var postData={goods_id:goods_id};
        postData.goods_price=goods_price;
        postData.num=num;
        console.log(postData);
         // return false;
        $.get('?m=plugin&p=wap&cn=index&id=food:sit:cart&table_id=1&shop_id=7',postData,function(re){
            if(re.error==0)
            {
                console.log(re.msg);
                // window.location.href='?m=plugin&p=wap&cn=index&id=food:sit:cart&table_id=1&shop_id=7';
            }else
            {
                console.log(re.msg);
            }
        },'json');

	});
    /********************结算*************************/
     $('.settlement').click(function(){
             // var dom=$(this);
            // var total=dom.parent().text();
            var allprice = 0; //总价
            var allnumber1=0;
            $(".shop-group-item").each(function() { //循环每个店铺
              var oprice = 0; //店铺总价
              var AllNum=0;
              $(this).find(".goodsCheck").each(function() { //循环店铺里面的商品
                if ($(this).is(":checked")) { //如果该商品被选中
                  var num = parseInt($(this).parents(".shop-info").find(".num").text()); //得到商品的数量
                  var goods_id=parseInt($(this).parents(".shop-info").find(".goods_id").text());

                  var price = parseFloat($(this).parents(".shop-info").find(".price").text()); //得到商品的单价
                  var total = price * num; //计算单个商品的总价
                  oprice += total; //计算该店铺的总价
                  AllNum+=num;
                  var postData={goods_id:goods_id};
                  postData.goods_num=num;
                  postData.total=total;
                    console.log(postData);
                  // return false;
                  $.post('?m=plugin&p=wap&cn=index&id=food:sit:add_order_goods&table_id=1&shop_id=7',postData,function(re){
                    if(re.error==0)
                    {
                        console.log(re.msg);
                    }else
                    {
                        console.log(re.msg);
                    }
                  },'json');
                }
                $(this).closest(".shop-group-item").find(".ShopTotal").text(oprice.toFixed(2));
                $(this).closest(".shop-group-item").find(".Shopnum").text(AllNum); //显示被选中商品的店铺总价
                // console.log(AllNum);
              });
              // console.log(num);
              //     return false;
              var oneprice = parseFloat($(this).find(".ShopTotal").text()); //得到每个店铺的总价
              allprice += oneprice; //计算所有店铺的总价
              var allnumber=parseFloat($(this).find(".Shopnum").text());
              allnumber1+=allnumber;
              // console.log(allnumber1);
            });

            $("#AllTotal").text(allprice.toFixed(2)); //输出全部总价
            $("#allnum").text(allnumber1);
            var all=$('#AllTotal').text();
            var n=$("#allnum").text();
            // console.log(n);
            // console.log(all);
            // return false;
            var postData={total:all};
            postData.goods_num=n;
            console.log(postData);
            $.post('?m=plugin&p=wap&cn=index&id=food:sit:add_order&table_id=1&shop_id=7',postData,function(re){
                if(re.error==0)
                {
                    alert(re.msg);
                    window.location.href='?m=plugin&p=wap&cn=index&id=food:sit:pay&table_id=1&shop_id=7';
                }else
                {
                    console.log(re.msg);
                }
            },'json');
        });
	/******------------分割线-----------------******/
	  // 点击商品按钮
  $(".goodsCheck").click(function() {
    var goods = $(this).closest(".shop-group-item").find(".goodsCheck"); //获取本店铺的所有商品
    var goodsC = $(this).closest(".shop-group-item").find(".goodsCheck:checked"); //获取本店铺所有被选中的商品
    // console.log(goodsC);

    var Shops = $(this).closest(".shop-group-item").find(".shopCheck"); //获取本店铺的全选按钮
    if (goods.length == goodsC.length) { //如果选中的商品等于所有商品
      Shops.prop('checked', true); //店铺全选按钮被选中
      if ($(".shopCheck").length == $(".shopCheck:checked").length) { //如果店铺被选中的数量等于所有店铺的数量
        $("#AllCheck").prop('checked', true); //全选按钮被选中
        TotalPrice();
      } else {
        $("#AllCheck").prop('checked', false); //else全选按钮不被选中
        TotalPrice();
      }
    } else { //如果选中的商品不等于所有商品
      Shops.prop('checked', false); //店铺全选按钮不被选中
      $("#AllCheck").prop('checked', false); //全选按钮也不被选中
      // 计算
      TotalPrice();
      // 计算
    }
  });
  // 点击店铺按钮
  $(".shopCheck").click(function() {
    if ($(this).prop("checked") == true) { //如果店铺按钮被选中
      $(this).parents(".shop-group-item").find(".goods-check").prop('checked', true); //店铺内的所有商品按钮也被选中
      if ($(".shopCheck").length == $(".shopCheck:checked").length) { //如果店铺被选中的数量等于所有店铺的数量
        $("#AllCheck").prop('checked', true); //全选按钮被选中
        TotalPrice();
      } else {
        $("#AllCheck").prop('checked', false); //else全选按钮不被选中
        TotalPrice();
      }
    } else { //如果店铺按钮不被选中
      $(this).parents(".shop-group-item").find(".goods-check").prop('checked', false); //店铺内的所有商品也不被全选
      $("#AllCheck").prop('checked', false); //全选按钮也不被选中
      TotalPrice();
    }
  });
  // 点击全选按钮
  $("#AllCheck").click(function() {
    if ($(this).prop("checked") == true) { //如果全选按钮被选中
      $(".goods-check").prop('checked', true); //所有按钮都被选中
      TotalPrice();
    } else {
      $(".goods-check").prop('checked', false); //else所有按钮不全选
      TotalPrice();
    }
    $(".shopCheck").change(); //执行店铺全选的操作
  });
	//计算
  function TotalPrice() {
    var allprice = 0; //总价
    var allnumber1=0;
    $(".shop-group-item").each(function() { //循环每个店铺
      var oprice = 0; //店铺总价
      var AllNum=0;
      $(this).find(".goodsCheck").each(function() { //循环店铺里面的商品
        if ($(this).is(":checked")) { //如果该商品被选中
          var num = parseInt($(this).parents(".shop-info").find(".num").text()); //得到商品的数量
          var price = parseFloat($(this).parents(".shop-info").find(".price").text()); //得到商品的单价
          var total = price * num; //计算单个商品的总价
          oprice += total; //计算该店铺的总价
          AllNum+=num;
        }
        $(this).closest(".shop-group-item").find(".ShopTotal").text(oprice.toFixed(2)); //显示被选中商品的店铺总价
        $(this).closest(".shop-group-item").find(".Shopnum").text(AllNum);
      });
      var oneprice = parseFloat($(this).find(".ShopTotal").text()); //得到每个店铺的总价
      allprice += oneprice; //计算所有店铺的总价
      var allnumber=parseFloat($(this).find(".Shopnum").text());
        allnumber1+=allnumber;
    });

    $("#AllTotal").text(allprice.toFixed(2)); //输出全部总价
    $("#allnum").text(allnumber1);
  }
});


</script>
