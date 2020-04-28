<?php
	
	@include("session_Checker.php");
	
 	include("dbCofig/db_config.php");
	$Obj = new db_config();
 
 	if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];
		$address = $_POST["address"];
		$contact = $_POST["contact"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		
		$Obj->nonExecute("INSERT INTO admin(Name,Address,Contact,Emailid,Password) VALUES('$name','$address','$contact','$email','$password')");
		
		header("location:admin.php?msg=Insert Successfully");
	}
	
	if(isset($_POST["update"]))
	{
		$name = $_POST["name"];
		$address = $_POST["address"];
		$contact = $_POST["contact"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$Id = $_POST["PriId"];
		
		$Obj->nonExecute("UPDATE admin SET Name='$name', Address='$address', Contact='$contact', Emailid='$email', Password='$password' WHERE AId='$Id'");
		
		header("location:admin.php?msg=Update Successfully");
	}
	
	
	$Rows = $Obj->SelectData("admin");
	//print_r($Rows);
	
	if(isset($_GET["edId"]))
 	{
	 $Id =$_GET["edId"];
	 $ERows = $Obj->SelectData("admin WHERE AId='$Id'");
	}
	
	 if(isset($_GET["delId"]))
 	{
	 $Id =$_GET["delId"];
	 $del ="DELETE FROM admin where AId = '$Id'";
	 $Obj->nonExecute($del);
	 header("location:admin.php?msg=Deleted Successfully"); 
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
	var address = document.getElementById("address");
	if(address.value == "")
	{
		alert("please enter your address");
		address.focus();
		return false;
	}
	var contact = document.getElementById("contact");
	if(contact.value == "")
	{
		alert("please enter your contact");
		contact.focus();
		return false;
	}
	var email = document.getElementById("email");
	if(email.value == "")
	{
		alert("please enter your email id")
		email.focus();
		return false;
	}
	var password = document.getElementById("password");
	if(password.value == "")
	{
		alert("please enter your password");
		password.focus();
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
              <h3> Admin Information</h3>
            </div>
            <!-- /widget-header -->
             <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
            <form action="" method="post">             

			<?php echo isset($_GET["msg"])?$_GET["msg"]:"";  ?>

<table border="0px" cellpadding="10px" cellspacing="5px" align="center">

<tr>
<th>Name:</th>
<td><input type="text" name="name" id="name" placeholder="Enter name here" value="<?php echo isset($ERows)?$ERows[0]["Name"]:"";?>"></td>
</tr>


<tr>
<th>Address:</th>
<td><textarea name="address" id="address" cols="21" rows="4" placeholder="Enter address here"><?php echo isset($ERows)?$ERows[0]["Address"]:"";?></textarea></td>
</tr>

<tr>
<th>Contact:</th>
<td><input type="number" name="contact" id="contact" placeholder="Enter Contact here" value="<?php echo isset($ERows)?$ERows[0]["Contact"]:"";?>"></td>
</tr>

<tr>
<th>Email id:</th>
<td><input type="email" name="email" id="email" placeholder="Enter Email id here" value="<?php echo isset($ERows)?$ERows[0]["Emailid"]:"";?>"></td>
</tr>

<tr>
<th>Password:</th>
<td><input type="password" name="password" id="password" placeholder="Enter Password here" value="<?php echo isset($ERows)?$ERows[0]["Password"]:"";?>"></td>
</tr>

<tr>
<td></td>
<td>
<?php if(isset($ERows)) { ?>
<input type="hidden" name="PriId" value="<?php echo $Id; ?>" />
<input type="submit" name="update" id="update" value="Update" onclick="return validate()">
<input type="reset" name="reset" id="reset" value="reset">
<?php } else { ?>
<input  type="submit" name="submit" id="submit" value="submit" onclick="return validate()">
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
              <h3>Admin Details</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">

<?php if($Rows!=0) {  ?>
<table class="table table-striped table-bordered" cellpadding="1px" cellspacing="1px" border="1px">
<tr>
	<th class="td-actions">Action Bar</th>
	<th><center>AId</center></th>
	<th><center>Name</center></th>
    <th><center>Address</center></th>
    <th><center>Contact</center></th>
    <th><center>Emailid</center></th>
    <th><center>Password</center></th>
    <th><center>RegisterDate</center></th>
 </tr>

<?php foreach($Rows as $row) { ?>
    	<tr>
        	<td class="td-actions"><a class="btn btn-small btn-success" href="?edId=<?php echo $row["AId"]; ?>"><i class="btn-icon-only icon-edit"> </i></a>  <a class="btn btn-small btn-danger" onClick="return confirmme();" href="?delId=<?php echo $row["AId"]; ?>"><i class="btn-icon-only icon-remove"> </i></a></td>
        	<td class="td-actions"><?php echo $row["AId"]; ?></td>
            <td class="td-actions"><?php echo $row["Name"]; ?></td>
            <td class="td-actions"><?php echo $row["Address"]; ?></td>
            <td class="td-actions"><?php echo $row["Contact"]; ?></td>
            <td class="td-actions"><?php echo $row["Emailid"]; ?></td>
            <td class="td-actions"><?php echo $row["Password"]; ?></td>
            <td class="td-actions"><?php echo $row["RegisterDate"]; ?></td>
            
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
