<?php

	@include("session_Checker.php");
	include("dbCofig/db_config.php");
	$Obj = new db_config();
 
 	if(isset($_POST["submit"]))
	{
		$feedback = $_POST["feedback"];
		$feedback_date = $_POST["feedback_date"];
		
		
		$Obj->nonExecute("INSERT INTO feedback(Feedback,FeedbackDate) VALUES('$feedback','$feedback_date')");
		
		header("location:feedback.php?msg=Insert Successfully");
	}
	if(isset($_POST["update"]))
	{
		$feedback = $_POST["feedback"];
		$feedback_date = $_POST["feedback_date"];
		$Id = $_POST["PriId"];
		
		
		$Obj->nonExecute("UPDATE feedback SET Feedback='$feedback',FeedbackDate='$feedback_date' WHERE FId='$Id'");
		
		header("location:feedback.php?msg=Update Successfully");
	}
	$Rows = $Obj->SelectData("feedback");

	if(isset($_GET["edId"]))
 	{
	 $Id =$_GET["edId"];
	 $ERows = $Obj->SelectData("feedback WHERE FId='$Id'");
	}

	if(isset($_GET["delId"]))
 	{
	 $Id =$_GET["delId"];
	 $del ="DELETE FROM feedback where FId = '$Id'";
	 $Obj->nonExecute($del);
	 header("location:feedback.php?msg=Deleted Successfully"); 
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
	var feedback = document.getElementById("feedback");
	if(feedback.value == "")
	{
		alert("please enter your feedback");
		feedback.focus();
		return false;
	}
	var feedback_date = document.getElementById("feedback_date");
	if(feedback_date.value == "")
	{
		alert("please enter your feedback date");
		feedback_date.focus();
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
              <h3> Feedback</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                <form action="" method="post">
                
                <?php echo isset($_GET["msg"])?$_GET["msg"]:"";  ?>
<table border="0px" cellpadding="10px" cellspacing="5px" align="center">

<tr>
<th>Feedback:</th>
<td><textarea name="feedback" id="feedback" cols="21" rows="4" placeholder="Enter feedback here"><?php echo isset($ERows)?$ERows[0]["Feedback"]:"";?></textarea></td>
</tr>

<tr>
<th>Feedback_date:</th>
<td><input type="date" name="feedback_date" id="feedback_date" placeholder="Enter feedback date here" value="<?php echo isset($ERows)?$ERows[0]["FeedbackDate"]:"";?>"></td>
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
              <h3>Feedback Details</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
<?php if($Rows!=0) {  ?>
<table class="table table-striped table-bordered" cellpadding="3px" cellspacing="3px" border="1px">
	<tr>
    <th class="td-actions">Action Bar</th>
	<th><center>FId</center></th>
    <th><center>CId</center></th>
	<th><center>Feedback</center></th>
    <th><center>FeedbackDate</center></th>
     </tr>

    </tr>
<?php foreach($Rows as $row) { ?>
    	<tr>
        <td class="td-actions"><a class="btn btn-small btn-success" href="?edId=<?php echo $row["FId"]; ?>"><i class="btn-icon-only icon-edit"> </i></a>  <a class="btn btn-small btn-danger" onClick="return confirmme();" href="?delId=<?php echo $row["FId"]; ?>"><i class="btn-icon-only icon-remove"> </i></a></td>
        	
        	<td class="td-actions"><?php echo $row["FId"]; ?></td>
            <td class="td-actions"><?php echo $row["CId"]; ?></td>
            <td class="td-actions"><?php echo $row["Feedback"]; ?></td>
            <td class="td-actions"><?php echo $row["FeedbackDate"]; ?></td>
            
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
