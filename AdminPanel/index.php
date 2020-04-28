<?php

	session_start();
	if(isset($_SESSION["AId"]))
	{
		header("location:dashboard.php");
		die;
	}

	header("location:login.php");

?>