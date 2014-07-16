<?php 
if (!isset($_SESSION['id_user'])) {
	header('location: .');
}
 ?>
<!DOCTYPE html>		
<html lang="en">
<head>
	<title>	Profile</title>
	<base href="http://localhost/fadly/nextgigs/">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/lightbox.js"></script>
	<script src="js/profile.js"></script>
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
	<![endif]-->
</head>
<body>
<?php require_once 'header.php'; ?>
	<div class="wrapper container_12">
		<?php
			$data = explode('/', $_SERVER['REQUEST_URI']);
			$username = end($data);
		?>
			<?php foreach(showUser($username) as $row): ?>		
				<div class="wrapper">
					<img id="img_prev" class="profile-pic grid_2" src="<?php echo $row['gambar_profile']; ?>" alt="your image"/>
				</div>
					<p class=" name grid_10"><?php echo $row['nama_depan']; ?> <?php echo $row['nama_belakang']; ?></p>
					<div class="horizontalrule"></div>	
			<?php endforeach ?>
				<div class="about grid_10">
					<p>"<?php echo showAbout(); ?>"</p>
						<a class="edit"><img src="images/icon/edit.png" class="edit-profile"></a>	
				</div>
					<div class="wrapper update grid_10 push_2">
						<?php include 'edit_profile.php'; ?>
					</div>	
	</div>			
<?php include ('footer.php'); ?>
</body>
</html>	
