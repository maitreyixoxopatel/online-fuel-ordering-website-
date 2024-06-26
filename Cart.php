<?php
//session_start();
include('Header.php');
require_once("config/connection.php");
?>
<?php

$uid = $_SESSION['userid'];
$sql="select * from cart c join product p  
where c.Product_Id=p.Product_Id  and c.User_Id = $uid";
//$sql="select * from cart";
$result=mysqli_query($conn,$sql);

?>
			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										
									</div>
									<div class="item">
										
									</div>
								</div>
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
						<p class="bread"><span><a href="index.php">Home</a></span> / <span>Shopping Cart</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3> <a href="Checkout2.php">Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
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
					if(isset($_GET['id']))
					{
						$pid=$row['Product_Id'];
					}
					
					while($row= mysqli_fetch_array($result))
					{
						$cid=$row['Cart_Id'];
						
					?>

							<div class="product-cart d-flex">
							<div class="one-eight text-center" >
								<div class="product-img" style="padding-top:20px;padding-right:200px" >
								<img src="Img/<?php echo $row['Product_Image'];?>" Style="width:100px;">
								</div>
							
							</div>
							
							<div class="one-eight text-center">
							<div class="display-tc">
									<h3><?php echo $row['Product_Name']?></h3>
							</div>
							</div>
							<div class="one-eight text-center" style="padding-left:200px">
								<div class="display-tc">
									<span class="price">$<?php echo $row['Product_Price']?></span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value=<?php echo $row['Quntity'];?> min="1" max="100">
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price"><?php echo $row['Amount'];?></span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="Cart-Delete.php?id=<?php echo $cid;?>" class="closed"></a>
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
											<div class="col-sm-9">
												<input type="text" name="quantity" class="form-control input-number" placeholder="Your Coupon Number...">
											</div>
											<div class="col-sm-3">
												<input type="submit" value="Apply Coupon" class="btn btn-primary">
											</div>
										</div>
									</form>
								</div>
								<?php 
					$uid=$_SESSION['userid'];
					$sql = "select sum(Amount) as Product_Price from cart where User_Id = '".$uid."'";
					$result = mysqli_query($conn,$sql);
					$row = mysqli_fetch_array($result);
					$amt = $row['Product_Price'];
					?>
								<div class="col-sm-4 text-center">
									<div class="total">
										<div class="sub">
											<p><span>Subtotal:</span> <span>₹<?php echo $row['Product_Price']?></span></p>
											<p><span>Delivery:</span> <span>₹0.0</span></p>
											<p><span>Discount:</span> <span>₹0.0</span></p>
										</div>
										<div class="grand-total">
											<p><span><strong>Total:</strong></span> <span>₹<?php echo $row['Product_Price']?></span></p>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Related Products</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/item-1.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Women's Boots Shoes Maca</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/item-2.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Women's Minam Meaghan</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/item-3.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Men's Taja Commissioner</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/item-4.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Russ Men's Sneakers</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		include('Footer.php');
		?>