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
			<i class="fa fa-globe"></i>Transactions
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
				<td><a href="transactions.php?cmd=list" class="nav3">List</a>
					<form name="frm_transactions" method="post"
						enctype="multipart/form-data" onSubmit="return checkRequired();">
						<table
							class="table table-bordered table-striped table-condensed flip-content">
							<tr>
								<td>Voucher no</td>
								<td><input type="text" name="voucher_no" id="voucher_no"
									value="<?=$voucher_no?>" class="textbox"></td>
							</tr>
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
									class="textbox" required>
										<option value="">--Select--</option>
                            <?php
                            foreach ($reshead as $key => $each) {
                                ?>
                              <option value="<?=$reshead[$key]['id']?>"
											<?php if($reshead[$key]['id']==$head_id){ echo "selected"; }?>><?=$reshead[$key]['head_name']?>-<?=$reshead[$key]['account_type']?></option>
                            <?php
                            }
                            ?> 
                        </select>
								</td>
							</tr>
							<tr>
								<td>Account Year</td>
								<td><?php
        $info['table'] = "account_year";
        $info['fields'] = array(
            "*"
        );
        $info['where'] = "1=1 ORDER BY id DESC";
        $resyear = $db->select($info);
        ?>
                    <select name="account_year_id" id="account_year_id"
									class="textbox">
                        <?php
                        foreach ($resyear as $key => $each) {
                            ?>
                          <option value="<?=$resyear[$key]['id']?>"
											<?php if($resyear[$key]['id']==$account_year_id){ echo "selected"; }?>><?=$resyear[$key]['name']?></option>
                        <?php
                        }
                        ?> 
                    </select></td>
							</tr>
							<tr>
								<td><span id="to_account_type"></span> Account</td>
								<td><?php
        $info['table'] = "account";
        $info['fields'] = array(
            "*"
        );
        $info['where'] = "1=1 ORDER BY account_name ASC";
        $resaccount = $db->select($info);
        ?>
                        <select name="to_account_id" id="to_account_id"
									class="textbox" required>
										<option value="">--Select--</option>
                            <?php
                            foreach ($resaccount as $key => $each) {
                                ?>
                              <option
											value="<?=$resaccount[$key]['id']?>"
											<?php if($resaccount[$key]['id']==$to_account_id){ echo "selected"; }?>><?=$resaccount[$key]['account_name']?></option>
                            <?php
                            }
                            ?> 
                        </select></td>
							</tr>
							<tr>
								<td><span id="from_account_type"></span> Account</td>
								<td>
					    <?php
        $info['table'] = "account";
        $info['fields'] = array(
            "*"
        );
        $info['where'] = "1=1 ORDER BY account_name ASC";
        $resaccount = $db->select($info);
        ?>
                        <select name="from_account_id"
									id="from_account_id" class="textbox" required>
										<option value="">--Select--</option>
                            <?php
                            foreach ($resaccount as $key => $each) {
                                ?>
                              <option
											value="<?=$resaccount[$key]['id']?>"
											<?php if($resaccount[$key]['id']==$from_account_id){ echo "selected"; }?>><?=$resaccount[$key]['account_name']?></option>
                            <?php
                            }
                            ?> 
                        </select>
								</td>
							</tr>
							<tr>
								<td>Debit</td>
								<td><input type="text" name="debit" id="debit"
									value="<?=$debit?>" class="textbox"
									onkeypress="return isNumberKey(event)"></td>
							</tr>
							<tr>
								<td>Credit</td>
								<td><input type="text" name="credit" id="credit"
									value="<?=$credit?>" class="textbox"
									onkeypress="return isNumberKey(event)"></td>
							</tr>
							<tr>
								<td>Transaction Date</td>
								<td><input type="text" name="transaction_date"
									id="transaction_date" value="<?=$transaction_date?>"
									class="datepicker"></td>
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
		function isNumberKey(evt){
			var charCode = (evt.which) ? evt.which : evt.keyCode
			if (charCode == 46 )
				return true;
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		}
		$("#head_id").change(function(){
		    var head     = $("#head_id :selected").text();
			head         = head.split("-");
			account_type = head[1];
			
			to_account_type  = account_type;
			
			
			$("#credit").removeAttr('disabled');
			$("#debit").removeAttr('disabled');
			
			if(to_account_type=='credit')
			{
			    to_color = 'green';
				$("#credit").removeAttr('disabled');
				$("#debit").attr('disabled','disabled');
			}
			else
			{
			    to_color = 'red';
				$("#debit").removeAttr('disabled');
				$("#credit").attr('disabled','disabled');
			}
			
			if(account_type=='credit')
			{
			   from_account_type  = 'debit';   
			   from_color              = 'red';
			}
			else
			{
			   from_account_type  = 'credit';   
			   from_color              = 'green'; 
			   
			}
			
			$("#to_account_type").html(to_account_type.toUpperCase());
            $("#from_account_type").html(from_account_type.toUpperCase());
			
			$("#to_account_type").css( "color", to_color );  
			$("#from_account_type").css( "color",from_color );
			
		});
		
		$("#debit").blur(function(){
		     $("#credit").val($("#debit").val());  
		});
		
		$("#credit").blur(function(){
		   $("#debit").val($("#credit").val());  
		});
		
</script>
<?php
include ("../templates/footer.php");
?>  

