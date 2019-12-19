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
			<i class="fa fa-globe"></i>Balance
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
				<td><a href="balance.php?cmd=list" class="nav3">List</a>
					<form name="frm_balance" method="post"
						enctype="multipart/form-data" onSubmit="return checkRequired();">
						<table
							class="table table-bordered table-striped table-condensed flip-content">
							<tr>
								<td>Account</td>
								<td><?php
        $info['table'] = "account";
        $info['fields'] = array(
            "*"
        );
        $info['where'] = "1=1 ORDER BY id DESC";
        $resaccount = $db->select($info);
        ?>
                        <select name="account_id" id="account_id"
									class="textbox">
										<option value="">--Select--</option>
                            <?php
                            foreach ($resaccount as $key => $each) {
                                ?>
                              <option
											value="<?=$resaccount[$key]['id']?>"
											<?php if($resaccount[$key]['id']==$account_id){ echo "selected"; }?>><?=$resaccount[$key]['account_name']?></option>
                            <?php
                            }
                            ?> 
                        </select></td>
							</tr>
							<tr>
								<td>Debit</td>
								<td><input type="text" name="debit" id="debit"
									value="<?=$debit?>" class="textbox"></td>
							</tr>
							<tr>
								<td>Credit</td>
								<td><input type="text" name="credit" id="credit"
									value="<?=$credit?>" class="textbox"></td>
							</tr>
							<tr>
								<td>Balance</td>
								<td><input type="text" name="balance" id="balance"
									value="<?=$balance?>" class="textbox"></td>
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

