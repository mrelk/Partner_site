<?php
session_start ();
include 'functions.php';

echo <<<END

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Accelstor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
	  
	  .error{
	  color: Red;
	  font-size: 16px;
	  }
    </style>
    
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
<script>
  $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
</script>
		
  </head>

  <body>

END;


if (isset($_COOKIE['user']))
{
	$user     = $_COOKIE['user'];
	$loggedin = TRUE;
} else {
	$loggedin = FALSE;
}

if ($loggedin)
{
	echo  <<<END

	    <div class="navbar  navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="userHomePage.php">Accelstor</a>
          <div class="nav-collapse collapse">

             <div class="pull-right">
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#">Hi,$user<b></b></a>
                    </li>
					<li><a href="logout.php">logout<b></b></a>
                    </li>
                </ul>
             </div>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
END;
	
}
else
{
	redirect('index.php');
}

?>