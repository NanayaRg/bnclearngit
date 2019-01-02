
<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . '/inc/db.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/inc/common.php';

var_export($_FILES);
$dest_path =  "/uploads/post-" . rand() .".jpg";
$dest = $_SERVER["DOCUMENT_ROOT"] . $dest_path ;
var_export($dest);
move_uploaded_file($_FILES["pic"]["tmp_name"], $dest);

$sql = "select id from tags where name = :tag_name";
$query = $db->prepare($sql);
$query->bindParam(':tag_name',$_POST['tags'],PDO::PARAM_STR);
$query->execute();
$tag_info = $query->fetchobject();

if (!$tag_info) {	
	$sql = "insert into tags(name) values(:tag_name)" ;	
	$query = $db->prepare($sql);
    $query->bindParam(':tag_name',$_POST['tags'],PDO::PARAM_STR);
    $query->execute();
    $tag_id = $db->lastInsertId();
}else{
	$tag_id = $tag_info->id;
};

$sql = "insert into posts(title,pic,catalog_id,body,created_at,writer_id) values(:title,:pic,:catalog, :body,:created_at,:writer_id);" ;	
$query = $db->prepare($sql);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':pic',$dest_path,PDO::PARAM_STR);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindParam(':catalog',$_POST['catalog'],PDO::PARAM_INT);
$query->bindParam(':created_at',$created_at,PDO::PARAM_STR);
$created_at = date('Y-m-d H:i:s');	//CURRENT_TIMESTAMP
$query->bindParam(':writer_id',$_POST['writer_id'],PDO::PARAM_INT);
if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	$post_id = $db->lastInsertId();
	$sql = "insert into tags_posts(tag_id,post_id) values(:tag_id,:post_id)" ;	
	$query = $db->prepare($sql);
    $query->bindParam(':tag_id',$tag_id,PDO::PARAM_INT);
    $query->bindParam(':post_id',$post_id,PDO::PARAM_INT);
    $query->execute();
	redirect_to("./GL.php");
};
?>