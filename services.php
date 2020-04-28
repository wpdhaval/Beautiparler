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
			<h2>OUR SERVICES</h2>
            <HR>
			<div class="boxes">
				<?php
					$i=1;
					  $Rows = $Obj->SelectData("services ORDER BY SId DESC");
				?>  
                <?php if($Rows!=0) { foreach($Rows as $proName) { ?>
                <div class="box1" <?php if($i%4!=0) { ?>style="margin-right:20px;" <?php } ?>>
		    	<div class="box_desc">
		    		<img src="product/<?php echo $proName["PhotoImage"]; ?>"  style="width:250px; height:157px;" alt="<?php echo $proName["Name"]; ?>">
		    		<h2><?php echo $proName["Name"]; ?></h2>
			    		<div class="service_desc">
			    			<p><?php echo $proName["Description"]; ?></p>
			    		</div>	
                        <p>Price : Rs. <?php echo $proName["Price"]; ?></p>
				 			  <div class="more">
				         	  	<span><a href="booservices.php?booknow=<?php echo base64_encode($proName["SId"]); ?>&d=<?php echo base64_encode($proName["Price"]); ?>&Services=<?php echo base64_encode($proName["Name"]); ?>">Book now</a></span>
				         	  </div>			    	
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

