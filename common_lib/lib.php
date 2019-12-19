<?php
function get_current_account_year($db)
{
    $info["table"] = "account_year";
	$info["fields"] = array("account_year.*"); 
	$info["where"]   = "1  ORDER BY id DESC LIMIT 0,1";
	$arr =  $db->select($info);
	
	return $arr;
}


function get_balance_year_by_account($db,$account_id)
{
    $info["table"] = "balance_year";
	$info["fields"] = array("balance_year.*"); 
	$info["where"]   = "1  AND account_id='".$account_id."' ORDER BY id DESC LIMIT 0,1";
	$arr =  $db->select($info);
	
	return $arr;
}


function get_balance_year_by_head($db,$head_id)
{
    $info["table"] = "balance_year";
	$info["fields"] = array("balance_year.*"); 
	$info["where"]   = "1  AND head_id='".$head_id."' ORDER BY id DESC LIMIT 0,1";
	$arr =  $db->select($info);
	
	return $arr;
}

?>