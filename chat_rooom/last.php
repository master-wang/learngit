<?php

//用于当前聊到哪里的记录
require_once "tool.php";

$sql="select id from wang_chat order by id desc limit 0,1";

$db=conn();
$stmt=$db->prepare($sql);

$stmt->execute();

$res=$stmt->fetch();

?>
var last_id=<?=$res['id']?>;