<?php
	$id=$_POST['food_id'];
	$conn=mysqli_connect("localhost","root","root");

    if(!$conn){
        die(mysql_error());
    }
    $conn->set_charset('utf8');
    $result=mysqli_select_db($conn,"smartfood");

    $result=mysqli_query($conn,"call deleteUser('$id');");// injection
    $check=mysqli_fetch_array($result);
    if($result){
            echo "Thành công!";
     }
    else{
        echo "Error to call function";
    }        
?>
