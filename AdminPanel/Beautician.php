<?php
    @include("session_Checker.php");
    include("dbCofig/db_config.php");
	$Obj = new db_config();
 
 	if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];
		$contact = $_POST["contact"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$sname = $_POST["sname"];
		$saddress = $_POST["saddress"];
		$scity = $_POST["scity"];
		$sarea = $_POST["sarea"];
		$szipcode = $_POST["szipcode"];
		$scontact = $_POST["scontact"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		
		
		
		$Obj->nonExecute("INSERT INTO beautician(Name,Contact,Address,City,SaloonName,SAddress,SCity,SArea,SZipcode,SContact,Emailid,Password) VALUES('$name','$contact','$address','$city','$sname','$saddress','$scity','$sarea','$szipcode','$scontact','$email','$password')");
        
		
		header("location:beautician.php?msg=Insert Successfully");
	}
	if(isset($_POST["update"]))
	{
		$name = $_POST["name"];
		$contact = $_POST["contact"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$sname = $_POST["sname"];
		$saddress = $_POST["saddress"];
		$scity = $_POST["scity"];
		$sarea = $_POST["sarea"];
		$szipcode = $_POST["szipcode"];
		$scontact = $_POST["scontact"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$Id = $_POST["PriId"];
		
		
		$Obj->nonExecute("UPDATE beautician SET Name='$name', Contact='$contact', Address='$address', City='$city', SaloonName='$sname', SAddress='$saddress', SCity='$scity', SArea='$sarea', SZipcode='$szipcode', SContact='$scontact', Emailid='$email', Password='$password' WHERE BId='$Id' ");        
		
		header("location:beautician.php?msg=Update Successfully");
	}
	$Rows = $Obj->SelectData("beautician");
	
	if(isset($_GET["edId"]))
 	{
	 $Id =$_GET["edId"];
	 $ERows = $Obj->SelectData("beautician WHERE BId='$Id'");
	}
	
	 if(isset($_GET["delId"]))
 	{
	 $Id =$_GET["delId"];
	 $del ="DELETE FROM beautician where BId = '$Id'";
	 $Obj->nonExecute($del);
	 header("location:Beautician.php?msg=Deleted Successfully"); 
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
	var contact = document.getElementById("contact");
	if(contact.value == "")
	{
		alert("please enter your contact");
		contact.focus();
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
		alert("please enter your city");
		city.focus();
		return false;
	}
	var saloonname = document.getElementById("saloonname");
	if(saloonname.value == "")
	{
		alert("please enter ShopName");
		saloonname.focus();
		return false;
	}
	var saddress = document.getElementById("saddress");
	if(saddress.value == "")
	{
		alert("please enter Shop address");
		saddress.focus();
		return false;
	}
	var scity = document.getElementById("scity");
	if(scity.value == "")
	{
		alert("please enter shop city");
		scity.focus();
		return false;
	}
	var sarea = document.getElementById("sarea");
	if(sarea.value == "")
	{
		alert("please enter shop area");
		sarea.focus();
		return false;
	}

	var szipcode = document.getElementById("szipcode");
	if(szipcode.value == "")
	{
		alert("please enter shop zipcode");
		szipcode.focus();
		return false;
	}
	var scontact = document.getElementById("scontact");
	if(scontact.value == "")
	{
		alert("please enter shop contact");
		scontact.focus();
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
              <h3>Shopkeeper Information</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                <form action="" method="post">
<?php echo isset($_GET["msg"])?$_GET["msg"]:"";  ?>
<table border="0px" cellpadding="3px" cellspacing="3px" align="center">
<br/>
<tr>
<th>Name:</th>
<td><input type="text" name="name" id="name" placeholder="Enter name here" value="<?php echo isset($ERows)?$ERows[0]["Name"]:"";?>"></td>
</tr>

<tr>
<th>Contact:</th>
<td><input type="number" name="contact" id="contact" placeholder="Enter contact here" value="<?php echo isset($ERows)?$ERows[0]["Contact"]:"";?>"></td>
</tr>



<tr>
<th>Address:</th>
<td><textarea name="address" id="address" cols="21" rows="4" placeholder="Enter address here"><?php echo isset($ERows)?$ERows[0]["Address"]:"";?></textarea></td>
</tr>

<tr>
<th>City:</th>
<td><input type="text" name="city" id="city" placeholder="Enter Your City here" value="<?php echo isset($ERows)?$ERows[0]["City"]:"";?>"></td>
</tr>

<tr>
<th>ShopName:</th>
<td><input type="text" name="sname" id="sname" placeholder="Enter shopname here" value="<?php echo isset($ERows)?$ERows[0]["SaloonName"]:"";?>"></td>
</tr>

<tr>
<th>SAddress:</th>
<td><textarea name="saddress" id="saddress" cols="21" rows="4" placeholder="Enter shop address here"><?php echo isset($ERows)?$ERows[0]["SAddress"]:"";?></textarea></td>
</tr>

<tr>
<th>SCity:</th>
<td><input type="text" name="city" id="city" placeholder="Enter Your City here" value="<?php echo isset($ERows)?$ERows[0]["City"]:"";?>"></td></tr>

<tr>
<th>SArea:</th>
<td><textarea name="sarea" id="sarea" cols="21" rows="2" placeholder="Enter shop area here"><?php echo isset($ERows)?$ERows[0]["SArea"]:"";?></textarea></td>
</tr>

<tr>
<th>SZipcode:</th>
<td><input type="number" name="szipcode" id="szipcode" placeholder="Enter shop zipcode here" value="<?php echo isset($ERows)?$ERows[0]["SZipcode"]:"";?>"></td>
</tr>

<tr>
<th>SContact:</th>
<td><input type="number" name="scontact" id="scontact" placeholder="Enter saloon contact here" value="<?php echo isset($ERows)?$ERows[0]["SContact"]:"";?>"></td>
</tr>

<tr>
<th>Email id:</th>
<td><input type="email" name="email" id="email" placeholder="Enter email id here" value="<?php echo isset($ERows)?$ERows[0]["Emailid"]:"";?>"></td>
</tr>

<tr>
<th>Password:</th>
<td><input type="password" name="password" id="password" placeholder="Enter password here" value="<?php echo isset($ERows)?$ERows[0]["Password"]:"";?>"></td>
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
              <h3>Shopkeeper Details</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">

<?php if($Rows!=0) {  ?>
<table class="table table-striped table-bordered" cellpadding="3px" cellspacing="3px" border="1px">
	<tr>
   <th class="td-actions">Action Bar</th>
	<th><center>BId</center></th>
	<th><center>Name</center></th>
    <th><center>Address</center></th>
    <th><center>Contact</center></th>
    <th><center>City</center></th>
    <th><center>ShopName</center></th>
    <th><center>SAddress</center></th>
    <th><center>SCity</center></th>
    <th><center>SArea</center></th>
    <th><center>SZipcode</center></th>
    <th><center>SContact</center></th>
    <th><center>Emailid</center></th>
    <th><center>Password</center></th>
     </tr>

    </tr>
<?php foreach($Rows as $row) { ?>
    	<tr>
        	<td class="td-actions"><a class="btn btn-small btn-success" href="?edId=<?php echo $row["BId"]; ?>"><i class="btn-icon-only icon-edit"> </i></a>  <a class="btn btn-small btn-danger" onClick="return confirmme();" href="?delId=<?php echo $row["BId"]; ?>"><i class="btn-icon-only icon-remove"> </i></a></td>
        	
        	<td class="td-actions"><?php echo $row["BId"]; ?></td>
            <td class="td-actions"><?php echo $row["Name"]; ?></td>
            <td class="td-actions"><?php echo $row["Address"]; ?></td>
            <td class="td-actions"><?php echo $row["Contact"]; ?></td>
            <td class="td-actions"><?php echo $row["City"]; ?></td>
            <td class="td-actions"><?php echo $row["SaloonName"]; ?></td>
            <td class="td-actions"><?php echo $row["SAddress"]; ?></td>
            <td class="td-actions"><?php echo $row["SCity"]; ?></td>
            <td class="td-actions"><?php echo $row["SArea"]; ?></td>
            <td class="td-actions"><?php echo $row["SZipcode"]; ?></td>
            <td class="td-actions"><?php echo $row["SContact"]; ?></td>
            <td class="td-actions"><?php echo $row["Emailid"]; ?></td>
            <td class="td-actions"><?php echo $row["Password"]; ?></td>
            
            
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
