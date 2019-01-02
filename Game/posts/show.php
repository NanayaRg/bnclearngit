<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>show | 博客 | </title>
  <link rel="stylesheet" type="text/css" href="show.css">
</head>
<body>
<?php
  require_once $_SERVER["DOCUMENT_ROOT"] . '/inc/db.php';

$query = $db->prepare('select * from posts where id = :id');
$query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
$query->execute();
$post = $query->fetchObject(); 

$query = $db->prepare('select * from users where id = :writer_id');
$query->bindValue(':writer_id',$post->writer_id,PDO::PARAM_INT);
$query->execute();
$writer = $query->fetchObject();



$query = $db->prepare('select * from tags_posts where post_id = :id');
$query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
$query->execute();


?> 
<header>
<h1><?php echo $post->title ?></h1>
<p>作者：<?php echo $writer->name?> &nbsp;&nbsp;&nbsp; 标签：<?php
     while($tag = $query->fetchObject()){
      $sql = "select name from tags where id = $tag->tag_id";
      $query = $db->prepare($sql);
      $query->execute();
      $result = $query->fetchObject();
      echo $result->name;
     }   
?>  </p>
<p>创建时间：<?php echo $post->created_at; ?></p>
</header>
<img src="<?php echo $post->pic; ?>" alt="for pic" width="304" height="228">
<div id="content">
  <section>
  <p><?php echo $post->body ?></p>
  <br>
</section>
</div>  
              
<ol>
   <h1>评论</h1>
  <?php
    $query = $db->query('select * from comments where post_id = ' . $_GET['id']);
    while ( $comment =  $query->fetchObject() ) {
      $r = $db->query('select * from rate where id = ' . $comment->rate_id);
      $rate =  $r->fetchObject();
      $w = $db->query('select * from users where id = ' . $comment->writer_id);
      $writer =  $w->fetchObject();
      ?>
      <div style="border-style:outset; border-radius:10px">
          <li>
           <h4><?php echo $comment->title;?>&nbsp;&nbsp;&nbsp;<?php echo ' '.$rate->body;?><br>评论人:<?php echo $writer->name?></h4>
            <p><?php echo $comment->body; ?></p>       
          </li>
        </div>
        <br>
 
    <?php  } ?>
    <table border=1>
            <td>
              <a href="GL.php">返回</a>
            </td>   

</body>
</html>