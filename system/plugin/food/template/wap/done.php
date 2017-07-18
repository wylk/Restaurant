
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<title>已完成订单</title>
<link rel="stylesheet" href="<?php echo FOOD_PATH?>wap/css/shoppingcart.css"/>
<style type="text/css">
    strong,b{font-weight: bold;}
    .billmain .bill_list li{margin-bottom:5px; background: #FFF; }
    .billmain .bill_list .billnum{border-bottom:1px solid #E0E0E0;}
    .billnum span.bright, .sumprice span.bright{float: right; color:#CCC;}
    .billnum span.bright a{color: #0000FF}
    .shop-info .shop-info-img{position:absolute;top:8px;left:25px;width:70px;height:70px;}
    .bill_list .shop-info{background: #FFF;border-bottom:1px solid #E0E0E0; height: 90px;}
    .shop-info .shop-info-text{margin-left:100px;padding:15px 0;}
    .shop-info .shop-info-text .shop-arithmetic{position:absolute;right:0px;top:-35px;width:84px;box-sizing:border-box;white-space:nowrap;height:100%; text-align: right;}
    .shop-info .shop-info-text .shop-arithmetic .num{color:#999;}
    .bill_list .sumprice .bright{border-radius: 4px; width: 60px; text-align: center; height: 30px;margin-top:3px; line-height: 30px;border:1px solid #CCC;}
    .bill_list .sumprice .bright a{color:#CCC;}

</style>
</head>
<body>
<!--头部开始-->
<div class="header">
    <h1>已完成订单</h1>
    <a href="javascript:window.history.go(-1);" class="back"><span></span></a>
    <a href="#" class=""></a>
</div>
<!--头部结束-->
<aside class="billmain">
<ul class="bill_list">
<?php if(!empty($data)){
    foreach($data as $v):
?>
    <li>
        <div class="billnum"><?php echo $v['shop_name']?><span class="bright">已完成</span></div>
         <?php foreach($data1 as $v1){
        foreach($v1 as $v2)
        {
            if($v2['order_id']==$v['id'])
            {
        ?>
        <div class="shop-info">
            <div class="shop-info-img" style="left:10px;"><a href="#"><img src="<?php echo $v2['goods_img']?>" /></a></div>
            <div class="shop-info-text">
            <h4><?php echo $v2['goods_name']?></h4>
                <div class="shop-price">
                    <div class="shop-arithmetic">
                        <strong>￥<?php echo $v2['goods_price']?></strong><br>
                        <span class="num" >×<?php echo $v2['goods_num']?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php }}};?>
        <div class="sumprice">总价：￥<?php echo $v['total']?></div>
    </li>
 <?php endforeach;}else{?>
    暂无数据
    <?php };?>


</ul>
</aside>
<div style="height: 1rem;"></div>

<!-- 底部导航 -->
<?php require_once(DISPLAY_PATH.'wap/public_footer.php');?>
</body>
</html>
