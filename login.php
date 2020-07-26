<?php 
	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		if(isset($_POST['customer'])){
			$customer=$_POST['customer'];
			$email=$customer['email'];
			$password=$customer['password'];	
			$conn=mysqli_connect("localhost","root","root");
			if (strlen($email) == 0) {
				echo "login failed!";
				return;
			}
			if (strlen($password) <2 || strlen($password)>30) {
				echo "login failed!";
				return;
			}
			$emailformat = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
			if (!preg_match($emailformat,$email)) {
				echo "login failed!";
				return;
			}
			if(!$conn){
				die(mysqli_error($conn));
			}
			//echo "OK!<br>";
			$conn->set_charset('utf8');
			$result=mysqli_select_db($conn,"smartfood");
			$email=mysqli_real_escape_string($conn, $email);
			$password=mysqli_real_escape_string($conn, $password);
			$result=mysqli_query($conn,"select * from user where email='$email' and passhash='$password';");
			$check=mysqli_fetch_array($result);
			$user_id=$check['user_id'];
			if(is_null($check)){
				echo "login failed!";
				header("refresh: 1;url=./login.html");
			}
			else{
				// $role=$check['role1'];
				session_start();
				$_SESSION['loggedin']=true;
				$value=generateRandomString();
				$_SESSION['value']=$value;
				$result=mysqli_query($conn,"select * from sessionlogin where user_id='$user_id'");
				$check=mysqli_fetch_array($result);
				if(is_null($check['user_id'])){
					$result=mysqli_query($conn,"Insert into sessionlogin(user_id,value) values ('$user_id','$value')");
				}
				else{
					$result=mysqli_query($conn,"update sessionlogin set value='$value' where user_id='$user_id'");
				}
				//$_SESSION['role']=$rol/e;
				header("refresh: 1;url=./index.php");
			}
		}
	}

?>