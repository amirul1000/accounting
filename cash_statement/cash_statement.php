<?php
session_start();
include ("../common/lib.php");
include ("../lib/class.db.php");
include ("../common/config.php");
include ("../common_lib/lib.php");

if (empty($_SESSION['user_id'])) {
    Header("Location: ../login/login.php");
}

$cmd = $_REQUEST['cmd'];
switch ($cmd) {
    case "statement_by_account":
        if ($_REQUEST['btn_submit'] == 'Pdf') {
            // get the HTML
            ob_start();
            include ("by_account_list_pdf.php");
            $content = ob_get_clean();
            $content = $str;

            // convert in PDF
            require_once (dirname(__FILE__) . '/../html2pdf_v4.03/html2pdf.class.php');
            try {
                $html2pdf = new HTML2PDF('P', 'A3', 'fr');
                $html2pdf->pdf->SetDisplayMode('real');
                $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
                // $html2pdf->setModeDebug();
                // $html2pdf->setDefaultFont('Arial');
                $html2pdf->Output('day_cash_statement.pdf');
            } catch (HTML2PDF_exception $e) {
                echo $e;
                exit();
            }
            break;
        } else {
            include ("cash_statement_editor.php");
        }
        break;
    case "statement_by_head":
        if ($_REQUEST['btn_submit'] == 'Pdf') {
            // get the HTML
            ob_start();
            include ("by_head_list_pdf.php");
            $content = ob_get_clean();
            $content = $str;

            // convert in PDF
            require_once (dirname(__FILE__) . '/../html2pdf_v4.03/html2pdf.class.php');
            try {
                $html2pdf = new HTML2PDF('P', 'A3', 'fr');
                $html2pdf->pdf->SetDisplayMode('real');
                $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
                // $html2pdf->setModeDebug();
                // $html2pdf->setDefaultFont('Arial');
                $html2pdf->Output('day_cash_statement.pdf');
            } catch (HTML2PDF_exception $e) {
                echo $e;
                exit();
            }
            break;
        } else {
            include ("cash_statement_editor.php");
        }
        break;
    default:
        include ("cash_statement_editor.php");
}

function get_opening_balance_by_account($db, $account_id, $transaction_date)
{
    $info["table"] = "transactions";
    $info["fields"] = array(
        "sum(credit) as credit,sum(debit) as debit"
    );
    $info["where"] = "1 AND account_id='" . $account_id . "' AND transaction_date<'$transaction_date' AND base='yes'";
    $arr = $db->select($info);
    $balance = $arr[0]['credit'] - $arr[0]['debit'];
    return $balance;
}

function get_opening_balance_by_head($db, $head_id, $transaction_date)
{
    $info["table"] = "transactions";
    $info["fields"] = array(
        "sum(credit) as credit,sum(debit) as debit"
    );
    $info["where"] = "1 AND head_id='" . $head_id . "' AND transaction_date<'$transaction_date' AND base='yes'";
    $arr = $db->select($info);
    $balance = $arr[0]['credit'] - $arr[0]['debit'];
    return $balance;
}
?>
