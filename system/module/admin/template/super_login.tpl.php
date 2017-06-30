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
		<form method="post">  
		<input type="text" required="required" placeholder="Uer Name" name="u"></input>  
		<input type="password" required="required" placeholder="Password" name="p"></input>
		<button class="btn btn-primary btn-lg" type="submit"><i class="fa fa-user"></i> 登录管理</button> 
		<!--<a href="./index.php?m=plugin&p=public&cn=index&id=food:sit:create_company" class="btn btn-primary btn-lg"><i class="fa fa-user-plus"></i> 注册商家</a> -->
		</form>
		<div class="login_link">
			<a class="zhuce" href="./index.php?m=plugin&p=public&cn=index&id=food:sit:create_company"> 注册商家</a>
			<a class="zhaohui" href="a">密码找回</a>
		</div>
	</div>
</div>
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
