<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
<?php

include("dbCofig/db_config.php");
$Obj = new db_config();


if(isset($_POST["submit"]))
	{
		$feedback = $_POST["feedback"];
		
		$Obj->nonExecute("INSERT INTO feedback(Feedback) VALUES('$feedback')");
		
		header("location:feedback.php?msg=Insert Successfully");
	}
?>
<?php /*?><?php */?>
<?php include("include/headerscript.php") ?>
</head>
<body>

<?php include("include/header.php"); ?>

<?php include("include/menu.php"); ?>
	

<?php include("include/slider.php"); ?>



<div class="main">
		<div class="wrap">
			<div class="content">
				<div class="about-data">
						<h2>FeedBack</h2>						
													
				     <div class="feedback">
						 <form method="post">
						 	 <label>FeedBack :</label>
							<textarea name="feedback" id="feedback" cols="21" rows="4" placeholder="Enter feedback here"> </textarea>
							<input type="submit" name="submit" id="submit" value="Submit">
						 </form>
		 			</div>				
				</div>
			
					 <div class="clear"></div>	
				</div>					       					
				</div>
				<div class="clear"></div>
	       </div>
		</div>		
   </div>
				
				

<?php include("include/footer.php"); ?>

</body>
</html>

