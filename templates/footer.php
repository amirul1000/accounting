
</div>
<!-- END PAGE HEADER-->
</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
         Copyright@2012-<?=date("Y")?>. All right reserved.Design & Developed by <a
			href="http://www.patacorporation.com"><font color="#92CF4E">Pata
				Corporation</font></a>
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
<script src="<?=$assets_url?>/assets/global/plugins/jquery.cokie.min.js"
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