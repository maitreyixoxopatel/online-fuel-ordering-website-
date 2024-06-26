<?php
//session_start();
include('Header.php');
require_once("config/connection.php");

?>
<?php

$uid = $_SESSION['userid'];
$sql = "select * from cart c join product p where c.Product_Id=p.Product_Id  and c.User_Id = $uid";
//$sql="select * from cart";
$result = mysqli_query($conn, $sql);

?>

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col">
				<p class="bread"><span><a href="index.php">Home</a></span> / <span>Shopping Cart</span></p>
			</div>
		</div>
	</div>
</div>


<div class="colorlib-product">
	<div class="container">

		<div class="row row-pb-lg">
			<div class="col-md-12">
				<div class="product-name d-flex">
					<div class="one-forth text-left px-4">
						<span>Product Details</span>
					</div>
					<div class="one-eight text-center">
						<span>Price</span>
					</div>
					<div class="one-eight text-center">
						<span>Quantity</span>
					</div>
					<div class="one-eight text-center">
						<span>Total</span>
					</div>
					<div class="one-eight text-center px-4">
						<span>Remove</span>
					</div>
				</div>
				<?php
				if (isset($_GET['id'])) {
					$pid = $row['Product_Id'];
				}

				while ($row = mysqli_fetch_array($result)) {
					$cid = $row['Cart_Id'];
					$qty= $row['Qty'];
				?>
					<div class="product-cart d-flex">
						<div class="one-forth">
							<div class="product-img">
								<img src="images/<?php echo $row['Product_Image']; ?>" Style="width:100px;">
							</div>
							<div class="display-tc">
								<h3><?php echo $row['Product_Name'] ?></h3>
							</div>
						</div>
						<div class="one-eight text-center">
							<div class="display-tc">
								<span class="price">$<?php echo $row['Product_Price'] ?></span>
							</div>
						</div>
						<div class="one-eight text-center">
							<div class="display-tc">
								<input type="text" disabled id="quantity" name="quantity" class="form-control input-number text-center" value=<?php echo $row['Qty']; ?> min="200" max="800">
							</div>
						</div>
						<div class="one-eight text-center">
							<div class="display-tc">
								<span class="price">
									<?php echo $row['Qty'] * $row['Product_Price'] * 2.45; ?>
								</span>
							</div>
						</div>
						<div class="one-eight text-center">
							<div class="display-tc">
								<a href="Cart-Delete.php?id=<?php echo $cid; ?>" class="closed"></a>
							</div>
						</div>
					</div>

				<?php
				}
				?>
			</div>
		</div>
		<div class="row row-pb-lg">
			<div class="col-md-12">
				<div class="total-wrap">
					<div class="row">
						<div class="col-sm-8">
							<form action="#">
								<div class="row form-group">


								</div>
							</form>
						</div>
						<?php
						$uid = $_SESSION['userid'];
						$sql = "select sum(Product_Price) as Product_Price from cart where User_Id = '" . $uid . "'";
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_array($result);
						$amt = $row['Product_Price'] * 2.45;

						?>
						<div class="col-sm-4 text-center">
							<div class="total">
								<div class="sub">
									<p><span>Subtotal:</span> <span>₹<?php echo $amt ?></span></p>
									<p><span></span> <span></span></p>

								</div>
								<div class="grand-total">
									<p><span><strong>Total:</strong></span> <span>₹<?php echo $amt ?></span></p>

								</div>
								<a style="background-color:DodgerBlue;" href="Checkout2.php?amt=<?php echo $amt?>&qty=<?php echo $qty?>" class="btn btn-primary">Proceed to Checkout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
<?php include("Footer.php"); ?>