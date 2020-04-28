<?php

$con = mysql_connect("localhost","root","") or die("Error : Connection not Establish.");
mysql_select_db("beauty") or die("Error : Database not found.");

@include("session_Checker.php");

if(isset($_POST["submit"]))
	{
		$Password = $_POST["cpassword"];
		$chng = "UPDATE admin SET Password='$Password' WHERE AId='".$_SESSION["AId"]."'";
		mysql_query($chng) or die("Error : insert query problem");
		header("location:changepassword.php?msg=Password Change succesfully");
	}

?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Admin Page</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
 <script language="javascript" type="text/javascript" src="js/ValidationChangePassword.js"></script> 
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.php">
				Tiles Mela
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		
		<form action="" method="post">
        <?php if(isset($message)) { echo $message; } ?>
		
			<h1>Change Password</h1>		
			
			<div class="login-fields">
				
				<p>Please provide your details</p>
				
				<div class="field">
					<label>>Old Password</label>
					<input type="password" name="password" id="password" class="input-short" placeholder="enter the password" />
				</div>
                <div class="field">
					<label for="password">New Password</label>
					<input type="password" name="cpassword" id="cpassword" class="input-short" placeholder="confirm password" />
				</div>
                <div class="field">
					<label for="password">Confirm New Password</label>
					 <input type="password" name="rpassword" id="rpassword" class="input-short" placeholder="re-enter the password"/>
				</div> <!-- /field -->
				
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<input class="button btn btn-success btn-large" type="submit" name="submit" id="submit" value="Submit" onclick="return MyValidation();"/> 
              			
				
			
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<div class="login-extra">
	Back to Login Page :- 
	<a href="login.php">Login</a>
</div> <!-- /login-extra -->


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

</body>

</html>

