<?php
include("Header.php");
?>


<?php
$sql = "SELECT * from `product`";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST["search"]))
	{
		$sub = $_POST["category"];

		$sql= $sql .  " where Cat_Id =$sub";
	}
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$val = $_POST["sort"];

	if ($val == "LOW To HIGH") {
		$sql = $sql .  " order by Product_Price";
	} else {
		$sql = $sql . " order by Product_Price desc";
	}
}

?>

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col">
				<p class="bread"><span><a href="index.php">Home</a></span> / <span>Product</span></p>
			</div>
		</div>
	</div>
</div>


<div class="colorlib-product">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
				<h2>Product</h2>
				<h2>
					<form method="POST">
						<select name="sort">
							<option>SELECT SORT BY</option>
							<option>LOW To HIGH</option>
							<option>HIGH To LOW</option>
						</select>

						<button name="filter" class="btn btn-primary submit-search text-center" style="background: #2196F3"><i class="icon-filter"></i></button>
				
						<select name="category">
							<option>SELECT CATEGORY</option>
							<?php
							$sql1 = "select * from category";

							$result1 = mysqli_query($conn, $sql1);
							while ($row1 = mysqli_fetch_array($result1)) {

							?>
								<option value="<?php echo $row1['Cat_Id']; ?>"><?php echo $row1['Cat_Name']; ?></option>
							<?php
							}
							?>
						</select>
						<button name="search" class="btn btn-primary submit-search text-center" style="background: #2196F3"><i class="icon-search"></i></button>
					</form>

				</h2>
			</div>
		</div>
		<div class="row row-pb-md">

			<?php
			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($result)) {
			?>
				<div class="col-md-3 col-lg-3 mb-4 text-center">
					<div class="product-entry border">
						<a href="product-detail.php?id=<?php echo $row['Product_Id']; ?>">
							<img src="images/<?php echo $row['Product_Image'] ?>" class="img-fluid" style="height:150px;">

						</a>
						<div class="desc">
							<h2><a href="product-detail.php?id=<?php echo $row['Product_Id']; ?>"><?php echo $row['Product_Name'] ?></a></h2>
							<span class="price">$<?php echo $row['Product_Price'] ?></span>
							<?php
							if (isset($_SESSION['userid'])) {
							?>
								<a href="Wishlist-Insert.php?id=<?php echo $row['Product_Id']; ?>">
									<image src="wishlisticon.jpg" style="height:30px;">
								</a>
							<?php
							}
							?>
						</div>
					</div>
				</div>

			<?php
			}
			?>
		</div>
	</div>
</div>


<?php
include("Footer.php");
?>