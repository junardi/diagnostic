<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>style.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Login | Janiuay Diagnostic System</title>   

	<style>  
		.bg-danger {
			padding: 10px;  
			color: #fff;  
			margin-bottom: 20px;
		}   

		.bg-danger p {
			padding: 0px; 
			margin: 0px;
		}
	</style>
	

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

	
		<!-- Header
		============================================= -->
		

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Janiuay Diagnostic System</h1>
				
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_one_third nobottommargin">

						<div class="well well-lg nobottommargin">
							<form id="login-form" name="login-form" class="nobottommargin" action="<?php echo base_url(); ?>index.php/process/process_login" method="post">

								<h3>Login to your Account</h3>

								<!-- <div class="bg-danger">  
									<p>Username or password is incorrect</p>
								</div>   -->

								<?php echo $this->session->flashdata("error");   ?>

								<div class="col_full">
									<label for="login-form-username">Username:</label>
									<input type="text" id="login-form-username" name="username" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="login-form-password">Password:</label>
									<input type="password" id="login-form-password" name="password" value="" class="form-control" />
								</div>

								<div class="col_full nobottommargin">
									<button class="button button-3d nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
									<!-- <a href="#" class="fright">Forgot Password?</a> -->
								</div>

							</form>
						</div>

					</div>

					<div class="col_two_third col_last nobottommargin">
						<img src="<?php echo base_url(); ?>custom_images/diagnostic.jpg" class="img img-responsive" alt="Diagnostic Image">
					</div>

				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

		

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; <?php echo date('Y'); ?> All Rights Reserved by Infotech IV-C<br>
					
					</div>

					

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?php echo base_url(); ?>js/functions.js"></script>

</body>
</html>