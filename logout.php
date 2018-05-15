<?php
session_start();
include 'functions.php';

if (isset($_COOKIE['user']))
{
	destroySession();
}

redirect('index.php');

?>