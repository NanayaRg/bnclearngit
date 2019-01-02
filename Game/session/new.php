<?php 
session_start();
require_once '../inc/db.php';
require_once '../inc/common.php';
require_once '../inc/session.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户</title>
	<link rel="stylesheet" type="text/css" href="Login.css"/> 
</head>
<body>
<div class="login">    	
	<h1> 用户登录 </h1>
	<?php
	echo display_error();		
	 ?>
	 <br/>
	<form action="save.php" method="post">
	   <input type="text" required="required" placeholder="用户名" name="name" />
	   <br/>
	   <input type="password" required="required" placeholder="密码" name="password" />
	   <button class="but" type="submit">登录</button> 
	</form>
	<br/>
	<a href="../users/new.php">注册</a>
	<a href="../">返回主页</a>
 </div>
</body>
</html>