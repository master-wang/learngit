<?php
//链接服务器
//数据库驱动类型：host=主机名；dbname=数据库名；
$dns="mysql:host=localhost;dbname=mystudy";
//链接字符串，账号，密码；
$db=new PDO($dns,"root","456283");
//删除
/**
$count=$db->exec('delete from users where user="nihao"');
echo $count;
**/

//输出信息
// $res=$db->exec('select * from users where id=1');
// foreach($$res as $v) {
// 	print_r($v);
// }
$db=null;
?>