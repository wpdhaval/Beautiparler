<?php
    @include("session_Checker.php");
	include("dbCofig/db_config.php");
	$Obj = new db_config();
 
 	if(isset($_POST["submit"]))
	{
		$pname = $_POST["pname"];
		$description = $_POST["description"];
		$price = $_POST["price"];
		$quantity = $_POST["quantity"];
		$uploaddate = $_POST["uploaddate"];
				
		$FileDetail = $_FILES["upload"];
		$fileName = $FileDetail["name"];
		$ImageUrl = date("dmYhms").".jpg";
		
		if($fileName != "")
		{
				$tmpName = $FileDetail["tmp_name"];
				move_uploaded_file($tmpName,"../product/".$ImageUrl);
		}

		
		
		$Obj->nonExecute("INSERT INTO products(PName,Description,ImageUrl,Price,Quantity,UploadDate) VALUES('$pname','$description','$ImageUrl','$price','$quantity','$uploaddate')");
        		
		header("location:products.php?msg=Insert Successfully");
	}
	if(isset($_POST["update"]))
	{
		$pname = $_POST["pname"];
		$imageurl = $_POST["imageurl"];
		$description = $_POST["description"];
		$price = $_POST["price"];
		$quantity = $_POST["quantity"];
		$uploaddate = $_POST["uploaddate"];
		$Id = $_POST["PriId"];
		
		
		$Obj->nonExecute("UPDATE products SET PName='$pname',ImageUrl='$imageurl',Description='$description',Price='$price',Quantity='$quantity',UploadDate='$uploaddate' WHERE PId='$Id'");
        		
		header("location:products.php?msg=Update Successfully");
	}
	$Rows = $Obj->SelectData("products");
	
	if(isset($_GET["edId"]))
 	{
	 $Id =$_GET["edId"];
	 $ERows = $Obj->SelectData("products WHERE PId='$Id'");
	}


	 if(isset($_GET["delId"]))
 	{
	 $Id =$_GET["delId"];
	 $del ="DELETE FROM products where PId = '$Id'";
	 $Obj->nonExecute($del);
	 header("location:products.php?msg=Deleted Successfully"); 
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
	var pname = document.getElementById("pname");
	if(pname.value == "")
	{
		alert("please enter product name");
		pname.focus();
		return false;
	}
	var imageurl = document.getElementById("imageurl");
	if(imageurl.value == "")
	{
		alert("please select image");
		imageurl.focus();
		return false;
	}
	var description = document.getElementById("description");
	if(description.value == "")
	{
		alert("please enter description");
		description.focus();
		return false;
	}

	var price = document.getElementById("price");
	if(price.value == "")
	{
		alert("please enter price");
		price.focus();
		return false;
	}
	var quantity = document.getElementById("quantity");
	if(quantity.value == "")
	{
		alert("please enter quantity");
		quantity.focus();
		return false;
	}
	var uploaddate = document.getElementById("uploaddate");
	if(uploaddate.value == "")
	{
		alert("please enter uploaddate");
		uploaddate.focus();
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
              <h3>Products</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                <form action="" method="post" enctype="multipart/form-data">
<?php echo isset($_GET["msg"])?$_GET["msg"]:"";  ?>
<table border="0px" cellpadding="10px" cellspacing="5px" align="center">

<tr>
<th>Product Name:</th>
<td><input type="text" name="pname" id="pname" placeholder="Enter product name here" value="<?php echo isset($ERows)?$ERows[0]["PName"]:"";?>"></td>
</tr>



<tr>
<th>Description:</th>
<td><textarea name="description" id="description" cols="21" rows="4" placeholder="Enter description here"><?php echo isset($ERows)?$ERows[0]["Description"]:"";?></textarea></td>
</tr>

<tr>
<th>Product Image:</th>
  <td><input type="file" name="upload" id="upload" />
	<?php 
	if(isset($ERows)) { ?>
    <img src="../product/<?php echo $ERows[0]["ImageUrl"]; ?>" width="50px" height="50px" alt="No Image" />
    <input type="hidden" name="HidImg" value="<?php echo $ERows[0]["ImageUrl"]; ?>" />
     <?php 
	}	
?>
</td>
</tr>

<tr>
<th>Price:</th>
<td><input type="number" name="price" id="price" placeholder="Enter price here" value="<?php echo isset($ERows)?$ERows[0]["Price"]:"";?>"></td>
</tr>

<tr>
<th>Quantity:</th>
<td><input type="number" name="quantity" id="quantity" placeholder="Enter Quantity here" value="<?php echo isset($ERows)?$ERows[0]["Quantity"]:"";?>"></td>
</tr>

<tr>
<th>Uploaddate:</th>
<td><input type="date" name="uploaddate" id="uploaddate" value="<?php echo isset($ERows)?$ERows[0]["UploadDate"]:"";?>"></td>
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
              <h3>Products Details</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">

	<?php if($Rows!=0) {  ?>
<table class="table table-striped table-bordered" cellpadding="3px" cellspacing="3px" border="1px">
	<tr>
   <th class="td-actions">Action Bar</th>
	<th><center>PId</center></th>
    <th><center>BId</center></th>
	<th><center>PName</center></th>   
    <th><center>Description</center></th>
     <th><center>Image</center></th>
    <th><center>Price</center></th>
    <th><center>Quantity</center></th>
    <th><center>UploadDate</center></th>
    
 </tr>

    </tr>
<?php foreach($Rows as $row) { ?>
    	<tr>
        	<td class="td-actions"><a class="btn btn-small btn-success" href="?edId=<?php echo $row["PId"]; ?>"><i class="btn-icon-only icon-edit"> </i></a>  <a class="btn btn-small btn-danger" onClick="return confirmme();" href="?delId=<?php echo $row["PId"]; ?>"><i class="btn-icon-only icon-remove"> </i></a></td>
        	
        	<td class="td-actions"><?php echo $row["PId"]; ?></td>
            <td class="td-actions"><?php echo $row["BId"]; ?></td>
            <td class="td-actions"><?php echo $row["PName"]; ?></td>
             <td class="td-actions"><?php echo $row["Description"]; ?></td>
            <td align="center"><img src="../product/<?php echo $row["ImageUrl"]; ?>" width="50px" height="50px" alt="No Image" />
            </td>           
            <td class="td-actions"><?php echo $row["Price"]; ?></td>
            <td class="td-actions"><?php echo $row["Quantity"]; ?></td>
            <td class="td-actions"><?php echo $row["UploadDate"]; ?></td>
            
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
