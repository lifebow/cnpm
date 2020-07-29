<?php
$myfile = fopen("shutdown-log.txt", "r") or die("Unable to open file!");
$date_shutdown = fgets($myfile);
$day_shutdown = substr($date_shutdown, 0, 2);
$month_shutdown = substr($date_shutdown, 3, 2);
$year_shutdown = substr($date_shutdown, 6, 4);
$date_shutdown = $year_shutdown . '-' . $month_shutdown . '-' . $day_shutdown;
$time_shutdown = fgets($myfile);
$day=date("d/m/y h:i")
?>
