<?php
session_start();
require_once '../inc/session.php';
require_once '../inc/db.php';
require_once '../inc/common.php';
$name = trim($_POST['name']);
if($_POST['password'] == $_POST['password2']){
	if(load_user($name)){		
		set_error("用户名已存在！");
		redirect_back();
	}else{
		$pwd = encrypt_password($_POST['password']); 
		$created_at = date('Y-m-d H:i:s');	//CURRENT_TIMESTAMP
		$sql = "insert into users(name,password,created_at,role) values(:name, :password,:created_at,:role);" ;	
		$query = $db->prepare($sql);
		$query->bindParam(':name',$name,PDO::PARAM_STR);
		$query->bindParam(':password',$pwd,PDO::PARAM_STR);
		$query->bindParam(':created_at',$created_at,PDO::PARAM_STR);
        $query->bindParam(':role',$_POST['role'],PDO::PARAM_STR);
		if (!$query->execute()) {	
			print_r($query->errorInfo());
		}else{
			redirect_to("../");
		};
	}
}else{
	set_error('两次密码不一致');
	redirect_back();		
}
?> 