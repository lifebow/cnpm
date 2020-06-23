
<?php 
	$orderlist_id=$_POST['orderlist_id'];
	$status2=$_POST['status2'];
	$conn=mysqli_connect("localhost","root","root");

	if(!$conn){
		die(mysql_error());
	}
	//echo "OK!<br>";
	$conn->set_charset('utf8');
	$result=mysqli_select_db($conn,"smartfood");
	$result=mysqli_query($conn,"update orderlist set status2='$status2' where orderlist_id='$orderlist_id'");
	$check=mysqli_fetch_array($result);
	if(!$result){
		echo "Thất bại";
	}
	else{
		echo "Thành công";
	}
?>