<?php
if (isset($_REQUEST['transaction_date'])) {
    $where = " AND transaction_date='" . $_REQUEST['transaction_date'] . "'";
}
if ($_REQUEST['account_id'] > 0) {
    $where .= " AND account_id='" . $_REQUEST['account_id'] . "'";
} else {
    $where .= " GROUP BY account_id";
}

unset($info);
unset($data);
$info["table"] = "transactions";
$info["fields"] = array(
    "distinct(account_id) as account_id"
);
$info["where"] = "1 $where";
$arr2 = $db->select($info);

$grand_debit = 0;
$grand_credit = 0;
$grand_balance = 0;
for ($k = 0; $k < count($arr2); $k ++) {
    $debit = 0;
    $credit = 0;
    // $date = date($_REQUEST['transaction_date'], strtotime("-1 day"));

    $balance = get_opening_balance_by_account($db, $arr2[$k]['account_id'], $_REQUEST['transaction_date']);

    unset($info2);
    $info2['table'] = "account";
    $info2['fields'] = array(
        "account_name"
    );
    $info2['where'] = "1 AND id='" . $arr2[$k]['account_id'] . "' LIMIT 0,1";
    $res2 = $db->select($info2);
    echo $res2[0]['account_name'];

    ?>
<table
	class="table table-bordered table-striped table-condensed flip-content">
	<tr bgcolor="#ABCAE0">
		<td>Voucher No</td>
		<td>Head</td>
		<td>Account Year</td>
		<td>Account</td>
		<td>Debit</td>
		<td>Credit</td>
		<td>Transaction Date</td>
		<td>Balance</td>
	</tr>
	<tr>
		<td colspan="7"></td>
		<td>
                  <?=$balance?>
                </td>
	</tr>
		 <?php
    unset($info);
    unset($data);
    $info["table"] = "transactions";
    $info["fields"] = array(
        "transactions.*"
    );
    $info["where"] = "1 AND account_id='" . $arr2[$k]['account_id'] . "'  AND transaction_date='" . $_REQUEST['transaction_date'] . "'";
    $arr = $db->select($info);

    for ($i = 0; $i < count($arr); $i ++) {

        $debit = $debit + $arr[$i]['debit'];
        $credit = $credit + $arr[$i]['credit'];

        $rowColor;

        if ($i % 2 == 0) {
            $row = "#C8C8C8";
        } else {
            $row = "#FFFFFF";
        }

        ?>
			<tr bgcolor="<?=$row?>"
		onmouseover=" this.style.background='#ECF5B6'; "
		onmouseout=" this.style.background='<?=$row?>'; ">
		<td><?=$arr[$i]['voucher_no']?></td>
		<td>
					<?php
        unset($info2);
        $info2['table'] = "head";
        $info2['fields'] = array(
            "head_name"
        );
        $info2['where'] = "1 AND id='" . $arr[$i]['head_id'] . "' LIMIT 0,1";
        $res2 = $db->select($info2);
        echo $res2[0]['head_name'];
        ?>
               </td>
		<td>
					<?php
        unset($info2);
        $info2['table'] = "account_year";
        $info2['fields'] = array(
            "*"
        );
        $info2['where'] = "1 AND id='" . $arr[$i]['account_year_id'] . "' LIMIT 0,1";
        $res2 = $db->select($info2);
        echo $res2[0]['name'];
        ?>
               </td>
		<td>
				<?php

        $balance = $balance + $arr[$i]['credit'] - $arr[$i]['debit'];

        unset($info2);
        $info2['table'] = "account";
        $info2['fields'] = array(
            "account_name"
        );
        $info2['where'] = "1 AND id='" . $arr[$i]['account_id'] . "' LIMIT 0,1";
        $res2 = $db->select($info2);
        echo $res2[0]['account_name'];

        ?>   
               </td>
		<td><?=$arr[$i]['debit']?></td>
		<td><?=$arr[$i]['credit']?></td>
		<td><?=$arr[$i]['transaction_date']?></td>
		<td> 
			     <?php

        echo $balance;
        ?>  
               </td>
	</tr>
		<?php
    }

    $grand_debit = $grand_debit + $debit;
    $grand_credit = $grand_credit + $credit;
    $grand_balance = $grand_balance + $balance;
    ?>
        <tr>
		<td></td>
		<td></td>
		<td></td>
		<td>Total</td>
		<td><?=$debit?></td>
		<td><?=$credit?></td>
		<td></td>
		<td><?=$balance?></td>
	</tr>
        <?php
    if ($k == count($arr2) - 1) {
        ?>
        <tr>
		<td></td>
		<td></td>
		<td></td>
		<td>Grand Total</td>
		<td><?=$grand_debit?></td>
		<td><?=$grand_credit?></td>
		<td></td>
		<td><?=$grand_balance?></td>
	</tr>
        <?php
    }
    ?>
		</table>
<?php
}
?>        