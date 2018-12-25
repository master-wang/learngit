<?php
require_once "./tool.php";
$data = json_decode(file_get_contents('php://input'), true);
$usename=$data['usename'];
$db=conn();

$yan="SELECT * FROM `signed` WHERE usename='{$usename}'";
$q=$db->query($yan);
$rows = $q->fetchAll();
$rowCount = count($rows);

if($rowCount==1){
    echo  1;
}else{
    echo 0;
}

?>