<?php
	include("class/QueryClass.php"); 
	$ObjCls = new QueryClass();
	session_start();
	session_destroy();
	echo $ObjCls->Redirect("index.php","Logout successfully");
?>