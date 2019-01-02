<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>new | DNF</title>
  <link rel="stylesheet" type="text/css" href="style.css"/> 
</head>
<body>
<h1>上传攻略</h1>
<?php
  session_start();
  require_once $_SERVER["DOCUMENT_ROOT"] . '/inc/db.php';
  require_once $_SERVER["DOCUMENT_ROOT"] .'/inc/session.php';
  $sql = "select id from users where name = '{$_SESSION['uid']}'";
  $query = $db->prepare($sql);
  $query->execute();
  $writer = $query->fetchObject();
?>
<form action="save.php" method="post"  enctype="multipart/form-data">
	<input type="hidden" name='writer_id' value='<?php echo $writer->id; ?>'/>
	<label for="title">title</label>
	<input type="text" name="title" value="" />
	<br/>
	<br/>
	职业分类：<select name="catalog">
	<?php
		require_once $_SERVER["DOCUMENT_ROOT"] . '/inc/db.php';
		$query = $db->query('select *from catelogries');
		while($catalog = $query->fetchObject()){
	?>
			<option value="<?php echo $catalog->id ?>"><?php echo $catalog->name ?></option>
	<?php }?>
	</select>
	<br/>
	<br/>
    <label for="tags">标签（多个标签使用,分隔）：</label>
    <input type="text" name="tags" />
    <br/>
    <br/>
    <label for="pic">pic</label>
    <input type="file" name="pic" >
    <br/>
	<br/>
	<label for="body">body</label>
	<textarea name="body"></textarea>
	<br/>
	<input type="submit" value="提交" />
</form>

</body>
</html>