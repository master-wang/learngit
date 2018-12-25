<?php
require_once "./tool.php";
$content=post('content');
$pname=post('pname');
$sql="insert into liuyan(pname,content) values('$pname','$content')";

$db=conn();

$count=$db->exec($sql);
$db=null;
header('Location:./index.php');
?>