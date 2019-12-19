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
        $info['table'] = "balance_year";
        $data['account_id'] = $_REQUEST['account_id'];
        $data['account_year_id'] = $_REQUEST['account_year_id'];
        $data['debit'] = $_REQUEST['debit'];
        $data['credit'] = $_REQUEST['credit'];
        $data['balance'] = $_REQUEST['balance'];

        $info['data'] = $data;
        if (empty($_REQUEST['id'])) {
            $db->insert($info);
        } else {
            $Id = $_REQUEST['id'];
            $info['where'] = "id=" . $Id;

            $db->update($info);
        }

        include ("balance_year_list.php");
        break;
    case "edit":
        $Id = $_REQUEST['id'];
        if (! empty($Id)) {
            $info['table'] = "balance_year";
            $info['fields'] = array(
                "*"
            );
            $info['where'] = "id=" . $Id;

            $res = $db->select($info);

            $Id = $res[0]['id'];
            $account_id = $res[0]['account_id'];
            $account_year_id = $res[0]['account_year_id'];
            $debit = $res[0]['debit'];
            $credit = $res[0]['credit'];
            $balance = $res[0]['balance'];
        }

        include ("balance_year_editor.php");
        break;

    case 'delete':
        $Id = $_REQUEST['id'];

        $info['table'] = "balance_year";
        $info['where'] = "id='$Id'";

        if ($Id) {
            $db->delete($info);
        }
        include ("balance_year_list.php");
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
        include ("balance_year_list.php");
        break;
    case "search_balance_year":
        $_REQUEST['page'] = 1;
        $_SESSION["search"] = "yes";
        $_SESSION['field_name'] = $_REQUEST['field_name'];
        $_SESSION["field_value"] = $_REQUEST['field_value'];
        include ("balance_year_list.php");
        break;

    default:
        include ("balance_year_editor.php");
}

// Protect same image name
function getMaxId($db)
{
    $info['table'] = "balance_year";
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
?>
