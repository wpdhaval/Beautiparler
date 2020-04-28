<?php

include("dbCofig/db_config.php");
$Obj = new db_config();

?>
<!DOCTYPE HTML>
<head>
<?php include("include/headerscript.php");
if(isset($_SESSION["UId"]))
 {
	 echo $ObjCls->Redirect("products.php");
 }
	if(isset($_POST["login"]))
	{
		$login = $_POST["email"];
		$password = $_POST["password"];
		$Rows = $ObjCls->SELECTbyJOIN("SELECT * FROM customer WHERE Emailid='$login' AND Password='$password'");
		if($Rows!=0)
		{
			$_SESSION["UId"] = $Rows[0]["CId"];
			$_SESSION["UName"] = $Rows[0]["Name"];
			echo $ObjCls->Redirect("index.php","Login successfully");
		}
		else
		{
			echo $ObjCls->Redirect("login.php","Customer Login detail not found. Please, Try again..");
		}
	}

?>
</head>
<body>

<?php include("include/header.php"); ?>

<?php include("include/menu.php"); ?>

<?php include("include/slider.php"); ?>
</div>
	<div class="main">
		<div class="wrap">
			<div class="content">
				<div class="about-data">
						<h2>Login</h2>						
					<p>Login for take appointment and purchase beaty parlour products.</p>								
				     <div class="feedback">
						 <form action="" method="post">
						 	<label>Email :</label>
							<input type="email" name="email" required id="email" placeholder="Enter Email">
							<label>Password :</label>
						    <input type="password" required name="password" id="password" placeholder="Enter Password">
							<input type="submit" value="Login Now" name="login" id="login">
						 </form>
                         <p>Are you new User ? <a href="register.php" style="color:#FC375E; font-weight:bold;">Free Register now</a></p>
		 			</div>				
				</div>
			<div class="sidebar">
				<h2>Recent Products</h2>
                 <?php $Rows = $Obj->SelectData("products LIMIT 0,5"); ?>  
                  <?php if($Rows!=0) { foreach($Rows as $proName) { ?>
				<div class="blog_posts">
				       <div class="blog_date">
							<img src="product/<?php echo $proName["ImageUrl"]; ?>" style="width:54px; height:34px;" alt="No Image">
					  </div>
					       <div class="blog_desc">
								<div class="blog_heading">
                                <a href="products.php">
									<p><span><?php echo $proName["PName"]; ?></span></p>
                                 </a>
							     </div>	
							     <p><?php echo $proName["Description"]; ?></p>
					       </div>
					 <div class="clear"></div>	
				</div>	
                <?php } } ?>					       					
				</div>
				<div class="clear"></div>
	       </div>
		</div>		
   </div>
  
<?php include("include/footer.php"); ?>

</body>
</html>

