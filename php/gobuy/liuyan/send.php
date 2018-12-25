<?php
require_once "./tool.php";
$data=json_decode(file_get_contents("php://input"),true);
$content=$data['content'];
$pname=$data['pname'];

$sql="INSERT into liuyan(pname,content) values('$pname','$content')";

$db=conn();

$count=$db->exec($sql);
$db=null;
if($count==1){
    echo 1;
}else{
    echo 0;
}
?>