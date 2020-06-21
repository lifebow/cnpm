<?php
		$conn=mysqli_connect("localhost","root","root");
		if(!$conn){
				die(mysql_error());
		}
		echo "OK!<br>";
		$email="ab3qw11ce";
		$name="qwaeerqwq";
		$phoneNumber="12443";
		$password="2124";
		$gender=1;
		$role=3;	
		$conn->set_charset('utf8');
		$result=mysqli_select_db($conn,"smartfood");
		$user_id=15;
		$result=mysqli_query($conn,"select * from user;");
		$check=mysqli_fetch_array($result);
		echo "ok";
		if($check['num_rows']!=0){
			echo "login failed!";
		}
		echo $check['num_rows'];
		
?>
