<?php 
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] .'/inc/session.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/inc/db.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/inc/pager.php';
    echo display_error();   
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>攻略区</title>

<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
  <?php if(is_login()) echo '欢迎！！！用户： ' . current_user() ;?>
</code>
<p>
</p>
<code class="language-html">
<nav>
<ul>
	<li><a href="index.php">主页</a> </li>  
   <li><a href="GL.php" title="">ALL</a>
  <?php
    
    $query = $db->query('select * from catelogries');
    while ( $catalog =  $query->fetchObject() ) {
  ?>
    <li><a href="?catalog_id=<?php echo $catalog->id ?>" title=""><?php echo $catalog->name ?></a></li>
  <?php } ?>          
</ul>  
<nav>
</code>

<form action="GL.php" method="post" >
  <input type="text" name="title" value="" />
  <input type="submit" value="搜索" />
</form>
<?php
        if (isset($_POST['title'])) {
          $s = "where title like '%{$_POST['title']}%'" ;
        }else{
          $s = "" ;
        }
?>
<br>

<div style="border: 5px solid #FFFFFF; width: 1440px; height: 500px;margin: 0 auto;">
    <tbody>
     <?php if(!isset($_POST['title'])){ ?>

<h3>当前分类： 
<?php 
  if(!isset($_GET['catalog_id']))
    echo 'ALL';
  else{
  $a = "where id='{$_GET['catalog_id']}'" ;
  $query = $db->query("select name from catelogries {$a} ");
  $query->execute();
  $result = $query->fetchObject();
  echo $result->name; }?>
  </h3>
<?php }?>
      <?php

        //require_once '../../inc/db.php';
        if (isset($_GET['catalog_id'])) {
          $filter = "where catalog_id='{$_GET['catalog_id']}'" ;
        }else{
          $filter = "" ;
        }

         $pager = new Pager("select *from posts {$filter} {$s} ");
          if(isset($_GET['page'])){
          $query = $pager->query($_GET['page']);
        } else{
          $query = $pager->query();
        }

        while ( $post =  $query->fetchObject() ) {

      ?>
          <tr>
            <td><a href="show.php?id=<?php print $post->id; ?>"><?php echo $post->title; ?></a></td>
            <td><?php echo $post->created_at; ?></td>
            <br>
            
          </tr>

      <?php  } ?>

    </tbody>
</div>
<?php echo $pager->nav_html(); ?>
<a href="new.php">上传攻略</a>
</span>
</article>
</pre>
</body>
</html>