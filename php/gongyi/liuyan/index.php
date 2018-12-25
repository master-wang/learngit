<!DOCTYPE html>
<html>
<head>
	<title>留言墙</title>
	<meta charset="utf-8">
	<style type="text/css">
		.item{
			background-color: #ddd;
			margin: 20px;

		}
		.item p+p{
		color:#888; 
		}
	</style>
</head>
<body>
	<a href="./liuyan.html">发一个留言</a>
<?php
require_once "./tool.php";
$db=conn();
$sql='select * from liuyan order by created_at desc';
$res=$db->query($sql);
foreach ($res as $row) {
	?>
	<div class="item">
		<p><?php
			echo substr($row['content'],0,20);
			echo "...<a href=./content.php?id=".$row['id'].">详细内容  / 评论</a>";
		   ?></p>
		<p><span><?=$row['pname']?></span> <span><?=$row['created_at']?></span></p>
	</div>
<?php

}
?>
</body>
</html>