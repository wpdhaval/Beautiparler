<?php

	session_start();
	
	if(!isset($_SESSION["AId"]))
	{
		header("location:index.php");
	}
?>