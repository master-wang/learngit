<?php
$users=[
	"user1"=>123456,
	"user2"=>000000,
	"user3"=>111111
];
$username=@$_POST["username"];
$password=@$_POST["password"];
if(array_key_exists($username,$users)&&$users[$username]==$password){
	echo "登陆成功！！！";
}else{
	echo "登录失败！！！";
}
?>
<style type="text/css">
	
	.div1{
		width: 100px;
		height: 100px;
		background-color: #ccc;
	}
</style>
<form method="post">
	<p>账号：<input type="text" name="username"></p>
	<p>密码：<input type="text" name="password"></p>
	<p><input type="submit" value="登录"></p>
</form>
<div class="div1">
	
</div>
