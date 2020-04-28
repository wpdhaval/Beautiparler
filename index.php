<?php

include("dbCofig/db_config.php");
$Obj = new db_config();

?>
<!DOCTYPE HTML>
<head>
<?php include("include/headerscript.php") ?>
</head>
<body>

<?php include("include/header.php"); ?>

<?php include("include/menu.php"); ?>

<?php include("include/slider.php"); ?>
</div>
	<div class="main">
		<div class="wrap">
		<div class="content">
			<div class="content_top">
				     <div class="grid1">
				     	<h2>Latest Products</h2>
				     	<div class="grides">
                        <?php
						 
                              $Rows = $Obj->SelectData("products ORDER BY PId DESC LIMIT 0,10");
							if($Rows!=0) {
							foreach($Rows as $proName) { 
                          ?> 
				     	<div class="sub_grid1">				   		
				     		<div class="grid_img">
				     			<img src="product/<?php echo $proName["ImageUrl"]; ?>" width="161px" height="101px" alt="No Image">
				     		</div>
				     		<div class="grid_data">
                            	<p><strong><u><?php echo $proName["PName"]; ?></u></strong><br>
				     			<?php echo $proName["Description"]; ?> <span>MORE</span><br>
                                Price : Rs. <?php echo $proName["Price"]; ?></p>
                                <form action="addtocart.php" method="post">
                                <input type="hidden" name="page" value="index.php">
                                <input type="hidden" name="ProId" value="<?php echo $proName["PId"]; ?>">
                                <input type="hidden" name="Proprice" value="<?php echo $proName["Price"]; ?>">
                                <input type="number" required style="width:40px; border:1px solid #DEDEDE; padding:5px;" value="1" min="1" max="100" name="tblqty" />
                                <button type="submit" name="add2Cart" style="border:1px solid #FFF; background:-webkit-linear-gradient(top, #e33d3d 0%,#bc0100 100%); font-size:14px; padding:5px; color:#FFF;">Add To Cart</button>
                                </form>
				     	  </div>
				     	   <div class="clear"></div>	
				     	</div>
                        <?php } } ?>
				      <div class="clear"></div>	
				     </div>
				 </div>
				     
				         <div class="grid2">
				         	<h2>Beutician List</h2>
				         	<img src="images/grid2-img.jpg">
				         	  <?php
					  		$Rows = $Obj->SelectData("beautician ORDER BY BId DESC LIMIT 0,10");
							if($Rows!=0) { foreach($Rows as $proName) { ?>  
                              <p style="border-bottom:1px dotted #AEAEAE;"><a style="color:#DC3333; font-weight:bold;" href="beaticianlist.php?beatyid=<?php echo base64_encode($proName["BId"]); ?>"><?php echo $proName["Name"]; ?></a></p>				         	
						    <?php } } ?> 
					   </div>				
	       <div class="clear"></div>
	       </div>
			<div class="content_bottom">
				<?php
					$i=1;
					  $Rows = $Obj->SelectData("services ORDER BY SId DESC LIMIT 0,4");
				?>  
                <?php if($Rows!=0) { foreach($Rows as $proName) { ?>
                <div class="<?php echo $i==4?"box-last":"box"; ?>">
					<div class="box-heading">
						<h2><?php echo $proName["Name"]; ?></h2>
					</div>
                    <img style="width:250px; height:157px;" src="product/<?php echo $proName["PhotoImage"]; ?>"/>
					<p><?php echo $proName["Description"]; ?></p>
                     <p>Price : Rs. <?php echo $proName["Price"]; ?></p>
				 			  <div class="more">
				         	  	<span><a href="booservices.php?booknow=<?php echo base64_encode($proName["SId"]); ?>&d=<?php echo base64_encode($proName["Price"]); ?>&Services=<?php echo base64_encode($proName["Name"]); ?>">Book now</a></span>
				         	  </div>
				</div>
                <?php $i++; } } ?>
				<div class="clear"></div>
			</div>
	 </div>				
   </div>
</div>

<?php include("include/footer.php"); ?>

</body>
</html>

