<?php
include ("../templates/header.php");
?>
<link rel="stylesheet" href="../datepicker/jquery-ui.css">
<script src="../datepicker/jquery-1.10.2.js"></script>
<script src="../datepicker/jquery-ui.js"></script>

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
			<i class="fa fa-globe"></i>Account year
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
				<td><a href="account_year.php?cmd=list" class="nav3">List</a>
					<form name="frm_account_year" method="post"
						enctype="multipart/form-data" onSubmit="return checkRequired();">
						<table
							class="table table-bordered table-striped table-condensed flip-content">
							<tr>
								<td>Name</td>
								<td><input type="text" name="name" id="name" value="<?=$name?>"
									class="textbox"></td>
							</tr>
							<tr>
								<td>From Date</td>
								<td><input type="text" name="from_date" id="from_date"
									value="<?=$from_date?>" class="datepicker"></td>
							</tr>
							<tr>
								<td>To Date</td>
								<td><input type="text" name="to_date" id="to_date"
									value="<?=$to_date?>" class="datepicker"></td>
							</tr>
							<tr>
								<td>Action Status</td>
								<td><?php
        $enumaccount_year = getEnumFieldValues('account_year', 'action_status');
        ?>
							<select name="action_status" id="action_status" class="textbox">
							<?php
    foreach ($enumaccount_year as $key => $value) {
        ?>
							  <option value="<?=$value?>"
											<?php if($value==$action_status){ echo "selected"; }?>><?=$value?></option>
							 <?php
    }
    ?> 
							</select></td>
							</tr>
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

