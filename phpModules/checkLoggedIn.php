<?php
$is_logged_in=0;
if ($_SESSION['loggedin'] == false) {
    $is_logged_in=0;
}else {
	if ($_SESSION['loggedin'] == true) {
        $is_logged_in=1;
	}
}
?>
<li>

<?php 
    if($is_logged_in==1){
	?>
		<a href="logout.php" ><?php echo "Logout";?></a>
<?php }?>
</li>
<li>
    <?php 
    if($is_logged_in==0){
	?>
		<a href="login.html"><?php echo "Login";?></a>
    <?php }?>
</li>
