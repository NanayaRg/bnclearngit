<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>delete | 博客</title>
  <link rel="stylesheet" type="text/css" href="Login.css"/> 
</head>
<body>
<div class="login"> 	
	<?php $id = $_GET['id']; ?>
	<form action="destroy.php" method="post">
		<h1><input type="hidden" name="id" value = "<?php echo $id; ?>"/>
		是否删除ID为<?php echo $id; ?>的用户?</h1>
		<button class="but" type="submit">确定</button>
	</form>	
</div>
</body>
</html>