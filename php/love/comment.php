<?php
require_once "tool.php";
$love_id=post('love_id');
$content=post('content');


$sql='insert into comment(love_id,content,creat_at) values('.$love_id.',"'.$content.'",now())';

echo $sql;
$db=conn();
$count=$db->exec($sql);

header("Location:content.php?id=".$love_id);
?>