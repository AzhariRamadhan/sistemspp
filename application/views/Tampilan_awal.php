<!doctype html>
<html class="fixed">
	<head>

		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/sma.ico" />

		<title>Sistem Informasi Manajemen Pembayaran SPP SMAN 1 Bengkulu Tengah</title>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/autocomplete/css/jquery-ui.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url();?>assets/vendor/modernizr/modernizr.js"></script>

	</head>

	<body class="bg-login">
		<!-- start: page -->
		<section class="body">
			<header class="header">
				<div class="logo-container">
					<a href="<?php echo base_url();?>awal" class="logo">
						<img src="<?php echo base_url();?>assets/images/tutwurihandayani.png" height="37" alt="JSOFT Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<span class="separator"></span>
						<a href="<?php echo base_url();?>awal" ><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Beranda</a>				
				<span class="separator"></span>

			<!-- Right Header -->
			<div class="header-right">
				<span class="separator"></span>
				<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="glyphicon glyphicon-user"></i>
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name">Login</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a href="<?php echo base_url();?>login" role="menuitem" tabindex="-1"><i class="fa fa-user"></i> Admin </a>
								</li>
								<li>
									<a href="<?php echo base_url();?>loginsiswa" role="mensuitem" tabindex="-1"><i class="fa fa-users"></i> Siswa </a>
								</li>
								<li>
									<a href="<?php echo base_url();?>kepseklogin" role="menuitem" tabindex="-1"><i class="fa fa-user"></i> Kepala Sekolah </a>
								</li>
							</ul>
						</div>
					</div>
				</div>				
			</header>

		<section class="body-awal">
			<div class="center-sign">
				<p class="title-awal"> Selamat Datang </p>
				<h2 class="title-sign"> Di Sistem Informasi Manajemen Pembayaran SPP SMAN 1 Bengkulu Tengah</h2>
			<br><br>


			</section>


		</section>

		<!-- end: page -->



		<!-- Vendor -->
		<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url();?>assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url();?>assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url();?>assets/javascripts/theme.init.js"></script>

		<script src="<?php echo base_url();?>assets/autocomplete/js/jquery-3.3.1.js" ></script>
		<script src="<?php echo base_url();?>assets/autocomplete/js/bootstrap.js" ></script>
		<script src="<?php echo base_url();?>assets/autocomplete/js/jquery-ui.js" ></script>

		<script type="text/javascript">

			$(document).ready(function(){
 
            $('#nama').autocomplete({
                source: "<?php echo site_url('awal/get_autocomplete');?>",
      
                select: function (event, ui) {
                    $(this).val(ui.item.label);
                    $("#form_search").submit(); 
                }
            });
 
        });
		</script>
		

	</body>
</html>