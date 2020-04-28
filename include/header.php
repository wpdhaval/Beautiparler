<?php
			 $addToCartData = $ObjCls->SELECTbyJOIN("SELECT * FROM add_to_cart WHERE Cust_id='1'");
			 $totalCost = "0.00";
			 $counter = 0;
			 if($addToCartData>0)
			 {
				 foreach($addToCartData as $addCart)
				 {
					 $totalCost += $addCart["Total_price"];
					 $counter++;
				 }
			 }
?>
<div class="header">
<div class="header_wrapper">
<div style="background:#FC375E; color:#FFF; padding:10px;">
   <div class="wrap"><div style="float:left;">Welcome <?php echo isset($_SESSION["UName"])?$_SESSION["UName"]." | <a style='font-weight:bold; color:#FFF;' href='logout.php'>LOGOUT</a>":"Guest"; ?></div>
   		<div style="float:right;"><a href="myaccount.php" style="color:#FFF; font-weight:bold;">My Account</a> | Item(s) <a style="color:#FFF; font-weight:bold;" href="cart.php">CART [ <?php echo $counter; ?> ] Total Rs. <?php printf("%.2f",$totalCost); ?></a></div>
        <div style="clear:both"></div>
   </div>
 </div>
	<div class="wrap">
<div class="header_top">
<div class="logo">
<a href="index.php"><img src="images/logo.png" alt="" /></a>
</div>
<div class="menu">
	<ul>
		<li><a href="index.php">HOME</a></li>
    	<li><a href="about.php">ABOUT</a></li>
    	<li><a href="products.php">PRODUCTS</a></li>
    	<li><a href="services.php">SERVICES</a></li>
        <?php if(isset($_SESSION["UName"])) { ?>
        	<li><a href="logout.php">LOGOUT</a></li>
        <?php } else { ?>
        	<li><a href="login.php">LOGIN</a></li>
        <?php } ?>
    	<li><a href="contact.php">CONTACTS</a></li>
    	<div class="clear"></div>
    </ul>
    
 </div>
<div class="clear"></div>
</div>
</div>
</div>