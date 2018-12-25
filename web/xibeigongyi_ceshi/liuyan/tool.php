<?php
function get($name){
	return isset($_GET[$name])?$_GET[$name]:"";
}
function post($name){
	return isset($_POST[$name])?$_POST[$name]:"";
}
function conn(){
	//链接服务器
	//数据库驱动类型：host=主机名；dbname=数据库名；
	$dns="mysql:host=localhost;dbname=pinglunqu";
	//链接字符串，账号，密码；
	return (new PDO($dns,"root","456283"));
}

?>