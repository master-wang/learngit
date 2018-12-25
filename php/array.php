<?php
// $a=["aaaa","b"=>"我的奇偶is","cccc"];
// var_dump($a);
// echo "<br>".$a["b"];


$arr=[];
for ($i=0; $i <10 ; $i++) { 
	$arr["num".($i+1)]=rand(1,100);
}
var_dump($arr);
?>