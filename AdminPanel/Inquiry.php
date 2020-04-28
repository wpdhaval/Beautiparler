<?php
	@include("session_Checker.php");
	include("dbCofig/db_config.php");
	$Obj = new db_config();
 
 	if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$pro_name = $_POST["pro_name"];
		$contact = $_POST["contact"];
		$email = $_POST["email"];
		$date = $_POST["date"];
		$inq_msg = $_POST["inq_msg"];
		
		
		$Obj->nonExecute("INSERT INTO inquiry(Name,Address,City,ProName,Contact,Email,InqMsg) VALUES('$name','$address','$city',
		'$pro_name','$contact','$email','$inq_msg')");
        
		
		header("location:inquiry.php?msg=Insert Successfully");
	}
	if(isset($_POST["update"]))
	{
		$name = $_POST["name"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$pro_name = $_POST["pro_name"];
		$contact = $_POST["contact"];
		$email = $_POST["email"];
		$date = $_POST["date"];
		$inq_msg = $_POST["inq_msg"];
		$Id = $_POST["PriId"];
		
		
		$Obj->nonExecute("UPDATE inquiry SET Name='$name',Address='$address',City='$city',ProName='$pro_name',Contact='$contact',Email='$email',InqMsg='$inq_msg' WHERE IId='$Id'");         
		
		header("location:inquiry.php?msg=Update Successfully");
	}
	$Rows = $Obj->SelectData("inquiry");
	
	if(isset($_GET["edId"]))
 	{
	 $Id =$_GET["edId"];
	 $ERows = $Obj->SelectData("inquiry WHERE IId='$Id'");
	}

 if(isset($_GET["delId"]))
 	{
	 $Id =$_GET["delId"];
	 $del ="DELETE FROM inquiry where IId = '$Id'";
	 $Obj->nonExecute($del);
	 header("location:inquiry.php?msg=Deleted Successfully"); 
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
	var city = document.getElementById("city");
	if(city.value == "")
	{
		alert("Please, Select your city");
		city.focus();
		return false;
	}
	var pro_name = document.getElementById("pro_name");
	if(pro_name.value == "")
	{
		alert("please enter product name");
		pro_name.focus();
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
	var date = document.getElementById("date");
	if(date.value == "")
	{
		alert("please enter date");
		date.focus();
		return false;
	}
	var inq_msg = document.getElementById("inq_msg");
	if(inq_msg.value == "")
	{
		alert("please enter inquiry message");
		inq_msg.focus();
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
              <h3> Inquiry</h3>
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
<th>City:</th>
<td><input type="text" name="city" id="city" placeholder="Enter Your City here" value="<?php echo isset($ERows)?$ERows[0]["City"]:"";?>"></td></tr>

<tr>
<th>Product name</th>
<td><input type="text" name="pro_name" id="pro_name" placeholder="Enter product name here" value="<?php echo isset($ERows)?$ERows[0]["ProName"]:"";?>"></td>
</tr>

<tr>
<th>Contact:</th>
<td><input type="number" name="contact" id="contact" placeholder="Enter contact here" value="<?php echo isset($ERows)?$ERows[0]["Contact"]:"";?>"></td>
</tr>

<tr>
<th>Email id:</th>
<td><input type="email" name="email" id="email" placeholder="Enter email id here" value="<?php echo isset($ERows)?$ERows[0]["Email"]:"";?>"></td>
</tr>

<tr>
<th>Inquiry Message</th>
<td><textarea name="inq_msg" id="inq_msg" cols="21" rows="4" placeholder="Enter inquiry message here"><?php echo isset($ERows)?$ERows[0]["InqMsg"]:"";?></textarea></td>

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
              <h3>Inquiry Details</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">

<?php if($Rows!=0) {  ?>
<table class="table table-striped table-bordered" cellpadding="1px" cellspacing="1px" border="1px">
	<tr>
    <th class="td-actions">Action Bar</th>
	<th><center>IId</center></th>
	<th><center>Name</center></th>
    <th><center>Address</center></th>
    <th><center>City</center></th>
    <th><center>ProName</center></th>
    <th><center>Contact</center></th>
    <th><center>Email</center></th>
    <th><center>Date</center></th>
    <th><center>InqMsg</center></th>
 </tr>

    </tr>
<?php foreach($Rows as $row) { ?>
    	<tr>
        <td class="td-actions"><a class="btn btn-small btn-success" href="?edId=<?php echo $row["IId"]; ?>"><i class="btn-icon-only icon-edit"> </i></a>  <a class="btn btn-small btn-danger" onClick="return confirmme();" href="?delId=<?php echo $row["IId"]; ?>"><i class="btn-icon-only icon-remove"> </i></a></td>
        	
        	<td class="td-actions"><?php echo $row["IId"]; ?></td>
            <td class="td-actions"><?php echo $row["Name"]; ?></td>
            <td class="td-actions"><?php echo $row["Address"]; ?></td>
            <td class="td-actions"><?php echo $row["City"]; ?></td>
            <td class="td-actions"><?php echo $row["ProName"]; ?></td>
            <td class="td-actions"><?php echo $row["Contact"]; ?></td>
            <td class="td-actions"><?php echo $row["Email"]; ?></td>
            <td class="td-actions"><?php echo $row["Date"]; ?></td>
            <td class="td-actions"><?php echo $row["InqMsg"]; ?></td>
            
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
