<?php
    echo "00000000";
//字符创函数
    echo strlen("dskjndkjns");//求字符创长度
    echo strpos("dsdads", "da")//求响应字符串在哪里的位置
//定义全局变量，长量
    define("NAME","this is value",false);//true为对大小写不敏感，反之
    //在函数中globle$全局变量名，方可引用
//字符串串接
    $a="hollow";
    $b=$a."world";
 	
//数组
    //$carss=array("sds","dfff","fdjfoia");
    //count($carss)  返回数组长度
    //var_dump($cars)返回数组内的类型和值
    //数组名【下标】访问数组的内容
    unset(数组名【下标】)删除数组对于的下标
    unset($arr)可删除整个数组
    print_r($arr),也可以输出数组，但是没有类型，只有键值的纯粹
    array_reverse($arr),转置数组
    $new_array=array_rand($arr,3)返回三个随机建值，组成新的数组
    array_unique($arr),去掉数组中重复的建值
    $a,$b   $arr=compact("a","b");则成为新的数组
    in_array("aa",$arr)检查数组是否存在一个值
    array_key_exists("键",$arr)查看数组是否存在这个键名
    sort()升序排序
	rsotr()降序排序
	asort()根据值，升序
	ksort()根据键，升序
	arsort()根据值，降序
	krsort()根据建，降序
	$number=range(0,50,10)返回包含 "0" 至 "50" 之间并以 10 递增的元素的数组：
	shuffle($arr)打乱数组；

    		//关联数组，与json差不多
    $age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
    
    $age1['Peter']="35";
	$age1['Ben']="37";
	$age1['Joe']="43";

	//遍历关联数组函数
	foreach($age as $v){
		echo $v;
		echo "<br>"
	}
	foreach ($age as $key => $value) {
		echo "key=".$key.",value=".$value;
	}
	unset($age["Ben"])删除数组对应的下标
	//php数组的排序
	/*
	sort()升序排序
	rsotr()降序排序
	asort()根据值，升序
	ksort()根据键，升序
	arsort()根据值，降序
	krsort()根据建，降序
	*/

		多维数组
	foreach($person as $v){
		foreach($v as $value){
			echo $value.",";
		}
	}
	foreach($person as $v){
		echo $v["name"].",".$v["age"];
	}



filesystem
	file_get_contens("网站")可以获得网站的所有信息页面
	file_put_contens(写入的文件,写入的东西,三中基本类型)
正则表达式
	preg_mach(正则表达式,原字符串,新数组)
	preg_mach_all(正则表达式,原字符串,新数组)
修正符
	i不区分大小写


//随机数
	rand(star_number,end_number);
	$arr=[];
	for ($i=0; $i <10 ; $i++) { 
		$arr["num".($i+1)]=rand(1,100);
	}
	var_dump($arr);
//超全局变量
	/*

	$GLOBALS['z'];
	$_SERVER['PHP_SELF'];
	$_REQUEST['表单的name'];
	$_POST[''];
	$_GET[''];

	empty($_POST['name'])可检查变淡name是否为空
	preg_match()可以通过正则表达式，检索字符串的格式

	*/
//高级教程
	//include与require都能直接引用php文件，在html中<?php  include "php.php

	//readfile("name.txt")读取文件的函数，加入缓冲区

//在服务器上打开文件，读取 关闭文件
	//fopen(""name.txr,"r");
	//fread();读取自定义疮毒 fgets()读取一行  feof()检查指针是否到达文件尾端了  fgetc()从文件读取单个字符
	//fwrite()写入文件
	//fclose()
//cookie
	//setcookie() 函数用于设置 cookie。
	//注释：setcookie() 函数必须位于 <html> 标签之前。
//Session
	//给页面一个唯一id
//FILTER_SANITIZE_EMAIL 从字符串中删除电子邮件的非法字符
//FILTER_VALIDATE_EMAIL 验证电子邮件地址
/*
filter_var() - 通过一个指定的过滤器来过滤单一的变量
filter_var_array() - 通过相同的或不同的过滤器来过滤多个变量
filter_input - 获取一个输入变量，并对它进行过滤
filter_input_array - 获取多个输入变量，并通过相同的或不同的过滤器对它们进行过滤
*/
?>