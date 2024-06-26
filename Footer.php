<footer id="colorlib-footer" role="contentinfo">
	<div class="container">
		<div class="row row-pb-md">
			<div class="col footer-col colorlib-widget">
				<h4>About Online Fuel portal</h4>
				<h4>
					<p align="justify">Shoeholic is user friendly interface for searching and buying all types of shoes like men’s shoes, women’s shoes, kid’s shoes etc.
					</p>
				</h4>

			</div>
			<div class="col footer-col colorlib-widget">
				<h4>Category</h4>
				<ul class="colorlib-footer-links">
					<?php
					$sql = "Select * from category";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_array($result)) {
					?>
						<li><a href="product-list.php?id=<?php echo $row['Cat_Id']; ?>"><?php echo $row['Cat_Name']; ?></a></li>
					<?php } ?>
				</ul>
			</div>

			<div class="col footer-col colorlib-widget">
				<h4>Customer Care</h4>
				<ul class="colorlib-footer-links">
					<li><a href="Contact.php">Contact</a></li>
					<li><a href="Wishlist.php">Wishlist</a></li>
				</ul>
			</div>


			<!-- <div class="col footer-col">
				<h4>Contact Information</h4>
				<ul class="colorlib-footer-links">
					<li>F/30, Manmohan Society, Keshavnagar <br> Subhashbridge, RTO, Ahmedabad</li>
					<li><a href="tel://1234567920">+917041721031</a></li>
					<li><a href="mailto:info@yoursite.com"></a></li>
					<li><a href="#">Shoeholic.com</a></li>
				</ul>
			</div> -->
		</div>
	</div>
	<div class="copy">
		<div class="row">
			<div class="col-sm-12 text-center">
				<p>
					<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved
						 <!-- | This Website is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">SHOEHOLIC</a> -->
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
					<!-- <span class="block"> <a href="http://unsplash.co/" target="_blank"></a> .<a href="http://pexels.com/" target="_blank"></a></span> -->
				</p>
			</div>
		</div>
	</div>
</footer>
</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
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