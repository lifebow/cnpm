<?php
	$name=$_POST['name'];
	$conn=mysqli_connect("localhost","root","root");

    if(!$conn){
        die(mysql_error());
    }
    $conn->set_charset('utf8');
    $result=mysqli_select_db($conn,"smartfood");

    $result=mysqli_query($conn,"delete from food where name='$name';");// injection
    if($result){
            echo "Thành công!";
     }
    else{
        echo "Error to call function";
    }        
?>
