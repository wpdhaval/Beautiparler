<?php
	@include("session_Checker.php");
	include("dbCofig/db_config.php");
	$Obj = new db_config();
 
 	if(isset($_POST["submit"]))
	{
		$orderno = $_POST["orderno"];
		$quantity = $_POST["quantity"];
		$totalprice = $_POST["totalprice"];
		$orderdate = $_POST["orderdate"];
		$status = $_POST["status"];
		
		
		$Obj->nonExecute("INSERT INTO tblorder(OrderNo,Quantity,TotalPrice,OrderDate,Status) VALUES('$orderno','$quantity',
		'$totalprice','$orderdate','$status')");
        
		
		header("location:tblorder.php?msg=Insert Successfully");
	}
		if(isset($_POST["update"]))
	{
		$orderno = $_POST["orderno"];
		$quantity = $_POST["quantity"];
		$totalprice = $_POST["totalprice"];
		$orderdate = $_POST["orderdate"];
		$status = $_POST["status"];
		$Id = $_POST["PriId"];
		
		
		
		$Obj->nonExecute("UPDATE tblorder SET OrderNo='$orderno',Quantity='$quantity',TotalPrice='$totalprice',OrderDate='$orderdate',Status='$status' WHERE TBLId='$Id'");         
		
		header("location:tblorder.php?msg=Update Successfully");
	}
	$Rows = $Obj->SelectData("tblorder");
	
	if(isset($_GET["edId"]))
 	{
	 $Id =$_GET["edId"];
	 $ERows = $Obj->SelectData("tblorder WHERE TblId='$Id'");
	}


	 if(isset($_GET["delId"]))
 	{
	 $Id =$_GET["delId"];
	 $del ="DELETE FROM tblorder where TblId = '$Id'";
	 $Obj->nonExecute($del);
	 header("location:tblorder.php?msg=Deleted Successfully"); 
 	}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php include("include/headerscript.php"); ?>
</head>
<script language="javascript" type="text/javascript">
function confirmme()
{
	if(confirm("Are you sure want to delete it???"))
	{
		return true;
	}
	return false;
	
}

function validate()
{
	var orderno = document.getElementById("orderno");
	if(orderno.value == "")
	{
		alert("please enter order number");
		orderno.focus();
		return false;
	}
	var quantity = document.getElementById("quantity");
	if(quantity.value == "")
	{
		alert("please enter quantity");
		quantity.focus();
		return false;
	}
	var totalprice = document.getElementById("totalprice");
	if(totalprice.value == "")
	{
		alert("please enter total price");
		totalprice.focus();
		return false;
	}
	var orderdate = document.getElementById("orderdate");
	if(orderdate.value == "")
	{
		alert("please enter date");
		orderdate.focus();
		return false;
	}
	var status = document.getElementById("status");
	if(status.value == "")
	{
		alert("please enter your status");
		status.focus();
		return false;	
	}


}
</script>
<body>



<?php include("include/header.php"); ?>
<!-- /navbar -->

<?php include("include/navigate.php"); ?>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <div class="span6">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Table Order</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                <form action="" method="post">
<?php echo isset($_GET["msg"])?$_GET["msg"]:"";  ?>
<table border="0px" cellpadding="10px" cellspacing="5px" align="center">

<tr>
<th>OrderNo:</th>
<td><input type="number" name="orderno" id="orderno" placeholder="Enter order no here" value="<?php echo isset($ERows)?$ERows[0]["OrderNo"]:"";?>"></td>
</tr>

<tr>
<th>Quantity:</th>
<td><input type="number" name="quantity" id="quantity" placeholder="Enter quantity here" value="<?php echo isset($ERows)?$ERows[0]["Quantity"]:"";?>"></td>
</tr>


<tr>
<th>TotalPrice:</th>
<td><input type="number" name="totalprice" id="totalprice" placeholder="Enter total price here" value="<?php echo isset($ERows)?$ERows[0]["TotalPrice"]:"";?>"></td>
</tr>



<tr>
<th>Orderdate:</th>
<td><input type="date" name="orderdate" id="orderdate" value="<?php echo isset($ERows)?$ERows[0]["OrderDate"]:"";?>"></td>
</tr>

<tr>
<th>Status:</th>
<td><textarea name="status" id="status" cols="21" rows="4" placeholder="Enter status here"><?php echo isset($ERows)?$ERows[0]["Status"]:"";?></textarea></td>
</tr>


<tr>
<td></td>
<td>
<?php if(isset($ERows)) { ?>
<input type="hidden" name="PriId" value="<?php echo $Id; ?>" />
<input type="submit" name="update" id="update" value="Update" onclick="return validate()">
<input type="reset" name="reset" id="reset" value="reset">
<?php } else { ?>
<input type="submit" name="submit" id="submit" value="submit" onclick="return validate()">
<input type="reset" name="reset" id="reset" value="reset"></td>
<?php } ?>
</tr>


</table>
</form>

</div>
</div>
</div>
</div>
</div>
</div>


		<div class="row">     
 		<div class="span12">
 		<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Order Details</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
<?php if($Rows!=0) {  ?>
<table class="table table-striped table-bordered" cellpadding="3px" cellspacing="3px" border="1px">
	<tr>
    <th class="td-actions">Action Bar</th>
	<th><center>TblId</center></th>
	<th><center>CId</center></th>
    <th><center>OrderNo</center></th>
    <th><center>Quantity</center></th>
    <th><center>TotalPrice</center></th>
    <th><center>OrderDate</center></th>
    <th><center>IsApproved</center></th>
    <th><center>Status</center></th>
 </tr>

    </tr>
<?php foreach($Rows as $row) { ?>
    	<tr>
        	<td class="td-actions"><a class="btn btn-small btn-success" href="?edId=<?php echo $row["TblId"]; ?>"><i class="btn-icon-only icon-edit"> </i></a>  <a class="btn btn-small btn-danger" onClick="return confirmme();" href="?delId=<?php echo $row["TblId"]; ?>"><i class="btn-icon-only icon-remove"> </i></a></td>
        	
        	<td class="td-actions"><?php echo $row["TblId"]; ?></td>
        	<td class="td-actions"><?php echo $row["CId"]; ?></td>
            <td class="td-actions"><?php echo $row["OrderNo"]; ?></td>
            <td class="td-actions"><?php echo $row["Quantity"]; ?></td>
            <td class="td-actions"><?php echo $row["TotalPrice"]; ?></td>
            <td class="td-actions"><?php echo $row["OrderDate"]; ?></td>
            <td class="td-actions"><?php echo $row["IsApproved"]; ?></td>
            <td class="td-actions"><?php echo $row["Status"]; ?></td>

            
        </tr>
    <?php } ?>
</table>
<?php } else { ?>
	There is not any data..
<?php } ?>



</div>
</div>
</div>
</div>
</div>
</div>

        
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<?php include("include/footer.php"); ?>
<!-- Le javascript
================================================== --> 
<?php include("include/footerscript.php"); ?>
</body>
</html>
