<?php
require_once "tool.php";
$liuyan_id=post('liuyan_id');

$content=post('content');
$pname=post('pname');

$sql="insert into pinglun(liuyan_id,pname,content) values('$liuyan_id','$pname','$content')";

$db=conn();
$count=$db->exec($sql);

header("Location:content.php?id=".$liuyan_id);
?>