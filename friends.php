<?php
if (!isset($_SESSION['id_user'])) {
	header('location: ../nextgigs');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Teman</title>
</head>
<body>
	<?php include 'header.php'; ?>
	<div class="container_12">
		<div class="friends grid_4"></div>
		<div class="friends grid_4"></div>
		<div class="friends grid_4"></div>
		<div class="friends grid_4"></div>
		<div class="friends grid_4"></div>
		<div class="friends grid_4"></div>	
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>