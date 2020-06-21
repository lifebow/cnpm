<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		if(isset($_POST['customer'])){
			$customer=$_POST['customer'];
			$email=$customer['email'];
			$name=$customer['name'];
			$phoneNumber=$customer['phoneNumber'];
			$password=$customer['password'];
			$gender=1;
			$role=3;	
			$conn=mysqli_connect("localhost","root","root");

			if(!$conn){
				die(mysql_error());
			}
			//echo "OK!<br>";
			$conn->set_charset('utf8');
			$result=mysqli_select_db($conn,"smartfood");
			$result=mysqli_query($conn,"call addUser('$name','$email','$password','$phoneNumber','$gender','$role');");
			$check=mysqli_fetch_array($result);
			//echo $check[0];
			if($check[0]==-1){
				echo "Email has registered!";
				header("refresh: 2;url=./register.html");
			}
			else{
				echo "Success";
				header("refresh: 2;url=./login.html");
			}
		}
	}

?>
          