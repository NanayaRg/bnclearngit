<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/inc/db.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/inc/common.php';
$id = $_POST['id'];
$sql = "update users set role = :role where id = :id;" ;	
$query = $db->prepare($sql);
$query->bindValue(':role',$_POST['role'],PDO::PARAM_INT);
echo $query->bindValue(':id',$id,PDO::PARAM_INT);
if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("../DNF/post/user.php");
};
?>