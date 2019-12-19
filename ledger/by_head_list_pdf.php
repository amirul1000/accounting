<?php
$str = '';
$arr_year = get_current_account_year($db);
$str .= 'Ledger<br>';
$str .= 'Date  : ' . $_REQUEST['transaction_date_from1'] . ' ' . $_REQUEST['transaction_date_to1'] . ' <br>';
$str .= 'As on : ' . $arr_year[0]['name'] . ' , From ' . $arr_year[0]['from_date'] . ' To  ' . $arr_year[0]['to_date'] . '<br>';

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

$grand_debit = 0;
$grand_credit = 0;
$grand_balance = 0;
for ($k = 0; $k < count($arr2); $k ++) {
    $debit = 0;
    $credit = 0;
    $balance = get_opening_balance_by_head($db, $arr2[$k]['head_id'], $_REQUEST['transaction_date_from1']);

    unset($info2);
    $info2['table'] = "head";
    $info2['fields'] = array(
        "head_name"
    );
    $info2['where'] = "1 AND id='" . $arr2[$k]['head_id'] . "' LIMIT 0,1";
    $res2 = $db->select($info2);
    $str .= $res2[0]['head_name'];

    $str .= '<table>
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
                <td colspan="7">
                </td>
                <td>
                  ' . $balance . '
                </td>
            </tr>';
    unset($info);
    unset($data);
    $info["table"] = "transactions";
    $info["fields"] = array(
        "transactions.*"
    );
    $info["where"] = "1 AND head_id='" . $arr2[$k]['head_id'] . "'  AND transaction_date BETWEEN '" . $_REQUEST['transaction_date_from1'] . "' AND '" . $_REQUEST['transaction_date_to1'] . "'";
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

        $str .= '<tr bgcolor="' . $row . '">
			  <td>' . $arr[$i]['voucher_no'] . '</td>
              <td>';

        unset($info2);
        $info2['table'] = "head";
        $info2['fields'] = array(
            "head_name"
        );
        $info2['where'] = "1 AND id='" . $arr[$i]['head_id'] . "' LIMIT 0,1";
        $res2 = $db->select($info2);
        $str .= $res2[0]['head_name'];

        $str .= '</td>
			  <td>';

        unset($info2);
        $info2['table'] = "account_year";
        $info2['fields'] = array(
            "*"
        );
        $info2['where'] = "1 AND id='" . $arr[$i]['account_year_id'] . "' LIMIT 0,1";
        $res2 = $db->select($info2);
        $str .= $res2[0]['name'];

        $str .= '</td>
			  <td>';

        if ($arr[$i]['base'] == 'yes') {
            $balance = $balance + $arr[$i]['credit'] - $arr[$i]['debit'];

            unset($info2);
            $info2['table'] = "account";
            $info2['fields'] = array(
                "account_name"
            );
            $info2['where'] = "1 AND id='" . $arr[$i]['account_id'] . "' LIMIT 0,1";
            $res2 = $db->select($info2);
            $str .= $res2[0]['account_name'];
        } else {
            unset($info2);
            $info2['table'] = "account";
            $info2['fields'] = array(
                "account_name"
            );
            $info2['where'] = "1 AND id='" . $arr[$i]['account_id'] . "' LIMIT 0,1";
            $res2 = $db->select($info2);
            $str .= $res2[0]['account_name'];
        }

        $str .= '</td>
			  <td>' . $arr[$i]['debit'] . '</td>
			  <td>' . $arr[$i]['credit'] . '</td>
			  <td>' . $arr[$i]['transaction_date'] . '</td>
			  <td>';
        if ($arr[$i]['base'] == 'yes') {
            $str .= $balance;
        }

        $str .= '</td>
			  </tr>';
    }

    $grand_debit = $grand_debit + $debit;
    $grand_credit = $grand_credit + $credit;
    $grand_balance = $grand_balance + $balance;

    $str .= '<tr>
             <td></td>
             <td></td>
             <td></td>
             <td>Total</td>
             <td>' . $debit . '</td>
             <td>' . $credit . '</td>
             <td></td>
			 <td>' . $balance . '</td>
        </tr>';

    if ($k == count($arr2) - 1) {
        $str .= '<tr>
				 <td></td>
				 <td></td>
				 <td></td>
				 <td>Grand Total</td>
				 <td>' . $grand_debit . '</td>
				 <td>' . $grand_credit . '</td>
				 <td></td>
				  <td>' . $grand_balance . '</td>
			</tr>';
    }

    $str .= '</table>';
}
        