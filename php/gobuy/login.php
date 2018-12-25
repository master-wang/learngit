<?php
require_once "./tool.php";
$data=json_decode(file_get_contents('php://input'),true);
$usename=$data['usename'];
$password=$data['password'];
$db=conn();
$sql="SELECT * FROM `signed` WHERE `usename`='{$usename}' AND `password`='{$password}'";
$q=$db->query($sql);
$rows=$q->fetchAll();
$count=count($rows);

function yanzheng($count,$usename,$password){
          $db=conn();
        if($count==0){
            echo 0;
        }else{
            $sql="SELECT `id`, `name`, `usename` FROM `signed` WHERE `usename`='{$usename}' AND `password`='{$password}'";
            $res=$db->query($sql);
            
            foreach($res as $row){
                $arr=array("id"=>$row['id'],"name"=>$row['name'],"usename"=>$row['usename']);
            }
            echo json_encode($arr);
        }
}
yanzheng($count,$usename,$password)
?>