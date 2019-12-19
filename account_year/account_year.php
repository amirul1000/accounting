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
        $info['table'] = "account_year";
        $data['name'] = $_REQUEST['name'];
        $data['from_date'] = $_REQUEST['from_date'];
        $data['to_date'] = $_REQUEST['to_date'];
        $data['action_status'] = $_REQUEST['action_status'];

        $info['data'] = $data;

        if (empty($_REQUEST['id'])) {
            $db->insert($info);
        } else {
            $Id = $_REQUEST['id'];
            $info['where'] = "id=" . $Id;

            $db->update($info);
        }

        include ("account_year_list.php");
        break;
    case "edit":
        $Id = $_REQUEST['id'];
        if (! empty($Id)) {
            $info['table'] = "account_year";
            $info['fields'] = array(
                "*"
            );
            $info['where'] = "id=" . $Id;

            $res = $db->select($info);

            $Id = $res[0]['id'];
            $name = $res[0]['name'];
            $from_date = $res[0]['from_date'];
            $to_date = $res[0]['to_date'];
            $action_status = $res[0]['action_status'];
        }

        include ("account_year_editor.php");
        break;

    case 'delete':
        $Id = $_REQUEST['id'];

        $info['table'] = "account_year";
        $info['where'] = "id='$Id'";

        if ($Id) {
            $db->delete($info);
        }
        include ("account_year_list.php");
        break;
    case "set_balance_by_year":
        $account_year_id = $_REQUEST['id'];
       
	    $info["table"] = "balance";
        $info["fields"] = array(
            "*"
        );
        $info["where"] = "1 ORDER BY id ASC";
        $res = $db->select($info);
        
		for ($i = 0; $i < count($res); $i ++) {
            unset($info);
            unset($data);
            $info['table'] = "balance_year";
            $data['account_id'] = $res[$i]['account_id'];
            $data['account_year_id'] = $account_year_id;
            $data['debit'] = $res[$i]['debit'];
            $data['credit'] = $res[$i]['credit'];
            $data['balance'] = $res[$i]['balance'];
            $info['data'] = $data;
            $db->insert($info);
        }

        unset($info);
        unset($data);
        $info['table'] = "account_year";
        $data['action_status'] = 'done';
        $info['data'] = $data;
        $info['where'] = "id=" . $account_year_id;
        $db->update($info);
        include ("account_year_list.php");
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
        include ("account_year_list.php");
        break;
    case "search_account_year":
        $_REQUEST['page'] = 1;
        $_SESSION["search"] = "yes";
        $_SESSION['field_name'] = $_REQUEST['field_name'];
        $_SESSION["field_value"] = $_REQUEST['field_value'];
        include ("account_year_list.php");
        break;

    default:
        include ("account_year_editor.php");
}

// Protect same image name
function getMaxId($db)
{
    $info['table'] = "account_year";
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
