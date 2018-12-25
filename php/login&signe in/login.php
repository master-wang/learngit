<?php
require_once "./tool.php";
$db=conn();
$sql="select * from login";
$a=$db->query($sql);
$str="{";
foreach($a as $row){
    $str=$str.$row['usename'].':'.$row['password'].',';
}
$str=$str.'}';
echo $str;
?>