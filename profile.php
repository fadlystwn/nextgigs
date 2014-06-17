<!DOCTYPE html>		
<html lang="en">
<head>
<title>	Profile</title>
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/lightbox.js"></script>
	<script>
		$(document).ready(function()
		{
			$('.update').hide();
			$('.edit').click(
				function(){
				$('.update').slideToggle(2000);
			});
		});	
	</script>
	<link rel="stylesheet" type="text/css" href="css/lightbox.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<?php require_once 'header.php'; ?>
	<div class="wrapper container_12">
		<div class="profile grid_12">
			<img class="profile-pic grid_2" src="images/default.jpg"  alt="foto-profile">
			<h3 class="grid_9">John Lennon</h3>
			<div class="about grid_9">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit,
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit.
				</p>
				<a href="#" class="edit">edit</a>	
			</div>
				<div class="update grid_9 push_2">
				<?php include 'update.php'; ?>
				</div>
			</div>	
		<!-- end of profile  -->
		<nav class="menu-nav grid_12">
			<ul>
				<li><a href="">EVENT</a></li>
				<li><a href="">FOTO</a></li>
				<li><a href="">VIDEO</a></li>
			</ul>
		</nav>	
		<div class="gallery image-row container_12">
			<div class="image-set">
				<a class="example-image-link" href="images/222.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<div class="image-item grid_4"><img class="example-image" src="images/222.jpg" alt="drummer"/></div>
				</a>
				<a class="example-image-link" href="images/333.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<div class="image-item grid_4"><img class="example-image" src="images/333.jpg" alt="drummer"/></div>
				</a>
				<a class="example-image-link" href="images/555.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<div class="image-item grid_4"><img class="example-image" src="images/555.jpg" alt="drummer"/></div>
				</a>	
			</div>
		</div>
	</div>
		<!-- end of gallery image -->
		<?php include ('footer.php'); ?>
</body>
</html>
