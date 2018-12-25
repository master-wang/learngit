<!DOCTYPE html>
<html>
<head>
	<title>留言墙</title>
	<meta charset="utf-8">
	<style type="text/css">
		body{
			background:url(./imgs/发布一条留言.jpg);
			background-size: 100% 100% ;
			background-attachment: fixed;
		}
		a{
		text-decoration: none;
	}
		h1{
			margin-top:30px;
			margin-bottom: 50px;
			margin-left: 45%;
			color: black;
		}
		/*p区块*/
		.p_main .item{
			/*background-color: pink;*/
			/*background:rgba(225 225 225 0.5);*/
			margin-bottom:15px;
			width: 90%;
			box-shadow: 5px 5px 5px grey;
			border:1px solid black;
			border-color:grey;
			margin-left:5%;
			
			
		}
		

		}
		.item p+p{
		color:#888; 
		border-radius: 10px;
		
		}
		
		/*左侧连接块*/
		.adiv{
            position: fixed;
			float:left;
			margin:20px;
        }
        /*左侧链接块里的链接*/
		.adiv a{
			display: block;
			padding: 6px 12px;
			margin-right: 10px;
			margin-bottom: 20px;
			font-size: 14px;
			width:60px;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 4px;
			color: #fff;
			background-color: #5cb85c;
			border-color: #4cae4c;
			box-shadow: 0 0 10px #5cb85c;
		}
		/*除链接以外的内容*/
		.p_main{
			/*border:1px solid ;*/
			width: 60%;
			margin-left: 20%;
			padding: 20px;
			border-radius: 15px;
			-webkit-box-shadow: 0 0 50px rgb(54, 137, 214);
			-moz-box-shadow: 0 0 50px rgb(54, 137, 214);
			box-shadow: 0 0 50px rgb(54, 137, 214);
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
         	color:blue;
		 }
		 /* 评语 */
		 .wsay{
            font-size: 18px;
            color:#d9d919;
            letter-spacing: 3px;
            text-shadow: 1px 1px 2px grey;
		}
	</style>
</head>
<body><!-- 回到顶部的描 -->
		<div id="top"></div>
	<h1>论坛</h1>


	<div class="adiv">
	<a href="./liuyan.html">发一个评论</a>
	<a href="../gongyishouye/index.html">回到首页</a>
	<a href="#top">回到顶部</a>
    </div>

    <div class="p_main">
		
		

<?php
require_once "./tool.php";
$db=conn();
$sql='select * from liuyan order by created_at desc';
$res=$db->query($sql);
foreach ($res as $row) {
?>
 
	<div class="item" style="background:url('./imgs/liuyanbana.jpg');background-attachment: fixed;
			background-repeat:no-repeat;background-size:50% 85%;background-position: 50% 50%;">
		<p class="massage wsay"><?php
			echo substr($row['content'],0,50);
			echo '...<a class="cha" href=./content.php?id='.$row['id'].'>详细内容  / 评论</a>';
		   ?></p>
		<p><span class="name1">BY____<?=$row['pname']?></span> <span><?=$row['created_at']?></span></p>
	</div>
	
<?php

}
?>
	</div>
	
</body>
</html>