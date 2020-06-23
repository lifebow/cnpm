<?php
	var_dump($_POST);
	$order_id=$_POST['order_id'];
	$num=$_POST['num'];
	$conn=mysqli_connect("localhost","root","root");

	if(!$conn){
		die(mysql_error());
	}
	//echo "OK!<br>";
	$conn->set_charset('utf8');
	$result=mysqli_select_db($conn,"smartfood");
	$result=mysqli_query($conn,"Update orderlist set num='$num' where orderlist_id=$order_id");
	$check=mysqli_fetch_array($result);
	var_dump($result);
?>