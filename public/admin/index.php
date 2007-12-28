<?php
require_once('../../app/load.php');
require_once('../../app/functions.php');

session_name("Yark");
session_start();

if (!isset($_SESSION['password'])) {
	if (( isset($_POST['password']) ) && ( $_POST['password'] == YARK_PASSWORD ))
		$_SESSION['password'] = YARK_PASSWORD;
	else {
		// TODO login page
		require_once('pages/login.php');
		exit;
	}
}

?>