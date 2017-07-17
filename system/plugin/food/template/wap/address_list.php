<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>管理收货地址</title>
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

    .addrlist{width:99.99%; margin:0 auto; padding-top:1%;}
    .addrlist .addrul li{background: #FFF; border:1px solid #E0E0E0; line-height: 150%; padding:1% 3%; height: auto; float: left; width:94.0%;}
   .addrlist .addrul .address .ad_le{ width:69%; float: left; }

    .addrlist .addrul .delete_box {position:relative; width:29%; float:right;}
    .addrlist .addrul .delete_box .addr_edit{width:35%; height:10%; float:left; background: url("<?php echo FOOD_PATH?>wap/img/icon/edit_icon.png") no-repeat 10% 50%; background-size: 60% 30%;}
    .addrlist .addrul .delete_box .addr_del{width:60%; height: 10%;float:right; background: #FF0000; color:#FFF;  text-align: center; line-height: 400%; }
    .addrplus{width:99%; margin:2% 0.5%;}
    .addrplus a{width:95%; margin: 1% 0; padding-left:5%;  display: block; height: 35px; line-height: 35px;  float: left; background: #FFF url("<?php echo FOOD_PATH?>wap/img/icon/up.png") no-repeat 95% 5px;  border-bottom:1px solid #C0C0C0;}

/*弹出框*/
.f_left{float: left;}
.f_right{float: right;}
.jd_win{width: 100%;height: 100%;position: fixed;top:0;left:0;background: rgba(0, 0, 0, 0.6);z-index: 9999;display:none;

}
.jd_win_box{width: 80%;padding: 0 10px;border-radius: 4px;background-color: #fff;position: absolute;top:50%;left:50%;transform:translate(-50%, -50%);-webkit-transform:translate(-50%, -50%);
}

.jd_win .jd_win_tit{border-bottom:1px solid #ccc;line-height: 75px;text-align: center;font-size: 18px;
}
.jd_btn{width: 100%;padding: 10px 0;
}

.jd_btn  a{line-height: 36px;width: 45%;text-align: center;border-radius: 4px;
}
.jd_win .cancle{margin-right: 3%; border: 1px solid #ccc;
}
.jd_win .submit{background: #d8505c;color: #fff;border: 1px solid #ccc;
}

.move{animation: mymove 1s;
}



</style>

</head>
<body>
<!--头部开始-->
<div class="header">
    <h1>管理收货地址</h1>
    <a href="javascript:window.history.go(-1);" class="back"><span></span></a>
    <a href="#" class=""></a>
</div>
<!--头部结束-->
<div class="addrlist">
<ul class="addrul">
    <?php
    if(!empty($data))
    {
        foreach($data as $v):
    ?>
    <li><div class="address">
        <div class="ad_le">
            <div class="addr"><?php echo $v['province']?><?php echo $v['city']?><?php echo $v['town']?><?php echo $v['detail']?></div>
            <div class="name"><b><?php echo $v['consignee']?></b><?php echo $v['phone']?>
            <?php if($v['is_default']==1):?>
            <a style="color:red;float:right;">默认地址</a>
            <?php else:?>
            <a href="?m=plugin&p=wap&cn=index&id=food:sit:edit_default&aid=<?php echo $v['id']?>" style="color:red;float:right;">使用该地址</a>
            <?php endif;?>
            </div>
        </div>
            <div class="delete_box ad_ri">
                <a class="addr_edit" href="?m=plugin&p=wap&cn=index&id=food:sit:edit_address&aid=<?php echo $v['id']?>"></a>
                <span style="display:none"><?php echo $v['id']?></span>
                <a class="addr_del" data-id="<?php echo $v['id']?>">删除</a>
            </div>
        </div>
	</li>
<?php endforeach;}else{?>
    暂无数据
    <?php };?>
</ul>
<div class="addrplus"><a href="?m=plugin&p=wap&cn=index&id=food:sit:add_address">新增收货地址</a></div>
</div>
<div class="jd_win">
    <div class="jd_win_box">
        <div class="jd_win_tit">你确定删除该地址吗？</div>
        <div class="jd_btn clearfix">
            <a href="#" class="cancle f_left">取消</a>
            <a href="#" class="submit f_right">确定</a>
        </div>

    </div>
</div>
</body>
<script type="text/javascript" src="<?php echo FOOD_PATH?>wap/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
var that;
    $('.addr_del').on('click',function(){
    $(this).children('.addr_del').css(
    {
        transition :'all 1s',
        'transformOrigin':"0 5px" ,
        transform :'rotate(-30deg) translateY(2px)'
    }
    )
    $('.jd_win').show();
    that = $(this);
})
    $('.cancle').on('click',function(){
        $('.jd_win').hide();
        $('.addr_del').css('transform','none')
    })
    $('.submit').on('click',function(){
        var aid=that.parent().find("span").text();
        var postdata={aid:aid};
        console.log(postdata);
        $.post('?m=plugin&p=wap&cn=index&id=food:sit:del_address',postdata,function(re){
            if(re.error==0)
            {
                alert(re.msg);
                window.location.href="?m=plugin&p=wap&cn=index&id=food:sit:address_list";
            }else
            {
                alert(re.msg);
            }
        },'json');
        // return false;
        // that.parents().parents(".address").remove();
        $('.jd_win').hide();
        if($(".address").length == 0) {
        }
    })
    function del_art() {
        alert("你确定要删除该地址吗？")
}

</script>
</html>