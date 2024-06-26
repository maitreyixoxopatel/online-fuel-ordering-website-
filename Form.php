<?php include("Header.php");
require_once("config/connection.php");
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
						<p class="bread"><span><a href="index.php">Home</a></span> / <span>Feedback</span></p>
					</div>
				</div>
			</div>
		</div>


		
		</div>
		
					<div class="row">
					<div class="col-md-12">
						<div class="contact-wrap">
											<?php
								$sql = "SELECT * FROM feedback f JOIN user u WHERE f.User_Id=u.User_Id";
								$result = mysqli_query($conn,$sql); 
								while($row=mysqli_fetch_array($result))
								{
								?>
							<h3></h3>
							<div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
						<table>
						<tr>
							<th><?php echo $row['User_Name']?></th>
							<th><?php echo $row['Feedback']?></th>
							<th> <?php echo $row['Feedback_Date']?></th>
						</tr>
						</table>
						</div>
						</div>
								<?php
								}
								?>	
						</div>
					</div>
				</div>
					
			
		<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1> Give Feedback </h1>
						
					</div>
				</div>
				<div class="row" >
					<div class="col-md-6" >
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
										
											<a href="Feedback-insert.php"><input type="submit" value="Send Message" class="btn btn-primary"></>
										</div>
									</div>
								</div>
							</form>		
						</div>
					</div>
				
			</div>
			
		</div>
		
	<?php include("Footer.php");?>

