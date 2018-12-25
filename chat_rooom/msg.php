<?php
require_once "tool.php";
$nickname=$_POST['nickname'];
$msg=$_POST['msg'];


header('content-type:application/json');


if($msg==""){
	echo json_encode(['code'=>-2,'msg'=>'聊天消息不能为空！']);
	exit;
}


$db=conn();
$sql='insert into wang_chat(nickname,msg) values(:nickname,:msg)';
$stmt=$db->prepare($sql);

$stmt->execute([':nickname'=>$nickname,':msg'=>$msg]);



if($db->lastInsertId()>0){
	echo json_encode(['code'=>0,'msg'=>'success']);
	exit;
}else{
	echo json_encode(['code'=>1,'msg'=>'failed']);
	exit;
}
?>