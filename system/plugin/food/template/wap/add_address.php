<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>添加收货地址</title>
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

    .addrmain{width:99.99%; margin:0 auto; padding-top:10%;}
    .addrmain .addrul li{width:90%; height: 45px;}
    .addrmain .addrul li span{display: inline-block; width:25%; margin-left: 5%;}
    .addrmain .addrul li input, .addrmain .addrul li select{width:70%; border:1px solid #E0E0E0; height: 30px; }

    .shopPay {width:95%; margin: 0 auto;}

  .shopOther{font-weight: 600; text-align: center;width:100%; display: inline-block; line-height: 280%;  font-size: 1rem; color: #fff;  font-weight: 500;  border-radius: 4px;  background: #4d55c4; cursor: pointer;   -webkit-transition: all .1s linear; -moz-transition: all .1s linear;  transition: all .1s linear; }
   .shopOther:active {background: #30628b; opacity: 1; }
  .shopOther:hover {   text-decoration: none;    opacity: 0.87;    color: #fff; }


</style>
<!-- 使用QQ的省市区数据 -->
<!--
<script type="text/javascript" src="http://ip.qq.com/js/geo.js"></script>
-->
<script type="text/javascript" src="<?php echo FOOD_PATH?>wap/js/gen.js"></script>
</head>
<body onload="setup(); preselect('北京市');">
<!--头部开始-->
<div class="header">
    <h1>添加收货地址</h1>
    <a href="javascript:window.history.go(-1);" class="back"><span></span></a>
    <a href="#" class=""></a>
</div>
<!--头部结束-->
<div class="addrmain">
<!-- <form name="shareaddr" action="" onsubmit="" method="post"> -->
<ul class="addrul">
    <li><span>收货人</span><input type = "text" name="consignee" id="name"></li>
    <li><span>手机号码 </span><input type = "text" name="phone" id="phone"></li>
    <li><span>省份</span><select class="select" name="province" id="province">
    <option></option>
    </select></li>
    <li><span>市</span><select class="select" name="city" id="city">
    <option></option>
    </select></li>
    <li><span>区县</span><select class="select" name="town" id="town">
    <option></option>
    </select></li>
    <li><span>详细地址 </span><input type = "text" name="detail" id="detailed"></li>
    <!-- <input id="address" name="address" type="hidden" value="" /> -->
    <div class="shopPay">
        <a class="shopOther" onclick="return chenkObj()"  type="submit" >提交</a>
    </div>
</ul>
<!-- </form> -->
</div>
<script type="text/javascript" src="<?php echo FOOD_PATH?>wap/js/jquery-2.1.4.min.js"></script>
<script>
function chenkObj() {

    var name = document.getElementById('name').value;
    var phone = document.getElementById('phone').value;
    var detailed = document.getElementById('detailed').value;
    var province=$('#province').val();
    var city=$('#city').val();
    var town=$('#town').val();
    // var detail=$("input[name='detail']").val();
    if(name == ""){
        alert("请输入收货人姓名！");
        return false;
    }
    if(phone == ""){
        alert("请输入收货人电话！");
        return false;
    }else{
        if(!(/^1[34578]\d{9}$/.test(phone))){
            alert("手机号码有误，请重填");
            return false;
        }
    }
    if(detailed == ""){
        alert("请输入收货人详细地址！");
        return false;
    }
    var postData={consignee:name};
    postData.phone=phone;
    postData.province=province;
    postData.city=city;
    postData.town=town;
    postData.detail=detailed;
    console.log(postData);
    $.post('?m=plugin&p=wap&cn=index&id=food:sit:add_address',postData,function(re){
        if(re.error==0)
        {
            alert(re.msg);
            window.location.href="?m=plugin&p=wap&cn=index&id=food:sit:address_list";
        }else
        {
            alert(re.msg);
        }
    },'json');
}


</script>
</body>
</html>