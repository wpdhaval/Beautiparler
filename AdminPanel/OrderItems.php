<!DOCTYPE html>
<html lang="en">
<head>

<?php include("include/headerscript.php"); ?>
</head>
<script language="javascript" type="text/javascript">
function validate()
{
	var price = document.getElementById("price");
	if(price.value == "")
	{
		alert("please enter price");
		price.focus();
		return false;
	}
	var totalprice = document.getElementById("totalprice");
	if(totalprice.value == "")
	{
		alert("please enter total price");
		totalprice.focus();
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
              <h3>Order Items</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                <form action="" method="post">

<table border="0px" cellpadding="10px" cellspacing="5px" align="center">


<tr>
<th>Price:</th>
<td><input type="number" name="price" id="price" placeholder="Enter price here"></td>
</tr>


<tr>
<th>TotalPrice:</th>
<td><input type="number" name="totalprice" id="totalprice" placeholder="Enter Total price here"></td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="submit" id="submit" value="submit" onclick="return validate()"> 
<input type="reset" name="reset" id="reset" value="reset"></td>
</tr>

</table>
</form>

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
