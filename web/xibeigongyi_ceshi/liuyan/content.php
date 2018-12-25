<!DOCTYPE html>
<html>
<head>
	<title>表白内容</title>
	<meta charset="utf-8">
	<style type="text/css">
	body{
		background: url(./imgs/a.jpg);
		background-size:100% 100%;
		background-attachment:fixed;

	}
	div{
		margin: 30 5px;
		margin-bottom: 35px;
		border:1px solid transparent;
		width:80%; 
		margin:10px auto;

	}
		p{
			width: 100%;
			word-break: break-all;
			
		}
		a{
		text-decoration: none;
	}
		/*被评论的留言内容*/
		.item{
			background:rgba(225,225,225,0.4);
		    border:1px solid transparent;
		    text-align: center;
		}
		.wsay{
            font-size: 25px;
            color:#d9d919;
            letter-spacing: 3px;
            text-shadow: 1px 1px 5px grey;
		}
		.wname{
			font-size: 15px;
			color:blue;
		}
		.wtime{
			font-size: 15px;
			color:#666666;
		}
        /*评论块里的每一条评论内容*/
		.comment-item{
			background:rgba(225,225,225,0.3);
			border-radius: 25px;
			color:#000000;
			width:60%;
		}
		 /*中间部分_包括链接和表单*/
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
			width:50px;
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
		.wdiv2{     /* 表单*/
	   	
	   	height:70%;
		width:60%;
		margin-left: 20%;
		line-height: 50px;
		background-color: #ccc;
		border-radius: 10px;
			text-align: left;
		padding: 20px;
		opacity: 0.8;
		-webkit-box-shadow: 0 0 50px rgb(54, 137, 214);
		-moz-box-shadow: 0 0 50px rgb(54, 137, 214);
		box-shadow: 0 0 50px rgb(54, 137, 214);
	   }
		.wdiv2 textarea,input{      /*文本框的设置*/
		display: inline-block;
			padding: 6px 12px;
			margin-bottom: 0;
			font-size: 14px;
			font-weight: bold;
			line-height: 1.42857143;
			text-align: center;
			vertical-align: middle;
			cursor: pointer;
			user-select: none;
			background-image: none;
			border:1px solid transparent;
			border-radius: 4px;
			color: white;
			background-color: #5bc0de;
			border-color: #46b8da;
	 }
	</style>
</head>
<body>
	<div id="top"></div>
<?php
require_once "./tool.php";
$id=get('id');
$db=conn();
$sql='select * from liuyan where id='.$id.'';
$res=$db->query($sql);
foreach ($res as $row) {
	?>


	
	<div class="item">
		<p class="wsay">"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
			echo $row['content'];
		   ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"</p>
		<p><span class="wname">BY____<?=$row['pname']?></span>&nbsp;&nbsp;&nbsp; <span class="wtime"><?=$row['created_at']?></span></p>
	</div>
	<div class="middle">
<?php

}
?>

<div class="adiv">
<a href="index.php">论坛首页</a>
<a href="../gongyishouye/index.html">回到首页</a>
<a href="#top">回到顶部</a>
</div>

<div class="wdiv2">
<form action="comment.php" method="post">
	<input type="hidden" name="liuyan_id" value="<?php echo $id ?>" >
	<p><span>请输入您的评语：</span><textarea name="content" id="" cols="70" rows="10" placeholder="写下对他的评论。。。"></textarea></p>
	<p><span>请输入你的昵称：</span><input class="nicheng" name="pname" type="text" placeholder="输入你的昵称"></p>
	<p><input type="submit" value="发表评论"></p>
</form>
</div>



<?php
$sq='select * from pinglun where liuyan_id='.$id.' order by created_at desc';
$res=$db->query($sq);
foreach ($res as $row) {
?>
</div>
<div class="comment-item">
	 <p class="wsay"><?php
			echo $row['content'];
		   ?></p>
		<p><span class="wname">BY____<?=$row['pname']?></span> <span><?=$row['created_at']?></span></p>	
</div>
<?php
}
?>
</body>
</html>