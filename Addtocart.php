<?php

	include("dbCofig/db_config.php");

	if(isset($_POST["add2Cart"]))	
	{
		$_BookId = $_POST["ProId"];
		$qty = $_POST["tblqty"];
		$_ppid = $_POST["Proprice"];
		$Total = $_ppid*$qty;
		$page = $_POST["page"];
	
		$str = "insert into add_to_cart(Cust_id,Item_id,Quality,Price,Total_price) values('1','$_BookId','$qty','$_ppid','$Total')";
	
		mysql_query($str) or die("Error : insert query problem");
		echo "<script language='javascript'> alert('Beauty Product Added into the Cart'); document.location.href='".$page."'; </script>";
		die;
	}
?>