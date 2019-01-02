<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>edit | 博客 </title>
  <link rel="stylesheet" type="text/css" href="Login.css"/> 
</head>
<div class="login">  
<body>
	<?php 
		require_once $_SERVER["DOCUMENT_ROOT"] . '/inc/db.php';
		$id = $_GET['id'];
	    $query = $db->prepare('select * from users where id = :id');
	    $query->bindValue(':id',$id,PDO::PARAM_INT);
	    $query->execute();
	    $user = $query->fetchObject();  		
	?>

    <form action="update.php" method="post">
		<h1><input type="hidden" name="id" value = "<?php echo $id; ?>"/>
		是否赋予用户名为<?php echo $user->name; ?>的用户权限?</h1>
		<input type="hidden" name="role" value = "0"/>
		<button class="but" type="submit">确定</button>
	</form>	
</body>
</div>
</html>