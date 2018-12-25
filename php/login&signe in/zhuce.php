<?php
require_once "./tool.php";
// 接收


// 处理, 变成数组
$data = json_decode(file_get_contents('php://input'), true);

$usename=$data['usename'];
$password=$data['password'];

$sql="INSERT INTO `login`(`usename`,`password`) VALUES('{$usename}','{$password}')";

$db=conn();
$count=$db->exec($sql);
$db=null;
if($count=1){
    echo $password."注册成功！".$usename;
    
}else{
    echo "注册失败！";
    
}

?>