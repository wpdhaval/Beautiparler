<?php

include("dbCofig/db_config.php");
$Obj = new db_config();

?>
<!DOCTYPE HTML>
<head>
<?php include("include/headerscript.php"); ?>
</head>
<body>
<?php include("include/header.php"); ?>

<?php include("include/menu.php"); ?>

<?php include("include/slider.php"); ?>
</div>
	<div class="main">
		<div class="wrap">
			<div class="content">
				<div class="about-data">
						<h2>Contact</h2>						
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>								
				     <div class="feedback">
						 <form>
						 	<label>Name :</label>
						 	<input type="text">
						 	<label>Email :</label>
							<input type="text">
							<label>Telephone :</label>
						    <input type="text">
						    <label>Subject :</label>
							<textarea> </textarea>
							<input type="submit" value="Send Now">
						 </form>
		 			</div>				
				</div>
			<div class="sidebar">
				<h2>Recent Blogs</h2>
				<div class="blog_posts">
				       <div class="blog_date">
							<figure><span>23</span>May</figure>
					  </div>
					       <div class="blog_desc">
								<div class="blog_heading">
									<p><span>Lorem ipsum dolor sit amet consec.</span></p>
									<p class="date">Posted on May 13th, 2013 by <span class="author">Finibus Bonorum</span> </p>
							     </div>	
							     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
					       </div>
					 <div class="clear"></div>	
				</div>	
				<div class="blog_posts">
				       <div class="blog_date">
							<figure><span>03</span>Aprl</figure>
					  </div>
					       <div class="blog_desc">
								<div class="blog_heading">
									<p><span>Lorem ipsum dolor sit amet consec.</span></p>
									<p class="date">Posted on May 13th, 2013 by <span class="author">Finibus Bonorum</span></p>
							     </div>	
							     
					       </div>
					 <div class="clear"></div>	
				</div>	
				<div class="blog_posts">
				       <div class="blog_date">
							<figure><span>01</span>March</figure>
					  </div>
					       <div class="blog_desc">
								<div class="blog_heading">
									<p><span>Lorem ipsum dolor sit amet consec.</span></p>
									<p class="date">Posted on May 13th, 2013 by <span class="author">Finibus Bonorum</span></p>
							     </div>	
							     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
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

