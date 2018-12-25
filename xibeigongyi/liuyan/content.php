<!DOCTYPE html>
<html>
<head>
	<title>表白内容</title>
	<meta charset="utf-8">
	<style type="text/css">
	body{
		background: url(a.jpg);
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
			color:#666666;
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
		.middle{
          
           text-align: center;
		}
		.middle form textarea{
			
			box-shadow: 5px 5px 10px #999999;
			background:rgba(225,225,225)
		}

	</style>
</head>
<body>
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
		<p><span class="wname"><?=$row['pname']?></span>&nbsp;&nbsp;&nbsp; <span class="wtime"><?=$row['created_at']?></span></p>
	</div>
	<div class="middle">
<?php

}
?>


<a href="index.php">返回留言墙首页</a>
<a href="">回到首页</a>
<form action="comment.php" method="post">
	<input type="hidden" name="liuyan_id" value="<?php echo $id ?>" >
	<p><textarea name="content" id="" cols="70" rows="10" placeholder="写下对他的评论。。。"></textarea></p>
	<p><input class="nicheng" name="pname" type="text" placeholder="输入你的昵称"></p>
	<p><input type="submit" value="发表评论"></p>
</form>




<?php
$sq='select * from pinglun where liuyan_id='.$id.' order by created_at desc';
$res=$db->query($sq);
foreach ($res as $row) {
?>
</div>
<div class="comment-item">
	 <p><?php
			echo $row['content'];
		   ?></p>
		<p><span><?=$row['pname']?></span> <span><?=$row['created_at']?></span></p>	
</div>
<?php
}
?>
</body>
</html>