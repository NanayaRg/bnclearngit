<?php 
  require_once '../inc/common.php';
  session_start();
  unset($_SESSION['uid']);
  redirect_to('/');
?>