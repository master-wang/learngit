<!DOCTYPE html>
<html>
<head>
	<title>表白内容</title>
	<meta charset="utf-8">
	<style type="text/css">
	div{
		margin: 30 5px;
		margin-bottom: 35px;
		border:1px solid #00f;
	}
		p{
			width: 100%;
			word-break: break-all;
			background-color: #ccc;
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
		<p><?php
			echo $row['content'];
		   ?></p>
		<p><span><?=$row['pname']?></span> <span><?=$row['created_at']?></span></p>
	</div>
<?php

}
?>

<a href="index.php">返回留言墙首页</a>
<form action="comment.php" method="post">
	<input type="hidden" name="liuyan_id" value="<?php echo $id ?>">
	<p><textarea name="content" id="" cols="15" rows="15" placeholder="写下对他的评论。。。"></textarea></p>
	<p><input name="pname" type="text" placeholder="输入你的昵称"></p>
	<p><input type="submit" value="发表评论"></p>
</form>
<?php
$sq='select * from pinglun where liuyan_id='.$id.' order by created_at desc';
$res=$db->query($sq);
foreach ($res as $row) {
?>
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