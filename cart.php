<?php

include("dbCofig/db_config.php");
$Obj = new db_config();

?>
<!DOCTYPE HTML>
<head>
<?php include("include/headerscript.php");
	if(isset($_GET["delId"]))
	{
		$ObjCls->DELETE("add_to_cart",array("Add_to_card_id"=>$_GET["delId"]));
		echo $ObjCls->Redirect("cart.php","Book Removed successfully");
	}
	$CartData = $ObjCls->SELECTbyJOIN("SELECT A.Add_to_card_id,A.Quality,A.Total_price,B.* FROM add_to_cart as A INNER JOIN products as B ON A.Item_id=B.PId WHERE Cust_id='1'");
?>
<style type="text/css">
		.TableCart th,.TableCart td{ padding:5px; vertical-align:middle; }
		.TableCart { border-left:1px solid #666; border-right:1px solid #666; }
		.TableCart th { background:#FC375E; padding:20px; border-bottom:1px solid #666; text-align:left; }
		.TableCart td{ border-bottom:1px solid #666; }
	</style>
</head>
<body>

<?php include("include/header.php"); ?>

<?php include("include/menu.php"); ?>

<?php include("include/slider.php"); ?>
</div>
	<div class="main">
		<div class="wrap">
			<div class="content">
				<?php if($CartData!=0) {  $totalPrice = "0.00"; ?>
            	<table cellpadding="0" class="TableCart" cellspacing="0" width="100%">
                	<tr>
                    	<th>Product Image</th>
                        <th>Product Name</th>
                     
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th style="border-right:1px solid #000;">Remove</th>
                    </tr>
                    <?php foreach($CartData as $Cart) { ?>
                    <tr>
                    	<td style="text-align:center;"><img src="product/<?php echo $Cart["ImageUrl"]; ?>" style="width:80px; height:65px" /></td>
                        <td><?php echo $Cart["PName"]; ?></td>
                        <td>Rs. <?php printf("%.2f",$Cart["Price"]); ?></td>
                        <td><?php echo $Cart["Quality"]; ?></td>
                        <td>Rs. <?php printf("%.2f",$Cart["Total_price"]); ?></td>
                        <td style="border-right:1px solid #000;">
						<a onclick="return Confirm()" style="background:-webkit-linear-gradient(top, #e33d3d 0%,#bc0100 100%); border:none; padding:10px 20px; color:#FFF; font-weight:bold;" href="?delId=<?php echo $Cart["Add_to_card_id"]; ?>">Remove</a></td>
                    </tr>                    	
                    <?php $totalPrice+=$Cart["Total_price"];} ?>
                    <tr>
                    	<th colspan="3">
                        </th>
                        <th>Total Price</th>
                        <th>Rs. <?php printf("%.2f",$totalPrice); ?></th>
                        <th style="border-right:1px solid #000;"></th>
                    </tr>
                    <tr>
                    	<td colspan="8" style="text-align:right;">
                            	<input type="button" name="submit" style="background:-webkit-linear-gradient(top, #e33d3d 0%,#bc0100 100%); border:none; padding:10px 20px; color:#FFF; font-weight:bold;" id="submit" value="CHECK OUT =>" onclick="document.location.href='ordertbl.php';" />
                        </td>
                    </tr>
                </table>
            <?php } else { ?>
            	<div style="padding:10px; color:#F00">
                	OOPs! There is no Item(s) in Cart.
                </div>
                 <input type="button" name="submit" style="background:-webkit-linear-gradient(top, #e33d3d 0%,#bc0100 100%); border:none; padding:10px 20px; font-weight:bold;  color:#FFF;" id="submit" value="Buy Products" onclick="document.location.href='products.php';" />
            <?php } ?>	
            </div>
		</div>		
   </div>
  
<?php include("include/footer.php"); ?>
  <script language="javascript" type="text/javascript">
		function Confirm()
		{
			if(confirm("Are you sure to Remove Item(s) ?"))
			{
				return true;
			}
			return false;
		}
	</script>
</body>
</html>

