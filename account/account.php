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
        $info['table'] = "account";
        $data['account_name'] = $_REQUEST['account_name'];
        $data['account_year_id'] = $_REQUEST['account_year_id'];
        $data['opening_balance'] = $_REQUEST['opening_balance'];
        $data['company'] = $_REQUEST['company'];
        $data['address'] = $_REQUEST['address'];
        $data['date_created'] = $_REQUEST['date_created'];

        $info['data'] = $data;

        if (empty($_REQUEST['id'])) {
            $db->insert($info);
            $account_id = $db->lastInsert($result);
            $account_year_id = $_REQUEST['account_year_id'];
            $opening_balance = $_REQUEST['opening_balance'];
            save_account_year($db, $account_id, $account_year_id, $opening_balance);
            save_balance($db, $account_id, $opening_balance);
            ;
        } else {
            $Id = $_REQUEST['id'];
            $info['where'] = "id=" . $Id;

            $db->update($info);
        }

        include ("account_list.php");
        break;
    case "edit":
        $Id = $_REQUEST['id'];
        if (! empty($Id)) {
            $info['table'] = "account";
            $info['fields'] = array(
                "*"
            );
            $info['where'] = "id=" . $Id;

            $res = $db->select($info);

            $Id = $res[0]['id'];
            $account_name = $res[0]['account_name'];
            $account_year_id = $res[0]['account_year_id'];
            $opening_balance = $res[0]['opening_balance'];
            $company = $res[0]['company'];
            $address = $res[0]['address'];
            $date_created = $res[0]['date_created'];
        }

        include ("account_editor.php");
        break;

    case 'delete':
        $Id = $_REQUEST['id'];

        $info['table'] = "account";
        $info['where'] = "id='$Id'";

        if ($Id) {
            $db->delete($info);
        }
        include ("account_list.php");
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
        include ("account_list.php");
        break;
    case "search_account":
        $_REQUEST['page'] = 1;
        $_SESSION["search"] = "yes";
        $_SESSION['field_name'] = $_REQUEST['field_name'];
        $_SESSION["field_value"] = $_REQUEST['field_value'];
        include ("account_list.php");
        break;

    default:
        include ("account_editor.php");
}

// Protect same image name
function getMaxId($db)
{
    $info['table'] = "account";
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

function save_account_year($db, $account_id, $account_year_id, $balance)
{
    $info['table'] = "balance_year";
    $data['account_id'] = $account_id;
    $data['account_year_id'] = $account_year_id;
    $data['debit'] = 0;
    $data['credit'] = $balance;
    $data['balance'] = $balance;
    $info['data'] = $data;
    $db->insert($info);
}

function save_balance($db, $account_id, $balance)
{
    $info['table'] = "balance";
    $data['account_id'] = $account_id;
    $data['debit'] = 0;
    $data['credit'] = $balance;
    $data['balance'] = $balance;
    $info['data'] = $data;
    $db->insert($info);
}
?>
