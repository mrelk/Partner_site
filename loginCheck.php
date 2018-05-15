<?php
require('dbConnectConfig.php');
require('functions.php');

$email = $_POST['email'];
$password = $_POST['password'];
$refer = $_POST['refer'];

if ($email == '' || $password == '')
{
    // No login information
    header('Location: index.php?refer='. urlencode($_POST['refer']));
}
else
{
    // Authenticate user
     $con = mysql_connect($db_host, $db_user, $db_pass);
    mysql_select_db($db_name, $con);
    
    $query = "SELECT id, mail, pw, firstName, lastName FROM userCustom WHERE mail = '$email' AND pw = '$password'";
        echo $query;
    $result = mysql_query($query, $con)
    	or die ('Error in query');
    echo "\r\nrun";
   if (mysql_num_rows($result))
    {
		$row = mysql_fetch_row($result);
        
        // Set the cookie and redirect
        // setcookie( string name [, string value [, int expire [, string path
        // [, string domain [, bool secure]]]]])
        // Setting cookie expire date, 6 hours from now
        $cookieexpiry = (time() + 21600);
        setcookie("session_id", $row[0], $cookieexpiry);
//echo $row[0], $row[1], $row[2], $row[3], $refer, " dddd";
        echo "\r\nrun_1";
        if (!empty($refer) || !$refer)
        {
            echo "\r\nrun_2";
        $refer = 'userHomePage.php';
		    $name = $row[3]." ".$row[4];
			setcookie("user", $name, $cookieexpiry);
			setcookie("pass", $row[2], $cookieexpiry);
			setcookie("mail", $row[1], $cookieexpiry);
			setcookie("userId", $row[0], $cookieexpiry);
        }
echo "\r\nrun_3 " . $refer;
        
        header('Location: '. $refer);
    }
    else
    {
		echo "\r\nrun_2";
        // Not authenticated
        header('Location: index.php?refer='. urlencode($refer));
    }
}
?>