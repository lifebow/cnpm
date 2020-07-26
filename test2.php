<?php
session_start();
  $conn=mysqli_connect("localhost","root","root");
  if(!$conn){
     die(mysqli_error());
  }
  $result=mysqli_select_db($conn,"smartfood");
  var_dump($result);
  $conn->set_charset('utf8');
  $user_id='2';
  $result=mysqli_query($conn,"call showOrderUser($user_id);");
  var_dump($result);
  var_dump($_POST);
?>