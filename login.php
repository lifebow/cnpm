<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		if(isset($_POST['customer'])){
			$customer=$_POST['customer'];
			$email=$customer['email'];
			$password=$customer['password'];	
			$conn=mysqli_connect("localhost","root","root");

			if(!$conn){
				die(mysql_error());
			}
			//echo "OK!<br>";
			$conn->set_charset('utf8');
			$result=mysqli_select_db($conn,"smartfood");
			$result=mysqli_query($conn,"select * from user where email='$email' and passhash='$password';");
			$check=mysqli_fetch_array($result);
			$user_id=$check['user_id'];
			if(is_null($check)){
				echo "login failed!";
				header("refresh: 1;url=./login.html");
			}
			else{
				$role=$check['role1'];
				session_start();
				$_SESSION['loggedin']=true;
				$_SESSION['email']=$email;
				$_SESSION['user_id']=$user_id;
				$_SESSION['role']=$role;
				header("refresh: 1;url=./vendorOwner.php");
			}
		}
	}

?>