<?php 
	session_start();
	$conn=mysqli_connect("localhost","root","root");
	if(!$conn){
		die(mysqli_error($conn));
	}
	include("includes/permission_manageaccount.php");
	$value=$_SESSION['value'];
	$result=mysqli_select_db($conn,"smartfood");
	$conn->set_charset('utf8');
	$result=mysqli_query($conn,"call getUser_id('$value');");
	$check=mysqli_fetch_array($result);
	$user_id=$check['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Manage account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

		<!--
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>
							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>USD</option>
									<option>EUR</option>
								</select>
							</div>
						</div>
					</li>
					
					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>
					-->

<!-- Header -->
<header class="header1">
	<!-- Header desktop -->
	<div class="container-menu-header">
		<div class="topbar">
			<!--
			<div class="topbar-social">
				<a href="#" class="topbar-social-item fa fa-facebook"></a>
				<a href="#" class="topbar-social-item fa fa-instagram"></a>
				<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
				<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
				<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
			</div>
			-->
			<span class="topbar-child1">
				Ho Chi Minh University of Technology
			</span>
			<!--
			<div class="topbar-child2">
				<span class="topbar-email">
					fashe@example.com
				</span>
			
				<div class="topbar-language rs1-select2">
					<select class="selection-1" name="time">
						<option>USD</option>
						<option>EUR</option>
					</select>
				</div>
			</div>
			-->
		</div>

		<div class="wrap_header">
			<!-- Logo -->
			<a href="index.php" class="logo">
				<img src="images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Menu -->
			<div class="wrap_menu">
				<nav class="menu">
					<ul class="main_menu">
						<li>
							<a href="index.php">Home</a>
							<!--
							<ul class="sub_menu">
								<li><a href="index.php">Homepage V1</a></li>
								<li><a href="home-02.php">Homepage V2</a></li>
								<li><a href="home-03.php">Homepage V3</a></li>
							</ul>
							-->
						</li>

						<li>
							<a href="product.php">Shop</a>
						</li>

						

						<li>
							<a>Features</a>
							<ul class="sub_menu">
								<li><a href="vendorOwner.php">for Owner</a></li>
								<li><a href="cook.php">for Cheff</a></li>
								<li><a href="ITstaff.html">for IT Staff</a></li>
							</ul>
						</li>

						<li>
							<a href="about.php">About</a>
						</li>

						<li>
							<a href="contact.php">Contact</a>
						</li>
					</ul>
				</nav>
			</div>

			<!-- Header Icon -->
			<div class="header-icons">
				
			<?php include "./phpModules/checkLoggedIn.php"; ?>

				
				<span class="linedivide1"></span>

				<a href="manageaccount.php" class="header-wrapicon1 dis-block">
					<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
				</a>

				<span class="linedivide1"></span>

				<div class="header-wrapicon2">
					<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
					<span class="header-icons-noti">0</span>

					<!-- Header cart -->
					<div class="header-cart header-dropdown">
						<!--
						<ul class="header-cart-wrapitem">
							
							<li class="header-cart-item">
								<div class="header-cart-item-img">
									<img src="images/item-cart-01.jpg" alt="IMG">
								</div>

								<div class="header-cart-item-txt">
									<a href="#" class="header-cart-item-name">
										White Shirt With Pleat Detail Back
									</a>

									<span class="header-cart-item-info">
										1 x $19.00
									</span>
								</div>
							</li>

							<li class="header-cart-item">
								<div class="header-cart-item-img">
									<img src="images/item-cart-02.jpg" alt="IMG">
								</div>

								<div class="header-cart-item-txt">
									<a href="#" class="header-cart-item-name">
										Converse All Star Hi Black Canvas
									</a>

									<span class="header-cart-item-info">
										1 x $39.00
									</span>
								</div>
							</li>

							<li class="header-cart-item">
								<div class="header-cart-item-img">
									<img src="images/item-cart-03.jpg" alt="IMG">
								</div>

								<div class="header-cart-item-txt">
									<a href="#" class="header-cart-item-name">
										Nixon Porter Leather Watch In Tan
									</a>

									<span class="header-cart-item-info">
										1 x $17.00
									</span>
								</div>
							</li>
						
						</ul>
						
						<div class="header-cart-total">
							Total: $75.00
						</div>
						-->
						<div class="header-cart-buttons">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									View Cart
								</a>
							</div>

							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="myOrder.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										My meal
									</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap_header_mobile">
		<!-- Logo moblie -->
		<a href="index.php" class="logo-mobile">
			<img src="images/icons/logo.png" alt="IMG-LOGO">
		</a>

		<!-- Button show menu -->
		<div class="btn-show-menu">
			<!-- Header Icon mobile -->
			<div class="header-icons-mobile">
				<a href="manageaccount.php" class="header-wrapicon1 dis-block">
					<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
				</a>

				<span class="linedivide2"></span>

				<div class="header-wrapicon2">
					<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
					<span class="header-icons-noti">0</span>

					<!-- Header cart noti -->
					<div class="header-cart header-dropdown">
						<!--
						<ul class="header-cart-wrapitem">
							<li class="header-cart-item">
								<div class="header-cart-item-img">
									<img src="images/item-cart-01.jpg" alt="IMG">
								</div>

								<div class="header-cart-item-txt">
									<a href="#" class="header-cart-item-name">
										White Shirt With Pleat Detail Back
									</a>

									<span class="header-cart-item-info">
										1 x $19.00
									</span>
								</div>
							</li>

							<li class="header-cart-item">
								<div class="header-cart-item-img">
									<img src="images/item-cart-02.jpg" alt="IMG">
								</div>

								<div class="header-cart-item-txt">
									<a href="#" class="header-cart-item-name">
										Converse All Star Hi Black Canvas
									</a>

									<span class="header-cart-item-info">
										1 x $39.00
									</span>
								</div>
							</li>

							<li class="header-cart-item">
								<div class="header-cart-item-img">
									<img src="images/item-cart-03.jpg" alt="IMG">
								</div>

								<div class="header-cart-item-txt">
									<a href="#" class="header-cart-item-name">
										Nixon Porter Leather Watch In Tan
									</a>

									<span class="header-cart-item-info">
										1 x $17.00
									</span>
								</div>
							</li>
						</ul>

						<div class="header-cart-total">
							Total: $75.00
						</div>
						-->
						<div class="header-cart-buttons">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									View Cart
								</a>
							</div>

							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="myOrder.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										My meal
									</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>
	</div>

	<!-- Menu Mobile -->
	<div class="wrap-side-menu" >
		<nav class="side-menu">
			<ul class="main-menu">
				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<span class="topbar-child1">
						Ho Chi Minh University of Technology
					</span>
				</li>
				<!--
				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<div class="topbar-child2-mobile">
						<span class="topbar-email">
							fashe@example.com
						</span>

						<div class="topbar-language rs1-select2">
							<select class="selection-1" name="time">
								<option>USD</option>
								<option>EUR</option>
							</select>
						</div>
					</div>
				</li>
				
				<li class="item-topbar-mobile p-l-10">
					<div class="topbar-social-mobile">
						<a href="#" class="topbar-social-item fa fa-facebook"></a>
						<a href="#" class="topbar-social-item fa fa-instagram"></a>
						<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
						<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
						<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
					</div>
				</li>
				-->
				<li class="item-menu-mobile">
					<a href="index.php">Home</a>
					<ul class="sub-menu">
						<li><a href="index.php">Homepage V1</a></li>
						
					</ul>
					<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
				</li>

				<li class="item-menu-mobile">
					<a href="product.php">Shop</a>
				</li>

				<li class="item-menu-mobile">
					<a href="about.php">About</a>
				</li>

				<li class="item-menu-mobile">
					<a href="contact.php">Contact</a>
				</li>
			</ul>
		</nav>
	</div>
</header>

	
    <!-- Slide1 -->
    <!--End of Header Area-->
    </div>
    <div class="contentforlayout">
		<br>
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="row">
					<div class="col-4">
					  <div class="list-group" id="list-tab" role="tablist">
						<a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Account</a>
						<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Chức vụ</a>
						<a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Liên lạc</a>
						<a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Lấy lại mật khẩu</a>
					  </div>
					</div>
					<div class="col-8">
					  <div class="tab-content" id="nav-tabContent">
					  <?php
							$conn=mysqli_connect("localhost","root","root");
							if(!$conn){
								die(mysqli_error($conn));
							}
							$result=mysqli_select_db($conn,"smartfood");
							$conn->set_charset('utf8');
							$result=mysqli_query($conn,"select * from user where user_id=$user_id;");
							$user_detail=mysqli_fetch_array($result);
						?>
						<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
							<p class="lead">
								Họ và tên: <?php echo $user_detail['name']; ?>
							</p>
							<p class="lead">
								Email: <?php echo $user_detail['email']; ?>
							</p>
						</div>
						<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
							<p class="lead">
								Chức vụ: <?php 
									switch($user_detail['role1']){
										case 1:
											echo "Kỹ thuật viên";
											break;
										case 2:
											echo "Đầu bếp";
											break;
										case 4:
											echo "Quản trị viên";
											break;
										case 3:
											echo "Khách hàng";
											break;
										}
								?>
							</p>
						</div>
						<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
							
							<p class="lead">
								Số điện thoại: <?php echo $user_detail['phonenumber']; ?>
							</p>
						</div>
						<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
							<p class="lead">
								<div class="col-sm-6">
									
									<form method="post" action="account.php" id="create_customer" accept-charset="UTF-8"><input type="hidden" name="form_type" value="create_customer" /><input type="hidden" name="utf8" value="✓" />
									<div class="form-group required">
										<label  class="lead" for="password">Mật khẩu mới</label>
										<div class="col-sm-10">
										  <input type="password" value="" name="customer[password]" id="create-password" placeholder="Mật khẩu mới"  class="form-control" >
										</div>
									</div>
									<div class="form-group required">
										<label  class="lead" for="password">Nhập lại mật khẩu mới</label>
										<div class="col-sm-10">
										  <input type="password" value="" name="customer[repeat-password]" id="repeat-password" placeholder="Nhập lại mật khẩu mới"  class="form-control" >
										</div>
									</div>
									<div class="submit">					
										<button name="change-password" id="button-change-password" type="submit" class="btn btn-primary">
										  <span>
											<i class="fa fa-key"></i>
											Xác nhận
										  </span>
										</button>
									</div>
								</div>
							</p>
						</div>
					  </div>
					</div>
				  </div>
                   
            </div>
		</div>
		<br>
		<br>
    </div>


    <!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 268 Ly Thuong Kiet, Ward 14, District 10, Ho Chi Minh 
					</p>
					<!--
					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
					-->
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Food
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Drink
						</a>
					</li>

				</ul>
			</div>
			<!--
			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>
			-->
			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
			
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>

		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
				<div class="video-mo-01">
					<iframe src="https://www.youtube.com/embed/Nt8ZrWY2Cmk?rel=0&amp;showinfo=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/parallax100/parallax100.js"></script>
	<script type="text/javascript">
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
