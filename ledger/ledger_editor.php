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
			<i class="fa fa-globe"></i>Ledger
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
		<b>By Account</b>
		<table
			class="table table-bordered table-striped table-condensed flip-content">
			<tr>
				<td>
					<form name="frm_cash_statement" method="post"
						enctype="multipart/form-data" onSubmit="return checkRequired();">
						<table
							class="table table-bordered table-striped table-condensed flip-content">

							<tr>
								<td>Account</td>
								<td>
                        <?php
                        $info['table'] = "account";
                        $info['fields'] = array(
                            "*"
                        );
                        $info['where'] = "1=1 ORDER BY account_name ASC";
                        $resaccount = $db->select($info);
                        ?>
                        <select name="account_id" id="account_id"
									class="textbox">
										<option value="">All</option>
                            <?php
                            foreach ($resaccount as $key => $each) {
                                ?>
                              <option
											value="<?=$resaccount[$key]['id']?>"
											<?php if($resaccount[$key]['id']==$_REQUEST['account_id']){ echo "selected"; }?>><?=$resaccount[$key]['account_name']?></option>
                            <?php
                            }
                            ?> 
                        </select>
								</td>
							</tr>
							<tr>
								<td colspan="2">Transaction Date From <input type="text"
									name="transaction_date_from" id="transaction_date_from"
									value="<?=$_REQUEST['transaction_date_from']?>"
									class="datepicker" required> Date To <input type="text"
									name="transaction_date_to" id="transaction_date_to"
									value="<?=$_REQUEST['transaction_date_to']?>"
									class="datepicker" required>
								</td>
							</tr>
							<tr>
								<td align="right"></td>
								<td><input type="hidden" name="cmd" value="ledger_by_account"> <input
									type="hidden" name="id" value="<?=$Id?>"> <input type="submit"
									name="btn_submit" id="btn_submit" value="submit"
									class="button_blue"> <input type="submit" name="btn_submit"
									id="btn_submit" value="Pdf" class="button_blue"></td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>

		<b>By Account Head</b>
		<table
			class="table table-bordered table-striped table-condensed flip-content">
			<tr>
				<td>
					<form name="frm_cash_statement" method="post"
						enctype="multipart/form-data" onSubmit="return checkRequired();">
						<table
							class="table table-bordered table-striped table-condensed flip-content">
							<tr>
								<td>Head</td>
								<td>
                        <?php
                        $info['table'] = "head";
                        $info['fields'] = array(
                            "*"
                        );
                        $info['where'] = "1=1 ORDER BY head_name ASC";
                        $reshead = $db->select($info);
                        ?>
                        <select name="head_id" id="head_id"
									class="textbox">
										<option value="">All</option>
                            <?php
                            foreach ($reshead as $key => $each) {
                                ?>
                              <option value="<?=$reshead[$key]['id']?>"
											<?php if($reshead[$key]['id']==$_REQUEST['head_id']){ echo "selected"; }?>><?=$reshead[$key]['head_name']?>-<?=$reshead[$key]['account_type']?></option>
                            <?php
                            }
                            ?> 
                        </select>
								</td>
							</tr>
							<tr>
								<td colspan="2">Transaction Date From <input type="text"
									name="transaction_date_from1" id="transaction_date_from1"
									value="<?=$_REQUEST['transaction_date_from1']?>"
									class="datepicker" required> Date To <input type="text"
									name="transaction_date_to1" id="transaction_date_to1"
									value="<?=$_REQUEST['transaction_date_to1']?>"
									class="datepicker" required>
								</td>
							</tr>
							<tr>
								<td align="right"></td>
								<td><input type="hidden" name="cmd" value="ledger_by_head"> <input
									type="hidden" name="id" value="<?=$Id?>"> <input type="submit"
									name="btn_submit" id="btn_submit" value="submit"
									class="button_blue"> <input type="submit" name="btn_submit"
									id="btn_submit" value="Pdf" class="button_blue"></td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>

	<?php
$cmd = $_REQUEST['cmd'];
switch ($cmd) {
    case "ledger_by_account":
        include ("by_account_list.php");
        break;
    case "ledger_by_head":
        include ("by_head_list.php");
        break;
}
?>

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

