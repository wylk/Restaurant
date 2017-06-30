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
	<div class="btns">

		<a href="?m=plugin&p=public&cn=index&id=food:sit:super_login" class="btn btn-primary btn-lg"><i class="fa fa-user"></i> 商家管理</a>
		<a href="./index.php?m=plugin&p=public&cn=index&id=food:sit:create_company
" class="btn btn-primary btn-lg"><i class="fa fa-user-plus"></i> 员工登陆</a>
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
