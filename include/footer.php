	<div class="footer-section">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="footer-widget">
							<div class="footer-logo">

<?php
$stmt = $DB_con->prepare('SELECT * FROM logo');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($row_logo=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($row_logo);
?> 
	<a href="<?php echo $logo_sitename;?>"><img class="img-responsive" src="images/logo/<?php echo $logo_pic;?>" alt="<?php echo $logo_alt;?>"></a>

<?php
}
}
else
{
?>
<li> <a href="#"> Header - no data found </a> </li>
<?php
}
?> 
							</div>
							<div class="copyright">
								<p>&copy; 2017 LookBack. <a href="#">Terms & conditions</a> | <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>

					<div class="col-sm-2">
						<div class="footer-widget">
							<h3>Quick Link</h3>
							<ul class="tr-list">
								<li><a href="#">Home</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Portfolio</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Pricing</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-2">
						<div class="footer-widget">
							<h3>CONTACT US</h3>
							<ul class="tr-list">
								<li><a href="#">Connect with us</a></li>
								<li><a href="#">Stand with us</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Send Feedback</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-2">
						<div class="footer-widget">
							<h3>Social Network</h3>
							<ul class="tr-list">
								<li><a href="#">Facebook</a></li>
								<li><a href="#">Twitter</a></li>
								<li><a href="#">Google Plus</a></li>
								<li><a href="#">Linkdin</a></li>
								<li><a href="#">Instagram</a></li>
							</ul>
						</div>
					</div>

				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.footer-section -->	
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
		<script src="js/slick.min.js"></script>   
		<script src="js/jquery.sidr.min.js"></script> 
		<script src="js/magnific-popup.min.js"></script> 
		<script src="js/cubeportfolio.min.js"></script> 
		<script src="js/jquery.nav.js"></script>
		<script src="js/theia-sticky-sidebar.js"></script>
		<script src="js/switcher.js"></script>
		<script src="js/main.js"></script>

<?php
$stmt = $DB_con->prepare('SELECT * FROM footer');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($row_can=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($row_can);
?> 
<?php echo $footer_dynamic;?>
<?php
}
}
else
{
?>
Footer - no data found 
<?php
}
?> 