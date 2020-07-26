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
	<title>Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
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
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
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
					<a href="#" class="header-wrapicon1 dis-block">
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
						<a href="product.php">Sale</a>
					</li>

					<li class="item-menu-mobile">
						<a href="cart.php">Features</a>
					</li>

					<li class="item-menu-mobile">
						<a href="blog.php">Blog</a>
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

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-02.jpg);">
		<!-- <h2 class="l-text2 t-center">
			Cart
		</h2> -->
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart" id="table_item">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
						</tr>
						<?php
						$conn = mysqli_connect("localhost", "root", "root");
						if (!$conn) {
							die(mysqli_error($conn));
						}
						$result = mysqli_select_db($conn, "smartfood");
						$conn->set_charset('utf8');
						$result = mysqli_query($conn, "call showOrderUser($user_id);");
						$count = 1;
						$orders = array();
						$food = array();
						$num = array();
						while ($row = mysqli_fetch_array($result)) {
							$order_id = $row['orderlist_id'];
							$food_id = $row['food_id'];
							if ($row['status2'] != '1') continue;
							$num1 = $row['num'];
							array_push($food, $food_id);
							array_push($num, $num1);
							array_push($orders, $order_id);
						}
						$mi = new MultipleIterator();
						$mi->attachIterator(new ArrayIterator($orders));
						$mi->attachIterator(new ArrayIterator($food));
						$mi->attachIterator(new ArrayIterator($num));
						$sum = 0;
						mysqli_next_result($conn);
						foreach ($mi as $value) {
							list($order_id, $food_id, $num) = $value;
							$result1 = mysqli_query($conn, "select image,name,price from food where food_id='$food_id'");

							while ($row = mysqli_fetch_array($result1)) {
						?>
								<tr class="table-row">
									<td class="column-0" style="display: none;"><?php echo $order_id; ?> </td>
									<td class="column-1">
										<div class="cart-img-product b-rad-4 o-f-hidden">
											<img src="<?php echo "images/" . $row['image']; ?>" style="height: 100px; width:150px;" alt="IMG-PRODUCT">
										</div>
									</td>
									<td class="column-2"><?php echo $row['name']; ?>
									</td>
									<td class="column-3"><?php echo $row['price']; ?> VND</td>
									<td class="column-4">
										<div class="flex-w bo5 of-hidden w-size17">
											<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
												<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
											</button>

											<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="<?php echo $num; ?>">

											<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
												<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
											</button>
										</div>
									</td>
									<td class="column-5"><?php echo $row['price'] * $num;
															$sum = $sum + ($row['price'] * $num); ?> VND</td>
								</tr>
						<?php }
						} ?>

					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" id="button-apply">
							Apply coupon
						</button>
					</div>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" id="button-update" name="update">
						Update Cart
					</button>
				</div>
			</div>
			<!--list of coupon can use-->
			<h3 class="m-text20 p-b-24">
				Mã coupon của bạn
			</h3>
			<div class="container">
				<div class="row">
					<div class="col-sm-20 col-md-6">
						<div class="table-responsive">
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
						<!--history of cart-->
					</div>
					<div class="col-sm-6">
						<!-- Total -->
						<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
							<h5 class="m-text20 p-b-24">
								Cart Totals
							</h5>
							<!--
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>
					<span class="m-text21 w-size20 w-full-sm">
						$39.00
					</span>
				</div>
				
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>
					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-23">
							There are no shipping methods available. Please double check your address, or contact us if you need any help.
						</p>
						<span class="s-text19">
							Calculate Shipping
						</span>
						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select class="selection-2" name="country">
								<option>Select a country...</option>
								<option>US</option>
								<option>UK</option>
								<option>Japan</option>
							</select>
						</div>
						<div class="size13 bo4 m-b-12">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="State /  country">
						</div>
						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip">
						</div>
						<div class="size14 trans-0-4 m-b-10">
							-------------- Button ------------
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Update Totals
							</button>
						</div>
					</div>
				</div>
	-->
							<div class="flex-w flex-sb-m p-t-26 p-b-30">
								<span class="m-text22 w-size19 w-full-sm">
									Total:
								</span>

								<span class="m-text21 w-size20 w-full-sm" id="amount">
									<?php echo $sum - $discount . "VND"; ?>
								</span>
								<span class="m-text22 w-full-sm">
									Phương thức thanh toán:
								</span>
								<form>
									<label class="radio-inline">
										<input type="radio" name="genderS" value="1" checked="checked">Tiền Mặt</input>
									</label>
									<label class="radio-inline">
										<input type="radio" name="genderS" value="0">MOMO</input>
									</label>
								</form>
							</div>
							<div class="size15 trans-0-4">
								<!-- Button -->
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" id="payment">
									Proceed to Checkout
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



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

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>


	<script>
		$(function() {
			$("button#payment").click(function() {
				var radios = document.getElementsByName('genderS');

				for (var i = 0, length = radios.length; i < length; i++) {
					if (radios[i].checked) {
						// do whatever you want with the checked radio
						var iscart = radios[i].value;

						// only one radio can be logically checked, don't check the rest
						break;
					}
				}
				var y = document.getElementsByClassName("column-0");
				var Order_id = [].map.call(y, function(node) {
					return node.textContent || node.innerText || "";
				});
				var coupon_id = document.getElementsByName("coupon-code")[0].value;
				//  alert(Order_id);
				//  alert(coupon_id);
				var user_id = "<?php echo $user_id; ?>";
				var postData = new FormData();
				var amount;
				var bill_id;
				postData.append('order_id', Order_id);
				postData.append('coupon_id', coupon_id);
				postData.append('user_id', user_id);
				$.ajax({
					type: 'POST',
					url: 'create_bill.php',
					processData: false,
					contentType: false,
					data: postData,
					success: function(msg) {
						const obj = JSON.parse(msg);
						bill_id = obj.bill_id;
						amount = obj.amount;

						var f = document.createElement('form');
						f.method = 'POST';
						if (iscart == "1") {
							f.action = 'payreturn.php';
						} else {
							f.action = 'paymomo/init_payment.php';
						}
						var i = document.createElement('input');
						i.name = 'orderId';
						i.value = bill_id;
						f.appendChild(i);
						var i1 = document.createElement('input');
						i1.name = 'amount';
						i1.value = amount;
						f.appendChild(i1);
						document.body.appendChild(f);
						f.submit();
					},
					error: function() {
						alert("failure");
					}
				});


			});
			//twitter bootstrap script
			$("button#button-update").click(function() {
				var rows = $('#table_item> tbody > tr')
				for (i = 1; i < rows.length; i++) {
					var tr = rows[i];
					var Order_id = tr.cells[0].innerHTML;
					var Quantity = tr.cells[4].getElementsByTagName("input").item(0).value;
					// alert(Order_id);
					// alert(Quantity);
					var postData = new FormData();
					postData.append('order_id', Order_id);
					postData.append('num', Quantity);
					$.ajax({
						type: 'POST',
						url: 'update_order.php',
						processData: false,
						contentType: false,
						data: postData,
						success: function(msg) {
							location.reload();
						},
						error: function() {
							alert("failure");
						}
					});

				}


			});
			$('.size8 m-text18 t-center num-product').on('input', function() {
				alert('Input changed');
			});
			$('div[class="cart-img-product b-rad-4 o-f-hidden"]').click(function() {
				var str2 = $(this).parent().parent();
				orderlist_id = Object.values(str2)[0].cells[0].innerHTML;
				var postData = new FormData();
				postData.append('orderlist_id', orderlist_id);
				$.ajax({
					type: 'POST',
					url: 'delete_order.php',
					processData: false,
					contentType: false,
					data: postData,
					success: function(msg) {
						location.reload();
					},
					error: function() {
						alert("failure");
					}
				});
			});
			$("button#button-apply").click(function() {
				var coupon_id = document.getElementsByName("coupon-code")[0].value;
				var postData = new FormData();
				postData.append('coupon_id', coupon_id);
				var user_id = "<?php echo $user_id; ?>";
				postData.append('user_id', user_id);
				$.ajax({
					type: 'POST',
					url: 'check_coupon.php',
					processData: false,
					contentType: false,
					data: postData,
					success: function(msg) {
						alert("Thành công");
						var amount = document.getElementById("amount");
						const obj = JSON.parse(msg);
						discount = obj.discount;
						var sum = "<?php echo $sum; ?>";
						var ret = sum - discount;
						if (ret < 0) ret = 0;
						amount.textContent = String(ret) + "VND";
					},
					error: function() {
						alert("failure");
					}
				});

			});

		});
	</script>
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

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
		$('input[type=number]').change(function() {
			var str = $(this).parent().parent().parent();
			str = Object.values(str)[0].cells[3].innerHTML;
			var num = Object.values($(this))[0].value;

			str = str.substr(0, str.length - 4);
			var str2 = $(this).parent().parent().parent()[0].cells[5];
			str2.innerHTML = num * str + " VND";
		});
		$('button[class="btn-num-product-down color1 flex-c-m size7 bg8 eff2"]').click(function() {
			var str = $(this).parent();
			var str1 = Object.values(str)[0].children[1];
			num = parseInt(str1.value) - 1;
			var str2 = Object.values(str.parent().parent())[0];
			price = str2.cells[3].innerHTML;
			total = str2.cells[5];
			total.innerHTML = num * price.substr(0, price.length - 4) + " VND";
		});


		$('button[class="btn-num-product-up color1 flex-c-m size7 bg8 eff2"]').click(function() {
			var str = $(this).parent();
			var str1 = Object.values(str)[0].children[1];
			num = parseInt(str1.value) + 1;
			var str2 = Object.values(str.parent().parent())[0];
			price = str2.cells[3].innerHTML;
			total = str2.cells[5];
			total.innerHTML = num * price.substr(0, price.length - 4) + " VND";
		});
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>