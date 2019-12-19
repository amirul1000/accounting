<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>ECC DOE-BD ORG</title>
<!--Header-->
<link rel="stylesheet" href="../css/style.css">
	<script src="../js/main.js" type="text/javascript"></script>
	<link rel="stylesheet" href="../css/datepicker.css">

		<link rel="stylesheet"
			href="../jquery-ui/development-bundle/themes/base/jquery.ui.all.css">
			<script src="../jquery-ui/development-bundle/jquery-1.7.2.js"></script>
			<script src="../jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
			<script src="../jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
			<script
				src="../jquery-ui/development-bundle/ui/jquery.ui.accordion.js"></script>

			<script
				src="../jquery-ui/development-bundle/ui/jquery-ui-1.8.16.custom.min.js"></script>
			<script src="../jquery-ui/development-bundle/ui/jquery.ui.slider.js"></script>
			<script
				src="../jquery-ui/development-bundle/ui/jquery-ui-timepicker-addon.js"></script>
			<link type="text/css"
				href="../jquery-ui/css/ui-lightness/jquery-ui-1.8.16.custom.css"
				rel="stylesheet">

				<script
					src="../jquery-ui/development-bundle/ui/jquery.ui.progressbar.js"></script>
				<style>
.my_table tr.even {
	background: #E6EDF5;
}

.my_table tr.odd {
	background: #F0F5FA;
}

.left_menu_section {
	width: 100% !important;
}
</style>
				<script language="javascript">
		$(document).ready(function() {
				$(".my_table tr:nth-child(even)").addClass("even");
				$(".my_table tr:nth-child(odd)").addClass("odd");
			});
	</script>
				<div class="header_section_main">
					<div class="logo_left_img">
						<img src="../images/logodoe.png" class="logo_img" />
					</div>
					<div class="title_text">
         <?php
        if (! empty($_SESSION['user_id'])) {
            ?>
			 <font color="#FFFFFF" size="3"><i>Welcome <b><?=$_SESSION['first_name'] ." ".$_SESSION['last_name']?></b></i>
						</font>
		   <?php
        }
        ?>
            
       
       
       </div>
					<div class="adminUsername">
						<a href="../help_links/help_links.php?cmd=list" class="nav"><font
							color="white" class="front_user_text">Help</font></a>|
		  <?php
    unset($info);
    $info["table"] = "how_apply";
    $info["fields"] = array(
        "how_apply.*"
    );
    $info["where"] = "1 LIMIT 0,1";
    $arr = $db->select($info);
    ?>
           <a href="../<?=$arr[0]['apply_file']?>" class="nav"><font
							color="white" class="front_user_text">How to apply</font></a>| <a
							href="../search_project/search_project.php" class="nav"><font
							color="white" class="front_user_text">Search project</font></a>&nbsp;&nbsp;&nbsp;
           
			<?php
if (! empty($_SESSION['user_id'])) {
    ?>
			<a href="../login/login.php?cmd=logout" class="nav"><font
							color="#FF0000" class="front_user_text">Logout</font></a>&nbsp;&nbsp;
			<?php
} else {
    ?>
			<a href="../login/login.php" class="nav"><font color="white"
							class="front_user_text">Login</font></a>&nbsp;| <a
							href="../users/users.php?cmd=register" class="nav"><font
							color="white" class="front_user_text">Register</font></a>
			<?php
}
?>
        </div>

				</div>


				<table>
					<tr>
						<td valign="top">
							<div class="admin_content_section">
								<div class="left_menu_section">
          
              <?php
            if (! empty($_SESSION['user_id'])) {
                include ("../templates/left_menu.php");
            }
            ?>
         
         </div>
							</div>
						</td>
						<td valign="top">