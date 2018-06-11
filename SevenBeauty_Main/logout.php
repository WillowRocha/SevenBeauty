<?php
	require_once("constants.php");
	session_start();
	if(isset($_SESSION['logged'])){
		echo "entrou no if";
		session_destroy();
		sleep(2);
		header("location:".ROUTE.LOGIN);
		die();
	}
	header("location:".ROUTE.HOME);

	