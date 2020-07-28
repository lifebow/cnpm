<?php 
	//ob_start();
	$url = "ITstaff.php";
	$date_shutdown = $_POST['date-shutdown'];
    $time_shutdown = $_POST['time-shutdown'];

    $myfile = fopen("shutdown-log.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $date_shutdown);
    fwrite($myfile, "\n");
    fwrite($myfile, $time_shutdown);
    fwrite($myfile, "\n");
    fclose($myfile);

    header( "Location: $url" );
?>