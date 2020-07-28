<?php 
	//ob_start();
	$url = "ITstaff.php";
	$date_restart = $_POST['date-restart'];
    $time_restart = $_POST['time-restart'];

    $myfile = fopen("restart-log.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $date_restart);
    fwrite($myfile, "\n");
    fwrite($myfile, $time_restart);
    fwrite($myfile, "\n");
    fclose($myfile);

    header( "Location: $url" );
?>