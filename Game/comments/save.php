<?php 
require_once '../inc/db.php';
require_once '../inc/common.php';
$sql = "insert into comments(title,body,created_at,post_id,rate_id,writer_id) values(:title, :body,:created_at,:post_id,:rate_id,:writer_id);" ;
var_export($_POST['writer_id']);  
$query = $db->prepare($sql);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindParam(':created_at',$created_at,PDO::PARAM_STR);
$query->bindParam(':post_id',$_POST['post_id'],PDO::PARAM_INT);
$query->bindParam(':rate_id',$_POST['rate_id'],PDO::PARAM_INT);
$query->bindParam(':writer_id',$_POST['writer_id'],PDO::PARAM_INT);

if (!$query->execute()) { 
  print_r($query->errorInfo());
}else{
  redirect_back();
};
?>