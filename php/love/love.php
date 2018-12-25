<?php
require_once "./tool.php";
$content=post('content');

$sql='insert into love(content) values("'.$content.'");

$db=conn();

$count=$db->exec($sql);
echo $count;

$db=null;
header('Location:./index.php');
?>