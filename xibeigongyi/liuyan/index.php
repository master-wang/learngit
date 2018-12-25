<!DOCTYPE html>
<html>
<head>
	<title>留言墙</title>
	<meta charset="utf-8">
	<style type="text/css">
		body{
			background:url(发布一条留言.jpg);
			background-size: 100% 100% ;
			background-attachment: fixed;
		}
		/*p区块*/
		.item{
			/*background-color: pink;*/
			/*background:rgba(225 225 225 0.5);*/
			margin: 20px;
			width: 80%;
			box-shadow: 5px 5px 5px grey;
			border:1px solid black;
			border-color:grey;
			margin-left:20%;

		}
		

		}
		.item p+p{
		color:#888; 
		}
		/*左侧连接块*/
		.adiv{
            position: fixed;
			float:left;
			margin:20px;
        }
        /*左侧链接块里的链接*/
		.adiv a{
			color:black;
            padding: 10px;
            margin:5px;
			display: block;
            border:2px solid black;
            box-shadow: 5px 5px 5px grey;
		
		}
		/*除链接以外的内容*/
		.p_main{
			/*border:1px solid ;*/
			width: 80%;
			float:left;
			margin: 20px;
			/* box-shadow: 5px 5px 5px grey;*/
		}
		/*留言的内容*/
		.massage{
			color:#8e2323;
        }
        /*详细内容和评论*/
        .cha{
            display: block;
          	float:right;
            margin:20px;
          }
         /* 昵称*/
         .name1{
         	color:;
         }
	</style>
</head>
<body>
	<div class="total">
	<div class="adiv">
	<a href="./liuyan.html">发一个留言</a>
	<a href="">回到首页</a>
	<a href="#top">回到顶部</a>
    </div>

    <div class="p_main">
    	<div id="top"></div>
<?php
require_once "./tool.php";
$db=conn();
$sql='select * from liuyan order by created_at desc';
$res=$db->query($sql);
foreach ($res as $row) {
?>
 
	<div class="item">
		<p class="massage"><?php
			echo substr($row['content'],0,50);
			echo '...<a class="cha" href=./content.php?id='.$row['id'].'>详细内容  / 评论</a>';
		   ?></p>
		<p><span class="name1"><?=$row['pname']?></span> <span><?=$row['created_at']?></span></p>
	</div>
	
<?php

}
?>
	</div>
 </div>
</body>
</html>