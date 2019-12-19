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
        $info['table'] = "users";
        $data['email'] = $_REQUEST['email'];
        $data['title'] = $_REQUEST['title'];
        $data['first_name'] = $_REQUEST['first_name'];
        $data['last_name'] = $_REQUEST['last_name'];
        $data['company'] = $_REQUEST['company'];
        $data['address'] = $_REQUEST['address'];
        $data['city'] = $_REQUEST['city'];
        $data['state'] = $_REQUEST['state'];
        $data['zip'] = $_REQUEST['zip'];
        $data['country_id'] = $_REQUEST['country_id'];

        $info['data'] = $data;

        if (empty($_REQUEST['id'])) {
            $db->insert($info);
        } else {
            $Id = $_REQUEST['id'];
            $info['where'] = "id=" . $Id;

            $db->update($info);
        }

        include ("../users/users_list.php");
        break;
    case "edit":
        $Id = $_REQUEST['id'];
        if (! empty($Id)) {
            $info['table'] = "users";
            $info['fields'] = array(
                "*"
            );
            $info['where'] = "id=" . $Id;

            $res = $db->select($info);

            $Id = $res[0]['id'];
            $email = $res[0]['email'];
            $password = $res[0]['password'];
            $title = $res[0]['title'];
            $first_name = $res[0]['first_name'];
            $last_name = $res[0]['last_name'];
            $company = $res[0]['company'];
            $address = $res[0]['address'];
            $city = $res[0]['city'];
            $state = $res[0]['state'];
            $zip = $res[0]['zip'];
            $country_id = $res[0]['country_id'];
            $created_at = $res[0]['created_at'];
            $updated_at = $res[0]['updated_at'];
            $varification_code = $res[0]['varification_code'];
            $varified = $res[0]['varified'];
            $type = $res[0]['type'];
            $status = $res[0]['status'];
        }

        include ("../users/users_editor.php");
        break;

    case 'delete':
        $Id = $_REQUEST['id'];

        $info['table'] = "users";
        $info['where'] = "id='$Id'";

        if ($Id) {
            $db->delete($info);
        }
        include ("../users/users_list.php");
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
        include ("../users/users_list.php");
        break;
    case "search_users":
        $_REQUEST['page'] = 1;
        $_SESSION["search"] = "yes";
        $_SESSION['field_name'] = $_REQUEST['field_name'];
        $_SESSION["field_value"] = $_REQUEST['field_value'];
        include ("../users/users_list.php");
        break;

    default:
        include ("../users/users_editor.php");
}

// Protect same image name
function getMaxId($db)
{
    $info['table'] = "users";
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
