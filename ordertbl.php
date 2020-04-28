<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<?php include("include/headerscript.php"); 
	if(!isset($_SESSION["UId"])) { 
		echo $ObjCls->Redirect("login.php","Please, Login or Register for confirm you beauty product Order. thanks");
	} 
	else
	{
	 	     $addToCartData1 = $ObjCls->SELECTbyJOIN("SELECT * FROM add_to_cart WHERE Cust_id='1'");
			 $totalCost1 = "0.00";
			 $Qty = 0;
			 if($addToCartData1>0)
			 {
				 foreach($addToCartData1 as $addCart1)
				 {
					 $totalCost1 += $addCart1["Total_price"];
					 $Qty++;
				 }
			
				$allCode = "ABCDEFGIJKLMNPQRSTUVWXYZ1234567890#@";
			 
				 $oCode = substr(str_shuffle($allCode),0,6);
		
				$str = "insert into tblorder(CId,orderNo,Quantity,Totalprice) values('".$_SESSION["UId"]."','$oCode','$Qty','$totalCost1')";
				$OId = $ObjCls->NonQuery($str);
		
				$addToCartData2 = $ObjCls->SELECTbyJOIN("SELECT * FROM add_to_cart WHERE Cust_id='1'");
				if($addToCartData2>0)
				 {
					 foreach($addToCartData2 as $addCart2)
					 {
						 $str1 = "INSERT INTO orderitems(TblId,PId,quality,Price,Totalprice) VALUES('$OId','".$addCart2["Item_id"]."','".$addCart2["Quality"]."','".$addCart2["Price"]."','".$addCart2["Total_price"]."')";
						 $ObjCls->NonQuery($str1);
						 $del1 = "DELETE FROM add_to_cart WHERE Add_to_card_id='".$addCart2["Add_to_card_id"]."'";
						 $ObjCls->NonQuery($del1);
					 }
				 }
			}
	}
	?>
</head>
<body>
<?php include("include/header.php"); ?>
<?php include("include/slider.php"); ?>
</div>
	<div class="main">
		<div class="wrap">
			<div class="content">
                        <h3>PRODUCT ORDER DETAIL</h3><br />
                        <hr />
                        <div><br />
						Thanks for Order Beauty Product(s).<br /><br />
                        Your Order No is <b style="font-size:18px; color:#FC375E"><?php echo isset($oCode)?$oCode:"xxxxx"; ?></b>. <br /><br />Please, put it on safe place for to know order status. We will dispatch your order within 48 Hours Business Day(s).
                        </div>
	        </div>
    	    <!-- End Main -->
        </div>
	</div>
	<!-- Footer -->
<?php include("include/footer.php"); ?>
	<!-- End Footer -->
</body>
</html>