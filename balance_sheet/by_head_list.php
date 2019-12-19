<table
	class="table table-bordered table-striped table-condensed flip-content">
	<tr bgcolor="#ABCAE0">
		<td>Account</td>
		<td>Total Debit</td>
		<td>Total Credit</td>
	</tr>

<?php
if ($_REQUEST['head_id'] > 0) {
    $where .= " AND head_id='" . $_REQUEST['head_id'] . "'";
} else {
    $where .= " GROUP BY head_id";
}

unset($info);
unset($data);
$info["table"] = "transactions";
$info["fields"] = array(
    "distinct(head_id) as head_id"
);
$info["where"] = "1 $where";
$arr2 = $db->select($info);

for ($k = 0; $k < count($arr2); $k ++) {
    $debit = 0;
    $credit = 0;

    $arr_year = get_current_account_year($db);
    $from_date = $arr_year[0]['from_date'];
    /*
     * $arr_balance = get_balance_year_by_head($db,$arr2[$k]['head_id']);
     * $opening_balance = $arr_balance[0]['balance'];
     */
    ?>
           <!-- <tr>
                <td colspan="3" align="right">
                   Opening Balance
                </td>
                <td>
                  <?=$opening_balance?>
                </td>
            </tr>-->
		 <?php
    unset($info);
    unset($data);
    $info["table"] = "transactions LEFT OUTER JOIN head ON(transactions.head_id=head.id)";
    $info["fields"] = array(
        "transactions.*,head.account_type"
    );
    $info["where"] = "1 AND head_id='" . $arr2[$k]['head_id'] . "'  AND transaction_date   BETWEEN '" . $from_date . "' AND '" . $_REQUEST['transaction_date2'] . "'";
    $arr = $db->select($info);

    for ($i = 0; $i < count($arr); $i ++) {
        $account_type = $arr[$i]['account_type'];
        $debit = $debit + $arr[$i]['debit'];
        $credit = $credit + $arr[$i]['credit'];
    }

    ?>
			  <td>
                	<?php
    $balance = $credit - $debit;

    unset($info2);
    $info2['table'] = "head";
    $info2['fields'] = array(
        "head_name"
    );
    $info2['where'] = "1 AND id='" . $arr2[$k]['head_id'] . "' LIMIT 0,1";
    $res2 = $db->select($info2);
    echo $res2[0]['head_name'];
    ?>
              
               </td>
	<td>
			      <?php
    if ($account_type == 'debit') {
        echo $debit;
    }
    ?>
               </td>
	<td>
                   <?php
    if ($account_type == 'credit') {
        echo $credit;
    }
    ?>
              </td>
	</tr>
<?php
}
?>  
</table>
