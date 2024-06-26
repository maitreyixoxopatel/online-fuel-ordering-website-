<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en">
<?php
require_once("config/connection.php"); 

//session_start();
//if(!isset($_SESSION['username']) || $_SESSION['username']=='')
//{
//header("Location:client/clientLogin.php");
//}
?>

<html>

<head>
	<title><?php echo ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="css/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body>

	

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="index.php">Online Fuel portal</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
							<form action="#" class="search-wrap">


								<?php
								if (isset($_SESSION['userid'])) {

								?>

									<a href="client/Logout.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="Logout.jpg" style="height:25px;"></a>

								<?php
								} else {
								?>
									<a href="client\clientLogin.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<img src="login.jpg" style="height:25px;"></a>

									<a href="client\Reg.php">&nbsp;&nbsp;<img src="Reg.jpg" style="height:25px;"></a><a href="client\Logout.php">&nbsp;&nbsp;

									<?php
								}

									?>



							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="active"><a href="index.php">Home</a></li>
								<li class="has-dropdown">
									<a href="#">Categories</a>
									<ul class="dropdown">
										<?php
										$sql = "Select * from category";
										$result = mysqli_query($conn, $sql);
										while ($row = mysqli_fetch_array($result)) {
										?>
											<li><a href="product-list.php?id=<?php echo $row['Cat_Id'];?>"><?php echo $row['Cat_Name'];?></a></li>
										<?php } ?>
									</ul>

								</li>
<!-- 
								<li><a href="about.php">About</a></li> -->

								<li><a href="Contact.php">Contact</a></li>
								<?php
								if (isset($_SESSION['userid'])) {
								?>
									<li><a href="client/Profile.php">Profile</a></li>
								<?php
								}
								?>
								<li><a href="Feedback.php">Feedback</a></li>
								<?php
								if (isset($_SESSION['userid'])) {
								?>
									<li class="has-dropdown">
										<a href="#">View</a>
										<ul class="dropdown">
											<li><a href="MyOrder.php">My Order</a></li>
											<li><a href="Wishlist.php">My Wishlist</a></li>


										</ul>

									</li>

									<li class="cart"><a href="cart2.php"><i class="icon-shopping-cart"></i>

											<?php
											$uid = $_SESSION['userid'];
											$sql3 = "select count(*) as Total from cart where User_Id = $uid";
											$result3 = mysqli_query($conn, $sql3);
											$row = mysqli_fetch_array($result3);
											?>
											Cart [<?php echo $row['Total']; ?>]</a></li>
								<?php
								}
								?>

							</ul>
						</div>
					</div>
				</div>
			</div>


			<!-- jQuery -->
			<script src="js/jquery.min.js"></script>
			<!-- popper -->
			<script src="js/popper.min.js"></script>
			<!-- bootstrap 4.1 -->
			<script src="js/bootstrap.min.js"></script>
			<!-- jQuery easing -->
			<script src="js/jquery.easing.1.3.js"></script>
			<!-- Waypoints -->
			<script src="js/jquery.waypoints.min.js"></script>
			<!-- Flexslider -->
			<script src="js/jquery.flexslider-min.js"></script>
			<!-- Owl carousel -->
			<script src="js/owl.carousel.min.js"></script>
			<!-- Magnific Popup -->
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/magnific-popup-options.js"></script>
			<!-- Date Picker -->
			<script src="js/bootstrap-datepicker.js"></script>
			<!-- Stellar Parallax -->
			<script src="js/jquery.stellar.min.js"></script>
			<!-- Main -->
			<script src="js/main.js"></script>

</body>

</html>