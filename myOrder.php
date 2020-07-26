<?php
session_start();
include("includes/permission_manageaccount.php");
$conn = mysqli_connect("localhost", "root", "root");
if (!$conn) {
	die(mysqli_error($conn));
}
$value = $_SESSION['value'];
$result = mysqli_select_db($conn, "smartfood");
$conn->set_charset('utf8');
$result = mysqli_query($conn, "call getUser_id('$value');");
$check = mysqli_fetch_array($result);
$user_id = $check['user_id'];
mysqli_next_result($conn);
$result = mysqli_query($conn, "call getRole('$user_id');");
$check = mysqli_fetch_array($result);
$role = $check['role1'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Bữa ăn của tôi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png" />
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
						<?php include "./phpModules/displayCart.php"; ?>

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
						<?php include "./phpModules/displayCart.php"; ?>

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
		<div class="wrap-side-menu">
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
	<!--start of content-->

	<body>
		<div class="container">
			<ul class="justify-content-center nav nav-tabs list-inline">
				<li class="active list-group-item" data-toggle="tab" href="#myOrder">Bữa ăn của tôi</li>
				<li class="list-group-item" data-toggle="tab" href="#myCoupon">Coupon của tôi</li>
			</ul>
			<div class="tab-content">
				<!--table of order-->
				<div id="myOrder" class="tab-pane table-responsive in active">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Hình ảnh</th>
								<th>Tên món</th>
								<th>Số lượng</th>
								<th>Phương thức thanh toán</th>
								<th>Trạng Thái</th>
							</tr>
						</thead>
						<?php
						$conn = mysqli_connect("localhost", "root", "root");
						if (!$conn) {
							die(mysqli_error($conn));
						}
						$food_id = mysqli_select_db($conn, "smartfood");
						$food_prop = mysqli_select_db($conn, "smartfood");
						$conn->set_charset('utf8');
						$order = mysqli_query($conn, "select * from orderlist where user_id=$user_id;");
						$total_price = 0;
						while ($row = mysqli_fetch_array($order)) {
							$food_item_id = $row['food_id'];
							$food_item = '';
							$food_prop = mysqli_query($conn, "select * from food where food_id=$food_item_id;");
							$food_item = mysqli_fetch_array($food_prop);
							$total_price = intval($total_price) + intval($row['num']) * intval($food_item['price']);
						?>
							<tbody>
								<tr>
									<td><img src="<?php echo "images/" . $food_item['image']; ?>" class="img-circle" alt="Mỳ cay" width="100" height="100"></td>
									<td><?php echo $food_item['name']; ?></td>
									<td><?php echo $row['num']; ?></td>
									<td><?php if ($row['status2'] == 2 or $row['status2'] == 4) {
											echo "Online";
										}
										if ($row['status2'] == 5 or $row['status2'] == 3) {
											echo "Tiền Mặt";
										} ?></td>
									<td><?php if ($row['status2'] == 4 or $row['status2'] == 5) {
											echo "Đã Hoàn Thành";
										}
										if ($row['status2'] == 2 or $row['status2'] == 3) {
											echo "Đang Chuẩn bị";
										}
										?>
									</td>
								</tr>
							</tbody>
						<?php } ?>

					</table>
				</div>
				<!--table of my coupon-->
				<div id="myCoupon" class="tab-pane table-responsive">
					<table class="table" id="table_coupon">
						<thead>
							<tr>
								<th class="column-1">#</th>
								<th class="column-2">Mã coupon</th>
								<th class="column-3">Giá trị</th>
								<th class="column-4 p-l-70">Hạn sử dụng</th>
								<th class="column-5">Số lượng</th>
							</tr>
						</thead>
						<?php
						$conn = mysqli_connect("localhost", "root", "root");
						if (!$conn) {
							die(mysqli_error($conn));
						}
						$result = mysqli_select_db($conn, "smartfood");
						$result = mysqli_query($conn, "select usercoupon.coupon_id,num,end1,value from usercoupon,coupon where usercoupon.coupon_id=coupon.coupon_id and user_id='$user_id';
										");
						$order = 0;
						while ($row = mysqli_fetch_array($result)) {
							$order += 1;
						?>
							<tbody>
								<tr class="table-row">
									<th class="column-1"><?php echo $order; ?></th>
									<td class="column-2"><?php echo $row['coupon_id']; ?></td>
									<td class="column-3"><?php echo $row['value']; ?> VND</td>
									<td class="column-4 p-l-70"><?php echo $row['end1']; ?></td>
									<td class="column-5"><?php echo $row['num']; ?></td>
								</tr>
							</tbody>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</body>

	<!--end of content-->
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
		$('.block2-btn-addcart').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>