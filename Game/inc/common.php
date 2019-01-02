<?php 
  function redirect_to($dest="/"){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $dest"); 
    exit();
  }
  
  function redirect_back(){
  	header("Location: {$_SERVER['HTTP_REFERER']} "); 
  	exit();
  }
?>