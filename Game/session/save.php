<?php
session_start();
require_once '../inc/session.php';
require_once '../inc/common.php';
require_once '../inc/db.php';

$query = $db->prepare('select * from users where name= :name');
$query->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
$query->execute();

$hash = $query->fetchObject()->password;
if(encrypt_password($_POST['password'])==$hash){
	$_SESSION["uid"]=$_POST['name'];
	redirect_to('../admin/index.php');
}else{
	set_error("用户名或密码错误");
	redirect_back();
}
?>	