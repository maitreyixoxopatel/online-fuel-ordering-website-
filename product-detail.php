<?php
include("Header.php");

if (isset($_GET['id'])) {
	$pid = $_GET['id'];
	$sql1 = "Select * from product p join category c join sub_category sc where c.Cat_Id=sc.Cat_Id and p.Subcat_Id=sc.Subcat_Id and p.Product_Id = '" . $pid . "'";
	//print_r($sql1);die;
	$result1 = mysqli_query($conn, $sql1);
	if ($result1) {
		$row1 = mysqli_fetch_array($result1);
		$cid = $row1['Cat_Id'];
	}
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$qty = $_POST['quantity'];

	if ($qty < 200) {
		//$error = "Quantity should be less than 10";
	} else {
		echo "<meta http-equiv='refresh' content='0;url=Cart-Insert.php?productid=$pid&qty=$qty'>";
	}
}
?>
<html>

<div class="sale">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2 text-center">
				<div class="row">

				</div>
			</div>
		</div>
	</div>
</div>
</nav>

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col">
				<p class="bread"><span><a href="index.html">Home</a></span> / <span>Product Details</span></p>
			</div>
		</div>
	</div>
</div>
<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	require_once("config/connection.php");
	$sql = "select * from product where Product_Id='" . $_GET['id'] . "'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
}

if (isset($_GET['wid'])) {
	$wid = $_GET['wid'];
	$update = "delete from wishlist where Wishlist_Id = $wid";
	$re = mysqli_query($conn, $update);
}

?>

<div class="colorlib-product">
	<div class="container">
		<div class="row row-pb-lg product-detail-wrap">
			<div class="col-sm-8">
				<div>
					<div class="item">
						<div class="product-entry border">
							<a href="#">
								<img src="images/<?php echo $row['Product_Image'] ?>" style="height:500px;width:750px">
							</a>
						</div>
					</div>
					<div class="item">
					</div>
					<div class="item">
					</div>
					<div class="item">
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="product-desc">
					<form method="post">
						<h3><?php echo $row['Product_Name'] ?></h3>
						<p>
							<?php echo $row['Product_Description'] ?>
						</p>
						<p class="price">
							<span>$<?php echo $row['Product_Price'] ?></span>

						</p>

						<div class="size-wrap">

						</div>

						<div class="size-wrap">

						</div>
						<div class="size-wrap">

						</div>
						<div class="size-wrap">

						</div>
						<div class="input-group mb-4">
							<?php
							if (isset($_SESSION['userid'])) {
							?>
								<span class="input-group-btn">
									<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
										<i class="icon-minus2"></i>
									</button>
								</span>

								<input type="text" id="quantity" name="quantity" class="form-control input-number" value=<?php echo $row['Quntity']; ?> min="200" max="800">


								<span class="input-group-btn ml-1">
									<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
										<i class="icon-plus2"></i>
									</button>
								</span>
								<span style="color:red;font-size:20px"><?php echo $error; ?></span>

							<?php
							}
							?>
						</div>
						<div class="row">
							<div class="col-sm-12 text-center">
								<?php
								if (isset($_SESSION['userid'])) {
								?>
									<input type="submit" class="btn btn-primary btn-addtocart icon-shopping-cart" value="Add to Cart">
									<a href="Cart-Insert.php?id=<?php echo $row['Product_Id']; ?>">
									<?php
								} else { ?>
										<span>Sing Up For Buy Product.....</span>
										<a class="btn btn-primary" href="client/Reg.php">Sign Up</a>
									<?php	}
									?>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-md-12 pills">
					<div class="bd-example bd-example-tabs">
						<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

							<li class="nav-item">
								<a class="" id="" href="#"></a>
							</li>

						</ul>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php

include("Footer.php");
?>


<script>
	$(document).ready(function() {

		var quantity = parseInt($('#quantity').val());

		if (quantity < 200 || quantity == 200) {
			$('.quantity-left-minus').prop('disabled', true);
		} else {
			$('.quantity-left-minus').prop('disabled', false);
		}

		// var quantitiy = 200;
		$('.quantity-right-plus').click(function(e) {
			var quantity = parseInt($('#quantity').val());
			if (quantity < 800 && quantity == 800) {
				$('.quantity-left-minus').prop('disabled', true);
			} else {
				$('.quantity-left-minus').prop('disabled', false);
			}
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined
			if (quantity <= 799) {
				$('#quantity').val(quantity + 1);
			}
			// Increment

		});

		$('.quantity-left-minus').click(function(e) {
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());
			if (quantity < 200 || quantity == 200) {
				$('.quantity-left-minus').prop('disabled', true);
			} else {
				$('.quantity-left-minus').prop('disabled', false);
			}
			// If is not undefined

			// Increment
			if (quantity > 200) {
				$('#quantity').val(quantity - 1);
			}
		});

	});
</script>