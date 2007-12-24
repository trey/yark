<?php
session_name("Yark");
session_start();

if (!isset($_SESSION['password'])) {
	if (( isset($_POST['password']) ) && ( $_POST['password'] == YARK_PASSWORD ))
		$_SESSION['password'] = YARK_PASSWORD;
	else {
		// TODO login page
		require_once('admin_partials/login.php');
		exit;
	}
}

?>