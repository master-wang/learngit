<!DOCTYPE html>
<html>
<head>
	<title>表白墙</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   	<meta http-equiv="X-UA-Compatible" content="ie=edge">
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
	<a href="./love.html">发一个表白</a>
<?php
require_once "./tool.php";
$db=conn();
$sql='select * from love';
$res=$db->query($sql);
foreach ($res as $row) {
	?>
	<div class="item">
		<p><?php
			echo substr($row['content'],0,20);
			echo "...<a href='./content.php?id=".$row['id']."'>详细内容</a>";
			?></p>
		<p><?=$row['created_at']?></p>
	</div>
<?php

}
?>
</body>
</html>