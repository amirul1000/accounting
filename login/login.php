<?php
session_start();
include ("../common/lib.php");
include ("../lib/class.db.php");
include ("../common/config.php");
include ("../common_lib/lib.php");
include ("../common_lib/capcha.php");

$cmd = $_REQUEST['cmd'];

switch ($cmd) {

    case "login":
        // if($_SESSION['rand'] == $_REQUEST['rand'])
        // {
        $info["table"] = "users";
        $info["fields"] = array(
            "*"
        );
        $info["where"] = " 1=1 AND email  LIKE BINARY '" . clean($_REQUEST["email"]) . "' AND password  LIKE BINARY '" . clean($_REQUEST["password"]) . "'";
        $info["debug"] = true;
        $res = $db->select($info);

        if (count($res) > 0) {
            $_SESSION["user_id"] = $res[0]["id"];
            $_SESSION["email"] = $res[0]["email"];
            $_SESSION["first_name"] = $res[0]["first_name"];
            $_SESSION["last_name"] = $res[0]["last_name"];
            $_SESSION["cell_no"] = $res[0]["cell_no"];
            $_SESSION["type"] = $res[0]["type"];

            Header("Location: login_enter.php");
        } else {
            $message = "Login fail,wrong userid or password";
            include ("login_editor.php");
        }
        // }
        // else
        // {
        // $message="Login fail,Code mismatch";
        // include("login_editor.php");
        // }
        break;
    case "logout":
        session_destroy();
        unset($_SESSION["users_id"]);
        unset($_SESSION["email"]);
        unset($_SESSION["first_name"]);
        unset($_SESSION["last_name"]);
        unset($_SESSION["type"]);
        Header("Location: login.php");
        break;

    default:
        session_destroy();
        unset($_SESSION["user_id"]);
        unset($_SESSION["email"]);
        unset($_SESSION["first_name"]);
        unset($_SESSION["last_name"]);
        unset($_SESSION["type"]);
        include ("login_editor.php");
}

function clean($str)
{
    $str = @trim($str);
    if (get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    $str = stripslashes($str);
    $str = str_replace("'", "", $str);
    $str = str_replace('"', "", $str);
    $str = str_replace("-", "", $str);
    $str = str_replace(";", "", $str);
    $str = str_replace("or 1", "", $str);
    $str = str_replace("drop", "", $str);

    return mysql_real_escape_string($str);
}
?>