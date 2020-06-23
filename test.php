<?php
  session_start();
  $conn=mysqli_connect("localhost","root","root");
  if(!$conn){
     die(mysql_error());
  }
  $result=mysqli_select_db($conn,"smartfood");
  $conn->set_charset('utf8');
  $user_id=$_SESSION['user_id'];
  $result=mysqli_query($conn,"call showOrderUser($user_id);");
  $count=1;
  $food = array();
  $num=array();
  while ($row=mysqli_fetch_array($result)) {
    $food_id=$row['food_id'];
    $num1=$row['num'];
    array_push($food, $food_id);
    array_push($num, $num1);
  }
  mysqli_next_result($conn);
  foreach (array_combine($food,$num) as $food_id=> $num1) {
    echo $food_id;
    $result1=mysqli_query($conn,"select image,name from food where food_id='$food_id'");
    while ($row=mysqli_fetch_array($result1)) {
    echo $row['name'];
    echo "<br>";
    echo $row['image'];
    echo "<br>";
    echo $num1;
    echo "<br>";
  }
  }
?>