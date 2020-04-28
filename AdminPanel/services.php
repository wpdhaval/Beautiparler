<?php


	@include("session_Checker.php");
    include("dbCofig/db_config.php");
	$Obj = new db_config();
	
	if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];
		$description = $_POST["description"];
		$price = $_POST["price"];
		$duration = $_POST["duration"];
		
		$FileDetail = $_FILES["upload"];
		$fileName = $FileDetail["name"];
		$PhotoImage = date("dmYhms").".jpg";
		
		if($fileName != "")
		{
				$tmpName = $FileDetail["tmp_name"];
				move_uploaded_file($tmpName,"../product/".$PhotoImage);
		}
		
		$Obj->nonExecute("INSERT INTO services(Name,Description,PhotoImage,Price,Duration) VALUES('$name','$description','$PhotoImage','$price','$duration')");
        
		
		header("location:services.php?msg=Insert Successfully");
	}
	if(isset($_POST["update"]))
	{
		$name = $_POST["name"];
		$description = $_POST["description"];
		$photoimage = $_POST["photoimage"];
		$price = $_POST["price"];
		$duration = $_POST["duration"];
		$Id = $_POST["PriId"];
		
		
		$Obj->nonExecute("UPDATE services SET Name='$name',Description='$description',PhotoImage='$photoimage',Price='$price',Duration='$duration' WHERE SId='$Id'");
        
		
		header("location:services.php?msg=Update Successfully");
	}
	$Rows = $Obj->SelectData("services");
	
	if(isset($_GET["edId"]))
 	{
	 $Id =$_GET["edId"];
	 $ERows = $Obj->SelectData("services WHERE SId='$Id'");
	}

	 if(isset($_GET["delId"]))
 	{
	 $Id =$_GET["delId"];
	 $del ="DELETE FROM services where SId = '$Id'";
	 $Obj->nonExecute($del);
	 header("location:services.php?msg=Deleted Successfully"); 
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
	var name = document.getElementById("name");
	if(name.value == "")
	{
		alert("please enter your name");
		name.focus();
		return false;
	}
	var description = document.getElementById("description");
	if(description.value == "")
	{
		alert("please enter description");
		description.focus();
		return false;
	}
	var photoimage = document.getElementById("photoimage");
	if(photoimage.value == "")
	{
		alert("please select image");
		photoimage.focus();
		return false;
	}
	var price = document.getElementById("price");
	if(price.value == "")
	{
		alert("please enter price");
		price.focus();
		return false;
	}

	var duration = document.getElementById("duration");
	if(duration.value == "")
	{
		alert("please enter duration");
		duration.focus();
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
              <h3>Services Information</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                <form action="" method="post" enctype="multipart/form-data">
<?php echo isset($_GET["msg"])?$_GET["msg"]:"";  ?>
<table border="0px" cellpadding="10px" cellspacing="5px" align="center">
<br/>
<tr>
<th>Name:</th>
<td><input type="text" name="name" id="name" placeholder="Enter name here" value="<?php echo isset($ERows)?$ERows[0]["Name"]:"";?>"></td>
</tr>

<tr>
<th>Description:</th>
<td><textarea name="description" id="description" cols="21" rows="4" placeholder="Enter description here"><?php echo isset($ERows)?$ERows[0]["Description"]:"";?></textarea></td>
</tr>

<tr>
<th>PhotoImage:</th>
<td><input type="file" name="upload" id="upload" value="<?php echo isset($ERows)?$ERows[0]["PhotoImage"]:"";?>">
<?php 
	if(isset($ERows)) { ?>
    <img src="../product/<?php echo $ERows[0]["PhotoImage"]; ?>" width="50px" height="50px" alt="No Image" />
    <input type="hidden" name="HidImg" value="<?php echo $ERows[0]["PhotoImage"]; ?>" />
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
<th>Duration:</th>
<td><input type="text" name="duration" id="duration" placeholder="Enter duration here" value="<?php echo isset($ERows)?$ERows[0]["Duration"]:"";?>"></td>
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
              <h3>Services Detail</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">


<?php if($Rows!=0) {  ?>
<table class="table table-striped table-bordered" cellpadding="3px" cellspacing="3px" border="1px">
	<tr>
    <th class="td-actions">Action Bar</th>
	<th><center>SId</center></th>
    <th><center>BId</center></th>
	<th><center>Name</center></th>
    <th><center>Description</center></th>
    <th><center>PhotoImage</center></th>
    <th><center>Price</center></th>
    <th><center>Duration</center></th>
   
 </tr>

    </tr>
<?php foreach($Rows as $row) { ?>
    	<tr>
        	<td class="td-actions"><a class="btn btn-small btn-success" href="?edId=<?php echo $row["SId"]; ?>"><i class="btn-icon-only icon-edit"> </i></a>  <a class="btn btn-small btn-danger" onClick="return confirmme();" href="?delId=<?php echo $row["SId"]; ?>"><i class="btn-icon-only icon-remove"> </i></a></td>
          	<td class="td-actions"><?php echo $row["SId"]; ?></td>
            <td class="td-actions"><?php echo $row["BId"]; ?></td>
            <td class="td-actions"><?php echo $row["Name"]; ?></td>
            <td class="td-actions"><?php echo $row["Description"]; ?></td>
            <td align="center"><img src="../product/<?php echo $row["PhotoImage"]; ?>" width="50px" height="50px" alt="No Image" />
            </td>
            <td class="td-actions"><?php echo $row["Price"]; ?></td>
            <td class="td-actions"><?php echo $row["Duration"]; ?></td>
            
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
