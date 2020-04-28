<?php

include("dbCofig/db_config.php");
$Obj = new db_config();

?>
<!DOCTYPE HTML>
<head>
<?php include("include/headerscript.php"); 
	$Ids = isset($_GET["beatyid"])?base64_decode($_GET["beatyid"]):0;
	$selBeauty = $ObjCls->SELECTbyJOIN("SELECT * FROM beautician WHERE BId='$Ids'");
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
						<h2>About Us :: <?php echo $selBeauty[0]["SaloonName"]; ?></h2>
					<div class="about-img">
						<img src="images/about-img.jpg">
					</div>
					<div class="about-desc">
						<h4>Owner</h4>
                        <p>
                        <?php echo $selBeauty[0]["Name"]; ?> - <?php echo $selBeauty[0]["Contact"]; ?></p>
                        <h4>Address</h4>
						<p><?php echo $selBeauty[0]["Address"]; ?><br><?php echo $selBeauty[0]["SArea"]; ?><br><?php echo $selBeauty[0]["City"]; ?> - <?php echo $selBeauty[0]["SZipcode"]; ?></p>
                        <h4>Contact</h4>
                        <p><?php echo $selBeauty[0]["SContact"]; ?></p>
                        <h4>Email Id</h4>
                        <p><a href="mailto:<?php echo $selBeauty[0]["Emailid"]; ?>"><?php echo $selBeauty[0]["Emailid"]; ?></a></p>
					</div>	
					<div class="clear"></div>
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

