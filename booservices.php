<?php

include("dbCofig/db_config.php");
$Obj = new db_config();

?>
<!DOCTYPE HTML>
<head>
<?php include("include/headerscript.php");
	if(!isset($_SESSION["UId"]))
	{
		echo $ObjCls->Redirect("login.php","Please, Login before book a services");
	}
	
	if(isset($_POST["booknow"]))
	{
		$sDate = $_POST["sDate"];
		$STime = $_POST["STime"];
		$ServiceId = $_POST["ServiceId"];
		$Id = $_SESSION["UId"];
				
			$Obj->nonExecute("INSERT INTO servicebooking(CId,SId,SDate,STime) VALUES('$Id','$ServiceId','$sDate','$STime')");
        	echo $ObjCls->Redirect("booservices.php","Beauty Parlour Service Booking Successfully");
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
						<h2>Book Services</h2>						
					<p>Services Appointment for future</p>								
				     <div class="feedback">
						 <form action="" method="post">
                         	<input type="hidden" name="ServiceId" value="<?php echo base64_decode($_GET["booknow"]); ?>"/>
                         	<label>Service Name : </label>
                            <input type="text" readonly value="<?php echo base64_decode($_GET["Services"]); ?>" />
                            <label>Service Cost : </label>
                            <input type="text" readonly value="<?php echo base64_decode($_GET["d"]); ?>" />
                         	<label>Service Date :</label>
							<input type="date" name="sDate" required id="SDate">
                            <label>Service Time :</label>
							<input type="time" name="STime" required id="STime" />
							<input type="submit" value="Book Now" name="booknow" id="booknow">
						 </form>
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

