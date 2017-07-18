
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<title>用户中心</title>
<link rel="stylesheet" href="<?php echo FOOD_PATH?>wap/css/shoppingcart.css"/>
</head>
<body>
<!--头部开始-->
<div class="header">
    <h1>个人中心</h1>
    <a href="javascript:window.history.go(-1);" class="back"><span></span></a>
    <a href="#" class=""></a>
</div>
<!--头部结束-->
<header>
    <div class="user">
        <i class="iconfont">&#xe623;</i>
    </div>

    <div class="userinfo">
        <p>微信昵称</p>
        <p>非会员<span>100积分</span></p>
    </div>

    <div class="right_icon">
        <a href="index.html" class="iconfont">&#xe7f5;</a>
    </div>
</header>

<section>
    <a href="?m=plugin&p=wap&cn=index&id=food:sit:unpay"><i class="iconfont">&#xe60b;</i>未支付</a>
    <a href="?m=plugin&p=wap&cn=index&id=food:sit:paid"><i class="iconfont" style="background: #e25b5b;">&#xe617;</i>已支付</a>
    <a href="?m=plugin&p=wap&cn=index&id=food:sit:done"><i class="iconfont" style="background: #ca6abe;">&#xe75f;</i>已完成</a>
    <a href="#"><i class="iconfont" style="background: #d6c46a;">&#xe717;</i>待评价</a>


</section>

<aside>
<ul>
    <li><a href="?m=plugin&p=wap&cn=index&id=food:sit:all_order" class="sp1"><i class="iconfont">&#xe60b;</i>全部订单<i class="iconfont" style="float: right;font-size: .3rem;">&#xe602;</i></a></li>
    <li style="margin-top: .2rem;"><a href="#history;" class="sp3"><i class="iconfont">&#xe717;</i>我的浏览记录<i class="iconfont" style="float: right;font-size: .3rem;">&#xe602;</i></a></li>
    <li><a href="?m=plugin&p=wap&cn=index&id=food:sit:address_list" class="sp4"><i class="iconfont">&#xe671;</i>管理收货地址<i class="iconfont" style="float: right;font-size: .3rem;">&#xe602;</i></a></li>
    <li><a href="javscript:;" class="sp5"><i class="iconfont">&#xe60b;</i>我的会员卡<i class="iconfont" style="float: right;font-size: .30rem;">&#xe602;</i></a></li>
    <li style="margin-top: .2rem;"><a href="?m=plugin&p=wap&cn=index&id=food:sit:cart_list" class="sp6"><i class="iconfont">&#xe617;</i>我的购物车<i class="iconfont" style="float: right;font-size: .3rem;">&#xe602;</i></a></li>
    <li><a href="javscript:;" class="sp8"><i class="iconfont">&#xe75f;</i>我的收藏<i class="iconfont" style="float: right;font-size: .30rem;">&#xe602;</i></a></li>
</ul>
</aside>
<div style="height: 1rem;"></div>

<!-- 底部导航 -->
<?php require_once(DISPLAY_PATH.'wap/public_footer.php');?>
</body>
</html>
