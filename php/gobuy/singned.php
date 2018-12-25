<?php
require_once "./tool.php";
$data = json_decode(file_get_contents('php://input'), true);
$name=$data['name'];
$sex=$data['sex'];
$phone=$data['phone'];
$usename=$data['usename'];
$password=$data['password'];
$yuanxi=$data['yuanxi'];
$chushengriqi=$data['chushengriqi'];

$db=conn();

$sql="INSERT INTO `signed`(`name`,`sex`,`phone`,`usename`,`password`,`yuanxi`,`chushengriqi`) VALUES('{$name}','{$sex}','{$phone}','{$usename}','{$password}','{$yuanxi}','{$chushengriqi}')";

$count=$db->exec($sql);
$db=null;
if($count==1){
    echo 1;
}else{
    echo 0;
}
?>