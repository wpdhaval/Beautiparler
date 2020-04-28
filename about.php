<?php

include("dbCofig/db_config.php");
$Obj = new db_config();

?>
<!DOCTYPE HTML>
<head>
<?php include("include/headerscript.php"); ?>
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
						<h2>About Us</h2>
					<div class="about-img">
						<img src="images/about-img.jpg">
					</div>
					<div class="about-desc">
						<h4>Lorem Ipsum is simply dummy text of the printing unknown printer took a galley many variations of passages</h4>
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum. </p>
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
					</div>	
					<div class="clear"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>								
				   	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>								
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

