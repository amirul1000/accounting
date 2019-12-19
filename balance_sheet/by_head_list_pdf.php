<?php
$str = '';
$arr_year = get_current_account_year($db);
$str .= 'Balance sheet<br>';
$str .= 'Up to Date  : ' . $_REQUEST['transaction_date2'] . ' <br>';
$str .= 'As on : ' . $arr_year[0]['name'] . ' , From ' . $arr_year[0]['from_date'] . ' To  ' . $arr_year[0]['to_date'] . '<br>';

$str .= '<table>
			<tr bgcolor="#ABCAE0">
			  <td>Account</td>
			  <td>Total Debit</td>
			  <td>Total Credit</td>
              <td>Balance</td>
			</tr>';

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

    unset($info);
    unset($data);
    $info["table"] = "transactions LEFT OUTER JOIN head ON(transactions.head_id=head.id)";
    $info["fields"] = array(
        "transactions.*,head.account_type"
    );
    $info["where"] = "1 AND head_id='" . $arr2[$k]['head_id'] . "'  AND transaction_date   BETWEEN '" . $from_date . "' AND '" . $_REQUEST['transaction_date2'] . "'";
    $arr = $db->select($info);

    for ($i = 0; $i < count($arr); $i ++) {

        $debit = $debit + $arr[$i]['debit'];
        $credit = $credit + $arr[$i]['credit'];
    }

    $str .= '<tr>
		          <td>';
    $balance = $credit - $debit;

    unset($info2);
    $info2['table'] = "head";
    $info2['fields'] = array(
        "head_name"
    );
    $info2['where'] = "1 AND id='" . $arr2[$k]['head_id'] . "' LIMIT 0,1";
    $res2 = $db->select($info2);
    $str .= $res2[0]['head_name'];

    if ($account_type == 'debit') {

        $credit = '';
    }
    if ($account_type == 'credit') {
        $debit = '';
    }

    $str .= '</td>
			  <td>' . $debit . '</td>
			  <td>' . $credit . '</td>
		      <td>' . $balance . '</td>
			</tr>';
}

$str .= '</table>';      