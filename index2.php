<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
<?php

include("dbCofig/db_config.php");
$Obj = new db_config();

?>

<?php include("include/headerscript.php") ?>
</head>
<body>

<?php include("include/header.php"); ?>

<?php include("include/menu.php"); ?>
	

<?php include("include/slider.php"); ?>



<div class="main">
		<div class="wrap">
		<div class="content">
			<div class="content_top">
				     <div class="grid1">
				     	<h2>Latest Products</h2>
				     	<div class="grides">
				     	<div class="sub_grid1">				   		
				     		
                         <?php
						 
                              $Rows = $Obj->SelectData("products");

                          ?>  
                          <div class="grid_img">
                          <?php if($Rows!=0) { foreach($Rows as $proName) { ?>
				     			 <img src="product/<?php echo $proName["ImageUrl"]; ?>" width="50px" height="50px" alt="No Image">
                                 
				     		</div>
				     		<div class="grid_data">
				     			<p><?php echo $proName["Description"]; ?><span>MORE</span></p>
				     	    </div>
                            <div class="clear"></div>	
                          <?php } } ?>
				     	 	
				     	</div>
					     	<!--<div class="sub_grid2">
					     		
					     		<div class="grid_img">
				     			<img src="images/grid-img2.jpg">
				     		</div>
				     		<div class="grid_data">
				     			<p>Finibus Bonorum Malorum  that a reader will be distracted by the readable. <span>MORE</span></p>
				     	  </div>-->
				     <div class="clear"></div>					     		
				 </div>
				 <div class="clear"></div>		
				      <div class="divider"></div>	
				      
				      <div class="sub_grid1">
				     		
				     		<!--<div class="grid_img">
				     			<img src="images/grid-img5.jpg">
				     		</div>
				     		<div class="grid_data">
				     			<p>Finibus Bonorum Malorum  that a reader will be distracted by the readable. <span>MORE</span></p>
				     	  </div>-->
				     	   <div class="clear"></div>	
				     	</div>
					     	<div class="sub_grid2">
					     		
					     		<!--<div class="grid_img">
				     			<img src="images/grid-img4.jpg">
				     		</div>
				     		<div class="grid_data">
				     			<p>Finibus Bonorum Malorum  that a reader will be distracted by the readable. <span>MORE</span></p>
				     	  </div>-->
				     <div class="clear"></div>					     		
				 </div>
				      <div class="clear"></div>	
				     </div>
				 </div>
				     
				         <div class="grid2">
				         	<h2>What's New</h2>
				         	<img src="images/grid2-img.jpg">
				         	  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>				         	 
					   </div>				
	       <div class="clear"></div>
	       </div>
			<div class="content_bottom">
				<div class="box">
					<div class="box-heading">
						<h2>FASHION</h2>
						<span>Lorem Ipsum is simply dummy text</span>
					</div>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution.</p>
				 			  <div class="more">
				         	  	<span><a href="#">Book now</a></span>
				         	  </div>
				</div>
				<div class="box">
					<div class="box-heading">
						<h2>ADVERTISING</h2>
						<span>Lorem Ipsum is simply dummy text</span>
					</div>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution.</p>
				          <div class="more">
				         	  	<span><a href="#">Book now</a></span>
				         	  </div>
				</div>
				<div class="box">
					<div class="box-heading">
						<h2>WEDDINGS</h2>
						<span>Lorem Ipsum is simply dummy text</span>
					</div>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution.</p>
				         <div class="more">
				         	  	<span><a href="#">Book now</a></span>
				         	  </div>
				</div>
				<div class="box-last">
					<div class="box-heading">
						<h2>BEAUTY</h2>
						<span>Lorem Ipsum is simply dummy text</span>
					</div>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution.</p>
				         <div class="more">
				         	  	<span><a href="#">Book now</a></span>
				         </div>
				</div>
				<div class="clear"></div>
			</div>
	 </div>				
   </div>
</div>

<?php include("include/footer.php"); ?>

</body>
</html>

