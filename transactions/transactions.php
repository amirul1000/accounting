<?php
session_start();
include ("../common/lib.php");
include ("../lib/class.db.php");
include ("../common/config.php");

if (empty($_SESSION['user_id'])) {
    Header("Location: ../login/login.php");
}

$cmd = $_REQUEST['cmd'];
switch ($cmd) {

    case 'add':
        $transaction_no = get_transaction_no($db);

        if (isset($_REQUEST['credit'])) {
            $credit = $_REQUEST['credit'];
            $debit = 0;

            $account_id = $_REQUEST['to_account_id'];
            save_balance($db, $account_id, $debit, $credit);

            $debit1 = $_REQUEST['credit'];
            $credit1 = 0;
            $account_id = $_REQUEST['from_account_id'];
            save_balance($db, $account_id, $debit1, $credit1);
        }
        if (isset($_REQUEST['debit'])) {
            $debit = $_REQUEST['debit'];
            $cedit = 0;

            $account_id = $_REQUEST['to_account_id'];
            save_balance($db, $account_id, $debit, $cedit);

            $credit1 = $_REQUEST['debit'];
            $debit1 = 0;
            $account_id = $_REQUEST['from_account_id'];
            save_balance($db, $account_id, $debit1, $credit1);
        }

        unset($info);
        unset($data);
        $info['table'] = "transactions";
        $data['transaction_no'] = $transaction_no;
        $data['voucher_no'] = $_REQUEST['voucher_no'];
        $data['head_id'] = $_REQUEST['head_id'];
        $data['account_year_id'] = $_REQUEST['account_year_id'];
        $data['account_id'] = $_REQUEST['to_account_id'];
        $data['debit'] = $debit;
        $data['credit'] = $credit;
        $data['base'] = 'yes';
        $data['transaction_date'] = $_REQUEST['transaction_date'];
        $info['data'] = $data;
        $db->insert($info);

        unset($info);
        unset($data);
        $info['table'] = "transactions";
        $data['transaction_no'] = $transaction_no;
        $data['voucher_no'] = $_REQUEST['voucher_no'];
        $data['head_id'] = $_REQUEST['head_id'];
        $data['account_year_id'] = $_REQUEST['account_year_id'];
        $data['account_id'] = $_REQUEST['from_account_id'];
        $data['debit'] = $credit;
        $data['credit'] = $debit;
        $data['base'] = 'no';
        $data['transaction_date'] = $_REQUEST['transaction_date'];
        $info['data'] = $data;
        $db->insert($info);

        include ("transactions_list.php");
        break;
    case "edit":
        $Id = $_REQUEST['id'];
        if (! empty($Id)) {
            $info['table'] = "transactions";
            $info['fields'] = array(
                "*"
            );
            $info['where'] = "id=" . $Id;

            $res = $db->select($info);

            $Id = $res[0]['id'];
            $voucher_no = $res[0]['voucher_no'];
            $head_id = $res[0]['head_id'];
            $account_year_id = $res[0]['account_year_id'];
            $account_id = $res[0]['account_id'];
            $debit = $res[0]['debit'];
            $credit = $res[0]['credit'];
            $transaction_date = $res[0]['transaction_date'];
        }

        include ("transactions_editor.php");
        break;

    case 'delete':
        unset($info);
        unset($data);
        $info["table"] = "transactions";
        $info["fields"] = array(
            "transactions.*"
        );
        $info["where"] = "1 AND transaction_no='" . $_REQUEST['transaction_no'] . "'";
        $arr = $db->select($info);
        for ($i = 0; $i < count($arr); $i ++) {
            $account_id = $arr[$i]['account_id'];
            $credit_amount = $arr[$i]['credit'];
            $debit_amount = $arr[$i]['debit'];
            save_balance($db, $account_id, - $debit_amount, - $credit_amount);
        }

        unset($info);
        unset($data);
        $info['table'] = "transactions";
        $info['where'] = "transaction_no='" . $_REQUEST['transaction_no'] . "'";
        if (isset($_REQUEST['transaction_no'])) {
            $db->delete($info);
        }
        include ("transactions_list.php");
        break;

    case "list":
        if (! empty($_REQUEST['page']) && $_SESSION["search"] == "yes") {
            $_SESSION["search"] = "yes";
        } else {
            $_SESSION["search"] = "no";
            unset($_SESSION["search"]);
            unset($_SESSION['field_name']);
            unset($_SESSION["field_value"]);
        }
        include ("transactions_list.php");
        break;
    case "search_transactions":
        $_REQUEST['page'] = 1;
        $_SESSION["search"] = "yes";
        $_SESSION['field_name'] = $_REQUEST['field_name'];
        $_SESSION["field_value"] = $_REQUEST['field_value'];
        include ("transactions_list.php");
        break;

    default:
        include ("transactions_editor.php");
}

// Protect same image name
function getMaxId($db)
{
    $info['table'] = "transactions";
    $info['fields'] = array(
        "max(id) as maxid"
    );
    $info['where'] = "1=1";

    $resmax = $db->select($info);
    if (count($resmax) > 0) {
        $max = $resmax[0]['maxid'] + 1;
    } else {
        $max = 0;
    }
    return $max;
}

function get_transaction_no($db)
{
    $info['table'] = "transactions";
    $info['fields'] = array(
        "max(transaction_no) as transaction_no"
    );
    $info['where'] = "1=1";

    $resmax = $db->select($info);
    if (count($resmax) > 0) {
        $max = $resmax[0]['transaction_no'] + 1;
    } else {
        $max = 0;
    }
    return $max;
}

function save_balance($db, $account_id, $debit_amount, $credit_amount)
{
    unset($info);
    unset($data);
    $info["table"] = "balance";
    $info["fields"] = array(
        "balance.*"
    );
    $info["where"] = "1 AND account_id='" . $account_id . "'";
    $arr = $db->select($info);

    $debit = $arr[0]['debit'] + $debit_amount;
    $credit = $arr[0]['credit'] + $credit_amount;
    $balance = $credit - $debit;

    /*
     * if(count($arr)==0)
     * {
     * unset($info);
     * unset($data);
     * $info['table'] = "balance";
     * $data['account_id'] = $account_id;
     * $data['debit'] = $debit;
     * $data['credit'] = $credit;
     * $data['balance'] = $balance;
     * $info['data'] = $data;
     * $db->insert($info);
     * }
     * else
     * {
     */
    unset($info);
    unset($data);
    $info['table'] = "balance";
    $data['debit'] = $debit;
    $data['credit'] = $credit;
    $data['balance'] = $balance;
    $info['data'] = $data;
    $info["where"] = "1 AND account_id='" . $account_id . "'";
    $db->update($info);
    // }
}
?>
