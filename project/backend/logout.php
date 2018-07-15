<?php

	require 'database-config.php';
	session_start();
	if(isset($_SESSION['recent']))
	$text = $_SESSION['recent'];
	session_unset();
	session_destroy();
	header("Location: /project4/$text");
?>