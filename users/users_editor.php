<?php
include ("../templates/header.php");
?>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>

<div id="dialog-token-points" title="Token points">
	<p>
		<span class="ui-icon ui-icon-circle-check"
			style="float: left; margin: 0 7px 50px 0;"></span>
	
	
	<div id="inner_data_token"></div>
	</p>
</div>
<div id="dialog-prizes-points" title="Prizes points">
	<p>
		<span class="ui-icon ui-icon-circle-check"
			style="float: left; margin: 0 7px 50px 0;"></span>
	
	
	<div id="inner_data_prizes"></div>
	</p>
</div>
<div id="spinner"></div>

<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-globe"></i>Profile
		</div>
		<!--<div style="float:right;">
        	<a href="member_archive?cmd=list" class="btn default btn-xs blue">Archive</a>
        </div>-->
		<div class="tools">
			<a href="javascript:;" class="reload"></a> <a href="javascript:;"
				class="remove"></a>
		</div>
	</div>
	<div class="portlet-body flip-scroll">
		<table
			class="table table-bordered table-striped table-condensed flip-content">
			<tr>
				<td><a href="users.php?cmd=list" class="nav3">List</a>
					<form name="frm_users" method="post" enctype="multipart/form-data"
						onSubmit="return checkRequired();">
						<table
							class="table table-bordered table-striped table-condensed flip-content">
							<tr>
								<td>Email</td>
								<td><input type="text" name="email" id="email"
									value="<?=$email?>" class="textbox"></td>
							</tr>
							<!--<tr>
						 <td>Password</td>
						 <td>
						    <input type="text" name="password" id="password"  value="<?=$password?>" class="textbox">
						 </td>
				     </tr>-->
							<tr>
								<td>Title</td>
								<td><input type="text" name="title" id="title"
									value="<?=$title?>" class="textbox"></td>
							</tr>
							<tr>
								<td>First Name</td>
								<td><input type="text" name="first_name" id="first_name"
									value="<?=$first_name?>" class="textbox"></td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td><input type="text" name="last_name" id="last_name"
									value="<?=$last_name?>" class="textbox"></td>
							</tr>
							<tr>
								<td>Company</td>
								<td><input type="text" name="company" id="company"
									value="<?=$company?>" class="textbox"></td>
							</tr>
							<tr>
								<td>Address</td>
								<td><input type="text" name="address" id="address"
									value="<?=$address?>" class="textbox"></td>
							</tr>
							<tr>
								<td>City</td>
								<td><input type="text" name="city" id="city" value="<?=$city?>"
									class="textbox"></td>
							</tr>
							<tr>
								<td>State</td>
								<td><input type="text" name="state" id="state"
									value="<?=$state?>" class="textbox"></td>
							</tr>
							<tr>
								<td>Zip</td>
								<td><input type="text" name="zip" id="zip" value="<?=$zip?>"
									class="textbox"></td>
							</tr>
							<tr>
								<td>Country</td>
								<td><?php
        $info['table'] = "country";
        $info['fields'] = array(
            "*"
        );
        $info['where'] = "1=1 ORDER BY id DESC";
        $rescountry = $db->select($info);
        ?>
							<select name="country_id" id="country_id" class="textbox">
										<option value="">--Select--</option>
								<?php
        foreach ($rescountry as $key => $each) {
            ?>
								  <option value="<?=$rescountry[$key]['id']?>"
											<?php if($rescountry[$key]['id']==$country_id){ echo "selected"; }?>><?=$rescountry[$key]['country']?></option>
								<?php
        }
        ?> 
							</select></td>
							</tr>
							<!--<tr>
						 <td>Created At</td>
						 <td>
						    <input type="text" name="created_at" id="created_at"  value="<?=$created_at?>" class="datepicker">
						 </td>
				     </tr><tr>
						 <td>Updated At</td>
						 <td>
						    <input type="text" name="updated_at" id="updated_at"  value="<?=$updated_at?>" class="datepicker">
						 </td>
				     </tr><tr>
						 <td>Varification Code</td>
						 <td>
						    <input type="text" name="varification_code" id="varification_code"  value="<?=$varification_code?>" class="textbox">
						 </td>
				     </tr><tr>
		           		 <td>Varified</td>
				   		 <td><?php
        $enumusers = getEnumFieldValues('users', 'varified');
        ?>
<select  name="varified" id="varified"   class="textbox">
<?php
foreach ($enumusers as $key => $value) {
    ?>
  <option value="<?=$value?>" <?php if($value==$varified){ echo "selected"; }?>><?=$value?></option>
 <?php
}
?> 
</select></td>
				  </tr><tr>
		           		 <td>Type</td>
				   		 <td><?php
        $enumusers = getEnumFieldValues('users', 'type');
        ?>
<select  name="type" id="type"   class="textbox">
<?php
foreach ($enumusers as $key => $value) {
    ?>
  <option value="<?=$value?>" <?php if($value==$type){ echo "selected"; }?>><?=$value?></option>
 <?php
}
?> 
</select></td>
				  </tr><tr>
		           		 <td>Status</td>
				   		 <td><?php
        $enumusers = getEnumFieldValues('users', 'status');
        ?>
<select  name="status" id="status"   class="textbox">
<?php
foreach ($enumusers as $key => $value) {
    ?>
  <option value="<?=$value?>" <?php if($value==$status){ echo "selected"; }?>><?=$value?></option>
 <?php
}
?> 
</select></td>
				  </tr>-->
							<tr>
								<td align="right"></td>
								<td><input type="hidden" name="cmd" value="add"> <input
									type="hidden" name="id" value="<?=$Id?>"> <input type="submit"
									name="btn_submit" id="btn_submit" value="submit"
									class="button_blue"></td>
							</tr>
						</table>
					</form></td>
			</tr>
		</table>
	</div>
</div>
<script>
		$( ".datepicker" ).datepicker({
			dateFormat: "yy-mm-dd", 
			changeYear: true,
			changeMonth: true,
			showOn: 'button',
			buttonText: 'Show Date',
			buttonImageOnly: true,
			buttonImage: '../images/calendar.gif',
		});
</script>
<?php
include ("../templates/footer.php");
?>

