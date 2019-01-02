<?php 
 		session_start();
 		require_once '../inc/session.php';
        require_once '../inc/db.php';
        require_once '../inc/common.php';
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
	<h1> 用户注册 </h1>
 		<?php 
        echo display_error();
 	     ?>
<br/>
	<form action="save.php" method="post">
	   <input type="text" required="required" placeholder="用户名" name="name" />
	   <br/>
	   <input type="password" required="required" placeholder="密码" name="password" />
	   <br/>
		 <input type="password" required="required" placeholder="确认密码" name="password2" />
		 <input type="hidden" name="role" value = "1"/>
	   <button class="but" type="submit">注册</button>
	</form>
	<br/>
	<a href="../">返回主页</a>
</div>
</body></html>