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
 if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$zipcode = $_POST["zipcode"];
		$contact = $_POST["contact"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		
		$Rows = $ObjCls->SELECTBYId("customer",array("Emailid"=>$email));
		if($Rows!=0)
		{
			echo $ObjCls->Redirect("register.php","EmailId already Exist. Please, Select another");
		}
		else
		{
			$Obj->nonExecute("INSERT INTO customer(Name,Address,City,Zipcode,Contact,Emailid,Password) VALUES('$name','$address','$city','$zipcode','$contact','$email','$password')");
        	echo $ObjCls->Redirect("register.php","Register successfully, Please, Login for more process");
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
						<h2>Register</h2>						
					<p>free register for take appointment and purchase beaty parlour products.</p>								
				     <div class="feedback">
						 <form action="" method="post">
                         	<label>Name :</label>
							<input type="text" name="name" required id="name" placeholder="Enter Name">
                            <label>Address :</label>
							<textarea name="address" required id="address" placeholder="Enter Address"></textarea>
                            <label>City :</label>
							<input type="text" name="city" required id="city" placeholder="Enter City">
                            <label>Zip Code :</label>
							<input type="text" name="zipcode" required id="zipcode" placeholder="Enter Zip Code">
                            <label>Contact :</label>
							<input type="text" name="contact" required id="contact" placeholder="Enter Contact">
						 	<label>Email Id :</label>
							<input type="email" name="email" required id="email" placeholder="Enter Email">
							<label>Password :</label>
						    <input type="password" required name="password" id="password" placeholder="Enter Password">
							<input type="submit" value="Register Now" name="submit" id="submit">
						 </form>
                         <p>Back to Login ? <a href="login.php">Login</a></p>
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

