<?php
//require("sendMail.php");
require('dbConnectConfig.php');

$companyName = $_POST['companyName'];
$userType = $_POST['userType'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$title = $_POST['title'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$country = $_POST['country'];
$zip = $_POST['zip'];
$website = $_POST['website'];
$password = $_POST['password'];

if ($companyName == '' || $userType == '' || $firstName == '' ||
	$lastName == '' || $title == '' || $mail == '' ||
	$phone == '' || $city == '' || $country == '' ||
	$zip == '' || $website == '' || $password == '')
{
    // No login information
    header('Location: signUp.php');
}
else
{
	$con = mysql_connect($db_host, $db_user, $db_pass);
    mysql_select_db($db_name, $con);
    
    $query = "INSERT INTO `usercustom` (`mail`, `pw`, `companyName`, 
	`userType`, `firstName`, `lastName`, `title`, `phoneNum`, `city`, `country`, `zipCode`, 
	`website`, `apply`) VALUES 
	('$mail', '$password', '$companyName', '$userType', '$firstName', '$lastName', '$title', 
	'$phone', '$city', '$country', '$zip', '$website', '0');";
        
    $result = mysql_query($query, $con)
    	or die ('Error in query');
	
	$to="dontgiveup0313@gmail.com";
　	mail($to,"123","456","789);
	//senMailToAccelstor("new User Apply", "Test", "From :".$mail);
	
	header('Location: index.php'. urlencode($_POST['refer']));
}

?>