<?php
	
	@include("session_Checker.php");
	include("dbCofig/db_config.php");
	$Obj = new db_config();
 
 	if(isset($_POST["submit"]))
	{
		$adate = $_POST["adate"];
		$atime = $_POST["atime"];
		$description = $_POST["description"];
		
		
		$Obj->nonExecute("INSERT INTO appointment(ADate,ATime,Description) VALUES('$adate','$atime','$description')");
       
		
		header("location:appointment.php?msg=Insert Successfully");
	}
	if(isset($_POST["update"]))
	{
		$adate = $_POST["adate"];
		$atime = $_POST["atime"];
		$description = $_POST["description"];
		$Id = $_POST["PriId"];
		
		
		$Obj->nonExecute("UPDATE appointment SET ADate='$adate',ATime='$atime',Description='$description' WHERE APId='$Id'"); 
       
		
		header("location:appointment.php?msg=Update Successfully");
	}
	$Rows = $Obj->SelectData("appointment");
	
	if(isset($_GET["edId"]))
 	{
	 $Id =$_GET["edId"];
	 $ERows = $Obj->SelectData("appointment WHERE APId='$Id'");
	}

	 if(isset($_GET["delId"]))
 	{
	 $Id =$_GET["delId"];
	 $del ="DELETE FROM appointment where APId = '$Id'";
	 $Obj->nonExecute($del);
	 header("location:appointment.php?msg=Deleted Successfully"); 
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
	var adate = document.getElementById("adate");
	if(adate.value == "")
	{
		alert("please enter date");
		adate.focus();
		return false;
	}
	var atime = document.getElementById("atime");
	if(atime.value == "")
	{
		alert("please enter time");
		atime.focus();
		return false;
	}
	var description= document.getElementById("description");
	if(description.value == "")
	{
		alert("please enter description");
		description.focus();
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
              <h3>Appointment</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                 <form action="" method="post">
                 <?php echo isset($_GET["msg"])?$_GET["msg"]:"";  ?>
<table border="0px" cellpadding="10px" cellspacing="5px" align="center">

<tr>
<th>ADate:</th>
<td><input type="date" name="adate" id="adate" value="<?php echo isset($ERows)?$ERows[0]["ADate"]:"";?>"></td>
</tr>

<tr>
<th>ATime:</th>
<td><input type="time" name="atime" id="atime" value="<?php echo isset($ERows)?$ERows[0]["ATime"]:"";?>"></td>
</tr>

<tr>
<th>Description:</th>
<td><textarea name="description" id="description" cols="21" rows="4" placeholder="Enter description here"><?php echo isset($ERows)?$ERows[0]["Description"]:"";?></textarea></td>
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
              <h3>Appointment Details</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
<?php if($Rows!=0) {  ?>
<table class="table table-striped table-bordered" cellpadding="3px" cellspacing="3px" border="1px">
	<tr>
     <th class="td-actions">Action Bar</th>
	<th><center>APId</center></th>
    <th><center>BId</center></th>
    <th><center>CId</center></th>
    <th><center>ADate</center></th>
    <th><center>ATime</center></th>
    <th><center>Description</center></th>
    <th><center>IsApprove</center></th>
    <th><center>RequestDate</center></th>
    <th><center>ReplyDate</center></th>
 </tr>

    </tr>
<?php foreach($Rows as $row) { ?>
    	<tr>
        	<td class="td-actions"><a class="btn btn-small btn-success" href="?edId=<?php echo $row["APId"]; ?>"><i class="btn-icon-only icon-edit"> </i></a>  <a class="btn btn-small btn-danger" onClick="return confirmme();" href="?delId=<?php echo $row["APId"]; ?>"><i class="btn-icon-only icon-remove"> </i></a></td>
        	
        	<td class="td-actions"><?php echo $row["APId"]; ?></td>
            <td class="td-actions"><?php echo $row["BId"]; ?></td>
            <td class="td-actions"><?php echo $row["CId"]; ?></td>
            <td class="td-actions"><?php echo $row["ADate"]; ?></td>
            <td class="td-actions"><?php echo $row["ATime"]; ?></td>
            <td class="td-actions"><?php echo $row["Description"]; ?></td>
            <td class="td-actions"><?php echo $row["IsApprove"]; ?></td>
            <td class="td-actions"><?php echo $row["RequestDate"]; ?></td>
            <td class="td-actions"><?php echo $row["ReplyDate"]; ?></td>
            
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
