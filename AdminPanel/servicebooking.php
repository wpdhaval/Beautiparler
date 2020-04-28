<?php
	@include("session_Checker.php");
	include("dbCofig/db_config.php");
	$Obj = new db_config();

 
 	if(isset($_POST["submit"]))
	{
		$sdate = $_POST["sdate"];
		$stime = $_POST["stime"];
		$reply = $_POST["reply"];
		
		
		$Obj->nonExecute("INSERT INTO servicebooking(SDate,STime,Reply) VALUES('$sdate','$stime','$reply')");
        
		
		header("location:servicebooking.php?msg=Insert Successfully");
	}
	if(isset($_POST["update"]))
	{
		$sdate = $_POST["sdate"];
		$stime = $_POST["stime"];
		$reply = $_POST["reply"];
		$Id = $_POST["PriId"];
		
		
		$Obj->nonExecute("UPDATE servicebooking SET SDate='$sdate',STime='$stime',Reply='$reply' WHERE SBId='$Id'");
        
		
		header("location:servicebooking.php?msg=Update Successfully");
	}
	$Rows = $Obj->SelectData("servicebooking");
	
	if(isset($_GET["edId"]))
 	{
	 $Id =$_GET["edId"];
	 $ERows = $Obj->SelectData("servicebooking WHERE SBId='$Id'");
	}

 if(isset($_GET["delId"]))
 	{
	 $Id =$_GET["delId"];
	 $del ="DELETE FROM servicebooking where SBId = '$Id'";
	 $Obj->nonExecute($del);
	 header("location:servicebooking.php?msg=Deleted Successfully"); 
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
	var sdate = document.getElementById("sdate");
	if(sdate.value == "")
	{
		alert("please enter date");
		sdate.focus();
		return false;
	}
	var stime = document.getElementById("stime");
	if(stime.value == "")
	{
		alert("please enter time");
		stime.focus();
		return false;
	}
	var reply= document.getElementById("reply");
	if(reply.value == "")
	{
		alert("please enter your reply");
		reply.focus();
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
              <h3>Service Booking</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                <form action="" method="post">
<?php echo isset($_GET["msg"])?$_GET["msg"]:"";  ?>
<table border="0px" cellpadding="10px" cellspacing="5px" align="center">

<tr>
<th>SDate:</th>
<td><input type="date" name="sdate" id="sdate" value="<?php echo isset($ERows)?$ERows[0]["SDate"]:"";?>"></td>
</tr>

<tr>
<th>STime:</th>
<td><input type="time" name="stime" id="stime"  value="<?php echo isset($ERows)?$ERows[0]["STime"]:"";?>"></td>
</tr>

<tr>
<th>Reply:</th>
<td><textarea name="reply" id="reply" cols="21" rows="4" placeholder="Enter reply here"><?php echo isset($ERows)?$ERows[0]["Reply"]:"";?></textarea></td>
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
              <h3>Service Booking Details</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">

<?php if($Rows!=0) {  ?>
<table class="table table-striped table-bordered" cellpadding="3px" cellspacing="3px" border="1px">
	<tr>
    <th class="td-actions">Action Bar</th>	
    <th><center>SBId</center></th>
    <th><center>CId</center></th>
    <th><center>SId</center></th>
    <th><center>SDate</center></th>
    <th><center>Stime</center></th>
	<th><center>RequestDate</center></th>
    <th><center>IsApprove</center></th>
    <th><center>Reply</center></th>
    <th><center>ReplyDate</center></th>
     </tr>

    </tr>
<?php foreach($Rows as $row) { ?>
    	<tr>
        <td class="td-actions"><a class="btn btn-small btn-success" href="?edId=<?php echo $row["SBId"]; ?>"><i class="btn-icon-only icon-edit"> </i></a>  <a class="btn btn-small btn-danger" onClick="return confirmme();" href="?delId=<?php echo $row["SBId"]; ?>"><i class="btn-icon-only icon-remove"> </i></a></td>
        	
        	<td class="td-actions"><?php echo $row["SBId"]; ?></td>
            <td class="td-actions"><?php echo $row["CId"]; ?></td>
            <td class="td-actions"><?php echo $row["SId"]; ?></td>
            <td class="td-actions"><?php echo $row["SDate"]; ?></td>
            <td class="td-actions"><?php echo $row["STime"]; ?></td>
            <td class="td-actions"><?php echo $row["RequestDate"]; ?></td>
            <td class="td-actions"><?php echo $row["IsApprove"]; ?></td>
            <td class="td-actions"><?php echo $row["Reply"]; ?></td>
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
