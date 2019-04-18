<?php
@ob_start();
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  echo('<meta http-equiv="refresh" content="0;URL=login.php" />');
  exit;
}
else{
  header("location: admin/livros/list.php");
  //echo('<meta http-equiv="refresh" content="0;URL=admin/livros/list.php" />');
 exit;
}
?>
 