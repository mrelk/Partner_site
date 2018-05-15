<?php
session_start ();
include 'functions.php';

echo <<<END

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
	<link href="css/login.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>
  
END;

$error = $user = $pass = "";

$user ="admin";
$pass = "123";

if (isset ( $_POST ['user'] )) {
	$user = sanitizeString ( $_POST ['user'] );
	$pass = sanitizeString ( $_POST ['pass'] );
	
	if ($user == "" || $pass == "") {
		$error = "<span class='error'>Name or Password not empty£¡</span>";
	} else {
		$query = "select account,password,nickname from user where account = '$user' and password = '$pass' ";
		
		if (mysql_num_rows ( queryMysql ( $query ) ) == 0) {
			$error = "<span class='error'>User Name or Password not Correctly£¡</span>";
		} else {
			$_SESSION ['user'] = $user;
			$_SESSION ['pass'] = $pass;
			
			redirect('welcome.php');
		}
	}
}

echo <<<END
    <div class="container">
      <form class="form-signin" method='post' action='login.php'>
        <h2 class="form-signin-heading">Login</h2>
		       Name: <input type="text"  name='user' value='$user'  class="input-block-level" placeholder="user Name">
		       Password: <input type="password"  name='pass' value='$pass'  class="input-block-level" placeholder="password">
        <button class="btn btn-large btn-primary" type="submit">Login</button> &nbsp;&nbsp; $error
       </form>

    </div> <!-- /container -->

    <!-- Le javascript================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>

  </body>
</html>
END;

?>