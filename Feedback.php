<?php

include("Header.php");
require_once("config/connection.php");
?>


<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col">
				<p class="bread"><span><a href="index.php">Home</a></span> / <span>Feedback</span></p>
			</div>
		</div>
	</div>
</div>

<div class="container">
<div class="row">
	<div class="col-md-12">
		<ul>
			<div class="row">
				<?php
				$sql = "SELECT * FROM feedback f JOIN user u WHERE f.User_Id=u.User_Id";

				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_array($result)) {
				?>
					<div class="col-lg-4 mb-4 text-left">
						<div class="product-entry border">
							<div class="desc" style="font-size:20px">
								<p><b>User Name: </b><?php echo $row['User_Name'] ?></p>
								<p><b>Feedback: </b><?php echo $row['Feedback'] ?></p>
								<p><b>Date: </b> <?php echo $row['Feedback_Date'] ?><br /></p>
							</div>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</ul>
	</div>

	<?php
	if (isset($_SESSION['userid'])) {

	?>

		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1> Give Feedback </h1>

				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="contact-wrap">
						<h3>Feedback</h3>
						<form method="post">
							<div class="col-sm-12">
								<div class="form-group">

									<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-sm-12">
								<div class="form-group">

									<input type="submit" name="submit" value="Send Message" class="btn btn-primary"></a>
								</div>
							</div>
						</form>
						<?php
						//session_start();

						//$sql="Select * from contact";
						//	$result = mysqli_query($conn,$sql);

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							if (isset($_POST["message"])) {
								$uid = $_SESSION['userid'];
								$feedback = $_POST["message"];
								$date = date('y-m-d');


								if ($feedback != '') {
									$query = "insert into feedback(Feedback,Feedback_Date,User_Id)values('" . $feedback . "','" . $date . "','" . $uid . "')";
									//echo $query;
									//die;

									$result = mysqli_query($conn, $query);


									if ($result) {
										echo "<meta http-equiv='refresh' content='0;url=index.php'>";
									}
								}
							} else {
								echo "value not set";
							}
						}
						?>

					</div>
				</div>

			</div>
		</div>
	<?php

	}
	?>
</div>
</div>
<?php include("Footer.php"); ?>