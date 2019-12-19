<?php
session_start();
require_once ("../common/lib.php");
require_once ("../lib/class.db.php");
require_once ("../common/config.php");
require_once ("../common_lib/lib.php");
$site_url = "http://" . $_SERVER['SERVER_NAME'];
$assets_url = $site_url . '/accounting/metronic';

if (empty($_SESSION['user_id'])) {
    echo '<meta http-equiv="refresh" content="0; url=../login/login.php" />';
}

?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.0
Version: 3.5
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
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title>Pata Accounting</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
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
<link
	href="<?=$assets_url?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"
	rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link
	href="<?=$assets_url?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?=$assets_url?>/assets/global/plugins/fullcalendar/fullcalendar.min.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/jqvmap.css"
	rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?=$assets_url?>/assets/admin/pages/css/tasks.css"
	rel="stylesheet" type="text/css" />
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
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
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->

<style>
.heading_text_logo {
	color: #fff;
	float: left;
	font-size: 15px;
	font-weight: 600;
	padding-left: 12px;
	padding-top: 2px;
	text-transform: uppercase;
	font-weight: bold
}
</style>
<body
	class="page-header-fixed page-quick-sidebar-over-content page-style-square">
	<!-- BEGIN HEADER -->
	<div class="page-header navbar navbar-fixed-top">
		<!-- BEGIN HEADER INNER -->
		<div class="page-header-inner">
			<!-- BEGIN LOGO -->
			<div class="page-logo" style="width: 363px;">
				<a href=""> <label> <img src="../images/logo.png" alt="logo"
						class="logo-default" style="width: 64px; float: left" />
						<h6 class="heading_text_logo">Pata Accounting</h6></label>
				</a>
				<div class="menu-toggler sidebar-toggler hide"></div>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler responsive-toggler"
				data-toggle="collapse" data-target=".navbar-collapse"> </a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
		<?php
include ("../templates/top_menu.php");
?>
		<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END HEADER INNER -->
	</div>
	<!-- END HEADER -->
	<div class="clearfix"></div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
	 <?php
include ("../templates/left_menu.php");
?> 
	<!-- END SIDEBAR -->


		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<div class="modal fade" id="portlet-config" tabindex="-1"
					role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"
									aria-hidden="true"></button>
								<h4 class="modal-title">Modal title</h4>
							</div>
							<div class="modal-body">Widget settings form goes here</div>
							<div class="modal-footer">
								<button type="button" class="btn blue">Save changes</button>
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<!-- BEGIN STYLE CUSTOMIZER -->
				<!-- END STYLE CUSTOMIZER -->
				<!-- BEGIN PAGE HEADER-->
				<h3 class="page-title">
					Dashboard <small>reports & statistics</small>
				</h3>
				<div class="page-bar">
					<ul class="page-breadcrumb">
						<li><i class="fa fa-home"></i> <a href="../login/login_enter.php">Home</a>
							<i class="fa fa-angle-right"></i></li>
						<li><a href="../login/login_enter.php">Dashboard</a></li>
					</ul>

				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN DASHBOARD STATS -->
				<div class="row">

					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat blue-madison">
							<div class="visual">
								<i class="fa fa-comments"></i>
							</div>
							<div class="details">
								<div class="number">
						      <?php
            $arr = get_current_account_year($db);

            echo $arr[0]['name'];
            ?>		 
							</div>
								<div class="desc">
								 Accounting Year <?=$arr[0]['from_date']?> <?=$arr[0]['to_date']?>
							</div>
							</div>
							<a class="more" href="../account_year/account_year.php?cmd=list">
								View more <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat purple-plum">
							<div class="visual">
								<i class="fa fa-comments"></i>
							</div>
							<div class="details">
								<div class="number">
								 <?php
        $info["table"] = "account";
        $info["fields"] = array(
            "count(*) as total"
        );
        $info["where"] = "1";
        $arr = $db->select($info);
        echo $arr[0]['total'];
        ?>
							</div>
								<div class="desc">Total Account</div>
							</div>
							<a class="more" href="../account/account.php?cmd=list"> View more
								<i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat green-haze">
							<div class="visual">
								<i class="fa fa-shopping-cart"></i>
							</div>
							<div class="details">
								<div class="number">
								 <?php
        $info["table"] = "head";
        $info["fields"] = array(
            "count(*) as total"
        );
        $info["where"] = "1";
        $arr = $db->select($info);
        echo $arr[0]['total'];
        ?>
							</div>
								<div class="desc">Total Account Head</div>
							</div>
							<a class="more" href="../head/head.php?cmd=list"> View more <i
								class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat purple-plum">
							<div class="visual">
								<i class="fa fa-globe"></i>
							</div>
							<div class="details">
								<div class="number">
								 <?php

        ?>
							</div>
								<div class="desc">Total</div>
							</div>
							<a class="more" href=""> View more <i
								class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat blue-madison">
							<div class="visual">
								<i class="fa fa-comments"></i>
							</div>
							<div class="details">
								<div class="number">
								 <?php

        ?>
							</div>
								<div class="desc">Total</div>
							</div>
							<a class="more" href=""> View more <i
								class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<!-- END DASHBOARD STATS -->
					<div class="clearfix"></div>

				</div>
			</div>
			<!-- END CONTENT -->

		</div>
		<!-- END PAGE HEADER-->
	</div>
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="page-footer">
		<div class="page-footer-inner">
		 Copyright@2012-<?=date("Y")?> . All right reserved.Design & Developed by <b>Pata
				Corporation.</b>
		</div>
		<div class="scroll-to-top">
			<i class="icon-arrow-up"></i>
		</div>
	</div>
	<!-- END FOOTER -->
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
	<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script
		src="<?=$assets_url?>/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/bootstrap/js/bootstrap.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
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
	<script
		src="<?=$assets_url?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
		type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script
		src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/flot/jquery.flot.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/flot/jquery.flot.resize.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/flot/jquery.flot.categories.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/jquery.pulsate.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"
		type="text/javascript"></script>
	<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
	<script
		src="<?=$assets_url?>/assets/global/plugins/fullcalendar/fullcalendar.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/global/plugins/jquery.sparkline.min.js"
		type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?=$assets_url?>/assets/global/scripts/metronic.js"
		type="text/javascript"></script>
	<script src="<?=$assets_url?>/assets/admin/layout/scripts/layout.js"
		type="text/javascript"></script>
	<script
		src="<?=$assets_url?>/assets/admin/layout/scripts/quick-sidebar.js"
		type="text/javascript"></script>
	<script src="<?=$assets_url?>/assets/admin/layout/scripts/demo.js"
		type="text/javascript"></script>
	<script src="<?=$assets_url?>/assets/admin/pages/scripts/index.js"
		type="text/javascript"></script>
	<script src="<?=$assets_url?>/assets/admin/pages/scripts/tasks.js"
		type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features 
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
});
</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>