<?php

session_start();

	if(isset($_COOKIE['mail'], $_COOKIE['password'])) {

		setcookie('mail', '', time() - 3600, '/');
		setcookie('password', '', time() - 3600, '/');

	}

	$_SESSION = array();
	session_destroy();
	header('Location: index.php');

?>