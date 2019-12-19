<?php
/*
 * require_once("../../class/class.message.php");
 * require_once("../../class/class.notification.php");
 * require_once("../../class/class.tak.php");
 * require_once("../../common_lib/lib.php");
 */
?>
<div class="top-menu">
	<ul class="nav navbar-nav pull-right">
		<!-- BEGIN NOTIFICATION DROPDOWN -->
		<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

		<!-- END TODO DROPDOWN -->
		<!-- BEGIN USER LOGIN DROPDOWN -->
		<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
		<li class="dropdown dropdown-user"><a href="#" class="dropdown-toggle"
			data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<img alt="" class="img-circle"
				src="<?=$assets_url?>/assets/admin/layout/img/avatar.png" /> <span
				class="username username-hide-on-mobile">
            <?=$_SESSION['email']?> 
            </span> <i class="fa fa-angle-down"></i>
		</a>
			<ul class="dropdown-menu dropdown-menu-default">
				<li><a href="../users/users.php?cmd=list"> <i class="icon-user"></i>
						My Profile
				</a></li>
				<li><a href="../login/login.php?cmd=logout"> <i class="icon-key"></i>
						Log Out
				</a></li>
			</ul></li>
		<!-- END USER LOGIN DROPDOWN -->
		<!-- BEGIN QUICK SIDEBAR TOGGLER -->
		<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
		<!--<li class="dropdown dropdown-quick-sidebar-toggler">
            <a href="javascript:;" class="dropdown-toggle">
            <i class="icon-logout"></i>
            </a>
        </li>-->
		<!-- END QUICK SIDEBAR TOGGLER -->
	</ul>
</div>