<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>用户列表 - 博客</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
  <table border=1  style="margin: 0 auto;">
    <caption><h1>用户列表</h1></caption>
    <thead>
      <tr>
        <th>id</th>
        <th>姓名</th>
        <th>创建日期</th>
        <th>操作</th>        
      </tr>
    </thead>
    <tbody>
      <?php 
        require_once $_SERVER["DOCUMENT_ROOT"] . '/inc/db.php';
        
        $query = $db->query('select * from users');
        while ( $user =  $query->fetchObject() ) {
          
      ?>
          <tr>
            <td><?php echo $user->id; ?></td>
            <td><a href="show.php?id=<?php print $user->id; ?>"><?php echo $user->name; ?></a></td>
            <td><?php echo $user->created_at;?></td>
            <td> 
              <a href="../../users/delete.php?id=<?php echo $user->id; ?>">删除该用户</a>
              <a href="../../users/edit.php?id=<?php echo $user->id; ?>">赋予该用户权限</a>  
            </td>        
          </tr> 
      <?php  } ?>
    </tbody>
  </table>
</body>
<br>
<table border=1 align="center">
            <td>
              <a href="index.php">返回</a>
            </td>   
</html>

