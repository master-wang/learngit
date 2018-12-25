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

$sql='select * from love where id='.$id;

$res=$db->query($sql);

$love=null;
foreach ($res as $row) {
	$love=$row;
	break;
}

?>


<div class="content">
	<p><?=$love['created_at']?></p>
	<p><?=$love['content']?></p>
	
</div>
<a href="index.php">返回表白墙首页</a>
<form action="comment.php" method="post">
	<input type="hidden" name="love_id" value="<?=$love['id']?>">
	<p><textarea name="content" id="" cols="30" rows="30" placeholder="写下您的评论。。。"></textarea></p>
	<p><input type="submit" value="发表评论"></p>
</form>
<?php
$sq='select * from comment where love_id='.$id.' order by creat_at desc';
$res=$db->query($sq);
foreach ($res as $row) {
?>
<div class="comment-item">
	<p><?=$row['creat_at']?></p>
	<p><?=$row['content']?></p>
	
</div>
<?php
}
?>
</body>
</html>