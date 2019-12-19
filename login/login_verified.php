<!DOCTYPE html>
<?php
$site_url = "http://" . $_SERVER['SERVER_NAME'];
$assets_url = $site_url . '/metronic';
?>
<?php
session_start();
$_SESSION['rand'] = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
?>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.0
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title>ECC DOE-BD ORG</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link
	href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all"
	rel="stylesheet" type="text/css" />
<link
	href="<?=$assets_url?>/assets/global/plugins/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?=$assets_url?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?=$assets_url?>/assets/global/plugins/bootstrap/css/bootstrap.min.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?=$assets_url?>/assets/global/plugins/uniform/css/uniform.default.css"
	rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?=$assets_url?>/assets/admin/pages/css/login.css"
	rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?=$assets_url?>/assets/global/css/components.css"
	id="style_components" rel="stylesheet" type="text/css" />
<link href="<?=$assets_url?>/assets/global/css/plugins.css"
	rel="stylesheet" type="text/css" />
<link href="<?=$assets_url?>/assets/admin/layout/css/layout.css"
	rel="stylesheet" type="text/css" />
<link href="<?=$assets_url?>/assets/admin/layout/css/themes/default.css"
	rel="stylesheet" type="text/css" id="style_color" />
<link href="<?=$assets_url?>/assets/admin/layout/css/custom.css"
	rel="stylesheet" type="text/css" />
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<?php
include ("../templates/header_top.php");
?>
<!-- BEGIN BODY -->
<body class="login">
	<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
	<div class="menu-toggler sidebar-toggler"></div>
	<!-- END SIDEBAR TOGGLER BUTTON -->
	<!-- BEGIN LOGO -->
	<!--<div class="logo">
	<a href="index.html">
	<img src="<?=$assets_url?>/assets/admin/layout/img/logo-big.png" alt=""/>
	</a>
</div>-->
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN REGISTRATION FORM -->
	   <?=$message?>
	<!-- END LOGIN FORM -->

	</div>
	<div class="copyright">
	 Copyright@2012-<?=date("Y")?>. All right reserved.Design & Developed by <a
			href="http://www.patacorporation.com"><font color="#92CF4E">Pata
				Corporation</font></a>
	</div>
	<!-- END LOGIN -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>
<script src="<?=$assets_url?>/assets/global/plugins/respond.min.js"></script>
<script src="<?=$assets_url?>/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
	<script src="<?=$assets_url?>/assets/global/plugins/jquery.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/jquery-migrate.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/bootstrap/js/bootstrap.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/jquery.blockui.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/jquery.cokie.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/uniform/jquery.uniform.min.js"
		type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script
		src="<?=$assets_url?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
		type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?=$assets_url?>/assets/global/scripts/metronic.js"
		type="text/javascript"></script>
	<script src="<?=$assets_url?>/assets/admin/layout/scripts/layout.js"
		type="text/javascript"></script>
	<script src="<?=$assets_url?>/assets/admin/layout/scripts/demo.js"
		type="text/javascript"></script>
	<script src="<?=$assets_url?>/assets/admin/pages/scripts/login.js"
		type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
jQuery(document).ready(function() {     
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Login.init();
	Demo.init();
});
</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>