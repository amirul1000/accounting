<?php
session_start();
error_reporting(0);
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
        $data['password'] = $_REQUEST['password'];
        $info['data'] = $data;

        if (! empty($_SESSION['user_id'])) {
            if (get_password($db, $_REQUEST['old_password']) == true) {
                $Id = $_SESSION['user_id'];
                $info['where'] = "id='" . $_SESSION['user_id'] . "'";
                $db->update($info);
                $message = "password has been changed successfully";
            } else {
                $message = "Old and new password mismatch";
            }
        }
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $old_password = $_REQUEST['old_password'];
        include ("../change_password/change_password_editor.php");
        break;
    case "edit":
        $Id = $_SESSION['user_id'];
        if (! empty($Id)) {
            $info['table'] = "users";
            $info['fields'] = array(
                "*"
            );
            $info['where'] = "id='" . $_SESSION['user_id'] . "'";

            $res = $db->select($info);

            $Id = $res[0]['id'];
            $email = $res[0]['email'];
            // $password = $res[0]['password'];
        }

        include ("../change_password/change_password_editor.php");
        break;
    default:
        $Id = $_SESSION['user_id'];
        if (! empty($Id)) {
            $info['table'] = "users";
            $info['fields'] = array(
                "*"
            );
            $info['where'] = "id='" . $_SESSION['user_id'] . "'";

            $res = $db->select($info);

            $Id = $res[0]['id'];
            $email = $res[0]['email'];
            // $password = $res[0]['password'];
        }
        include ("../change_password/change_password_editor.php");
}

// Protect same image name
function getMaxId($db)
{
    $info['table'] = "change_password";
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

/*
 *
 */
function get_password($db, $password)
{
    unset($info);
    $info['table'] = "users";
    $info['fields'] = array(
        "*"
    );
    $info['where'] = " password='" . $password . "'";
    $res = $db->select($info);
    if (count($res)) {
        return true;
    }
    return false;
}
?>
