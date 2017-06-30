<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>欢迎登陆超管系统</title>
	<link rel="stylesheet" type="text/css" href="<?php echo __ROOT__;?>statics/css/super_login.css">
	<script src="<?php echo __ROOT__;?>statics/js/jquery.js,jquery.backstretch.min.js" type="text/javascript"></script>


</head>
<body>
<div class="home">

	<div class="logo"><span>点餐系统</span></div>
	<div class="advertisement"><span>Welcom to Manager</span></div>
	<div id="login">


		<input type="text"  placeholder="手机号码" name="phone"></input>
		<input type="password"  placeholder="登录密码" name="password"></input>
		<button class="btn btn-primary btn-lg" type="submit" id="aa"><i class="fa fa-user"></i> 登录管理</button>


		<div class="login_link">
			<a class="zhuce" href="./index.php?m=plugin&p=public&cn=index&id=food:sit:create_company"> 注册商家</a>
			<a class="zhaohui" href="a">密码找回</a>
		</div>
	</div>

</div>
<script src="https://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
$.backstretch([
'<?php echo __ROOT__;?>statics/images/TB1sXGYIFXXXXc5XpXXXXXXXXXX.jpg',
'<?php echo __ROOT__;?>statics/images/TB1pfG4IFXXXXc6XXXXXXXXXXXX.jpg',
'<?php echo __ROOT__;?>statics/images/TB1h9xxIFXXXXbKXXXXXXXXXXXX.jpg',


], {
fade : 1000, // 动画时长
duration : 2000 // 切换延时
});
</script>
<?php include template('footer','admin');?>
<script>
	$(function(){
		$('#aa').click(function(){
			console.log(1);
			var a1=$("input[name='phone']").val();
			var a2=$("input[name='password']").val();

			if(a1=='')
			{
				alert('手机号码不能为空');
				return false;
			}
			if(a2=='')
			{
				alert('登录密码不能为空');
				return false;
			}
			var postData = {}
			postData.phone=a1;
			postData.password=a2;
			console.log(postData);
			$.post('?m=plugin&p=public&cn=index&id=food:sit:super_login',postData,function(re){
				if(re.error==0)
				{
					alert(re.msg);
					window.location.href='?m=plugin&p=admin&cn=index1&id=food:sit:test';
				}else if(re.error==1)
				{
					alert(re.msg);
				}else if(re.error==2)
				{
					alert(re.msg);
					window.location.href='?m=plugin&p=public&cn=index&id=food:sit:edit_company&cid='+re.cid;
				}
			},'json');
		});
	});
</script>