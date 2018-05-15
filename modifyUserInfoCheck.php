<?php
include('incsession.php');
require('dbConnectConfig.php');

$userId = $_COOKIE['userId'];
$companyName = $_POST['companyName'];
$userType = $_POST['userType'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$tittle = $_POST['tittle'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$country = $_POST['country'];
$zip = $_POST['zipCode'];
$website = $_POST['website'];
$password = $_POST['pw'];

	$con = mysql_connect($db_host, $db_user, $db_pass);
    mysql_select_db($db_name, $con);
	
    $query = "UPDATE usercustom SET companyName = '$companyName', 
		mail = '$mail', pw = '$password', website = '$website', 
		userType = '$userType', firstName = '$firstName',
		lastName = '$lastName', title = '$tittle', phoneNum = '$phone',
		city = '$city', country = '$country', zipCode = '$zip'
		WHERE id = '$userId'";
        echo $query;
    $result = mysql_query($query, $con)
    	or die ('Error in query');
	
	if ($result <= 0) {
		header('Location: showUpdateUserInfoResult.php?res=false');
	} else {
		header('Location: showUpdateUserInfoResult.php?res=true');
	}

?>