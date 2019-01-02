<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>delete | 博客</title>
  <link rel="stylesheet" type="text/css" href="SC.css"/> 
</head>
<body>
<div class="login"> 	
	<?php $id = $_GET['id']; ?>
	<form action="destroy.php" method="post">
		<h1><input type="hidden" name="id" value = "<?php echo $id; ?>"/>
		是否删除ID为<?php echo $id; ?>的帖子?</h1>
		<input type="submit" value="确定">
	</form>	
</div>
</body>
</html>