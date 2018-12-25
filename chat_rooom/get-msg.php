<?php
require_once "tool.php";

$db=conn();
$id=get('id');
$sql='select * from wang_chat where id>:id';

$stmt=$db->prepare($sql);

$stmt->execute([':id'=>$id]);
header('content-type:application/json');
echo json_encode($stmt->fetchAll());





?>