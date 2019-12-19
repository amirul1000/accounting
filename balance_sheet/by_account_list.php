<table
	class="table table-bordered table-striped table-condensed flip-content">
	<tr bgcolor="#ABCAE0">
		<td>Account</td>
		<td>Total Debit</td>
		<td>Total Credit</td>
		<td>Balance</td>
	</tr>

<?php
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

for ($k = 0; $k < count($arr2); $k ++) {
    $debit = 0;
    $credit = 0;

    $arr_year = get_current_account_year($db);
    $from_date = $arr_year[0]['from_date'];
    $arr_balance = get_balance_year_by_account($db, $arr2[$k]['account_id']);
    $opening_balance = $arr_balance[0]['balance'];
    ?>
            <tr>
		<td colspan="3" align="right">Opening Balance</td>
		<td>
                  <?=$opening_balance?>
                </td>
	</tr>
		 <?php
    unset($info);
    unset($data);
    $info["table"] = "transactions";
    $info["fields"] = array(
        "transactions.*"
    );
    $info["where"] = "1 AND account_id='" . $arr2[$k]['account_id'] . "'  AND transaction_date   BETWEEN '" . $from_date . "' AND '" . $_REQUEST['transaction_date'] . "'";
    $arr = $db->select($info);

    for ($i = 0; $i < count($arr); $i ++) {

        $debit = $debit + $arr[$i]['debit'];
        $credit = $credit + $arr[$i]['credit'];
    }

    ?>
			  <td>
                	<?php
    $balance = $credit - $debit;

    unset($info2);
    $info2['table'] = "account";
    $info2['fields'] = array(
        "account_name"
    );
    $info2['where'] = "1 AND id='" . $arr2[$k]['account_id'] . "' LIMIT 0,1";
    $res2 = $db->select($info2);
    echo $res2[0]['account_name'];
    ?>
              
               </td>
	<td><?=$debit?></td>
	<td><?=$credit?></td>
	<td><?=$balance?></td>
	</tr>
<?php
}
?>  
</table>
