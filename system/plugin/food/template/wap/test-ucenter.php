<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="<?php echo FOOD_PATH?>wap/js/jquery-2.1.4.min.js"></script>
</head>
<body>
<form method="post" action="">
	<dl><dt>用户名</dt><dd><input name="username"></dd>
	<dt>密码</dt><dd><input name="password"></dd>
	<dt>Email</dt><dd><input name="email"></dd></dl>
    <a href="javascript:;" id="add"> 提交</a>
</form>
	
</body>
</html>
<script type="text/javascript">
	$(function(){
		$('#add').click(function(){
         var username = $("input[name='username']").val();
         var password = $("input[name='password']").val();
         var email= $("input[name='email']").val();
         var data = {}
         data.username = username;
         data.password = password;
         data.email = email;
         console.log(data);
         $.post('?m=plugin&cn=test&p=wap&id=food:sit:adduser',data,function(re){
           console.log(re);
         });
		});
	});
</script>