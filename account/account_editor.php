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
			<i class="fa fa-globe"></i>Account
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
				<td><a href="account.php?cmd=list" class="nav3">List</a>
					<form name="frm_account" method="post"
						enctype="multipart/form-data" onSubmit="return checkRequired();">
						<table
							class="table table-bordered table-striped table-condensed flip-content">
							<tr>
								<td>Account Name</td>
								<td><input type="text" name="account_name" id="account_name"
									value="<?=$account_name?>" class="textbox"></td>
							</tr>
							<tr>
								<td>Account Year</td>
								<td>
							    <?php
        $info['table'] = "account_year";
        $info['fields'] = array(
            "*"
        );
        $info['where'] = "1=1 ORDER BY id DESC";
        $resyear = $db->select($info);
        ?>
								<select name="account_year_id" id="account_year_id"
									class="textbox">
										<option value="">--Select--</option>
									<?php
        foreach ($resyear as $key => $each) {
            ?>
									  <option value="<?=$resyear[$key]['id']?>"
											<?php if($resyear[$key]['id']==$account_year_id){ echo "selected"; }?>><?=$resyear[$key]['name']?></option>
									<?php
        }
        ?> 
								</select>
								</td>
							</tr>
							<tr>
								<td>Opening Balance</td>
								<td>
                            <?php
                            if (! ($opening_balance > 0)) {
                                $opening_balance = 0;
                            }
                            ?>
						    <input type="text" name="opening_balance" id="opening_balance"
									value="<?=$opening_balance?>" class="textbox"
									readonly="readonly"><br /> [This is a double entry account.Set
									opening balance from transaction.Open account for a company]
								</td>
							</tr>
							<tr>
								<td>Company</td>
								<td><input type="text" name="company" id="company"
									value="<?=$company?>" class="textbox"></td>
							</tr>
							<tr>
								<td valign="top">Address</td>
								<td><textarea name="address" id="address" class="textbox"
										style="width: 200px; height: 100px;"><?=$address?></textarea>
								</td>
							</tr>
							<tr>
								<td>Date Created</td>
								<td><input type="text" name="date_created" id="date_created"
									value="<?=$date_created?>" class="datepicker"></td>
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

