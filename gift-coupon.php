<?php 
	$user_id = $_POST['user'];
	$coupon_id = $_POST['coupon'];
	$num = intval($_POST['num']);
	$conn=mysqli_connect("localhost","root","root");
	if(!$conn){
		die(mysqli_error($conn));
	}
	$conn->set_charset('utf8');
	$result=mysqli_select_db($conn,"smartfood");
	$result=mysqli_query($conn,"call addCouponUser('$user_id','$coupon_id','$num');");
	$check=mysqli_fetch_array($result);
	if($check[0]==-1){
		echo "Lỗi";
	}
	elseif ($check[0] == 1){
		echo "Thành công!";
	}
	else {
		echo mysqli_error($conn);
	}
 ?>