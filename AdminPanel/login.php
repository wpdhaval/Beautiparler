<?php

	
 	include("dbCofig/db_config.php");
	$Obj = new db_config();

	
	
	session_start();

	if(isset($_POST["signin"]))
	{
		$login = $_POST["username"];
		$password = $_POST["password"];
		
		echo $Data = $Obj->SelectData("admin WHERE Emailid='".$login."' AND Password='".$password."'");
		
		if($Data == 0)
		{
			header("location:login.php?msg=Sorry! Login Detail for Admin not Found. Try again.");
		}
		else
		{
			$_SESSION["AId"] = $Data[0]["AId"];
			$_SESSION["Name"] = $Data[0]["Name"];
			header("location:Dashboard.php");
		}
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
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
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
		
			<h1>Admin Login</h1>		
		
        	 <?php if(isset($_GET["msg"])) { ?>
                            <div>
                                <span style="color:#F00; font-weight:bold;"><?php echo $_GET["msg"]; ?></span>
                            </div>
                            <?php } ?>
        	
			<div class="login-fields">
				
				<p>Please provide your details</p>
				
				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" value="" placeholder="Email" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span>
									
				<button name="signin" id="signin" type="submit" class="button btn btn-success btn-large">Sign In</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->



<div class="login-extra">
	Forget Password :- 
	<a href="forgetpass.php">Reset Password</a>
</div> <!-- /login-extra -->


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

</body>

</html>
