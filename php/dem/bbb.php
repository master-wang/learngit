<?php
    	$data=array("flat"=>"长思公寓","house"=>"3","num"=>"334","dormitory"=>"true","condition"=>"电灯损坏"
,"remarks"=>"无","phone"=>"13812341234");
    header('Content-Type:application/json');//这个类型声明非常关键
    $data=json_encode($data);
    
    echo "$data";
?>