<?php
if (!isset($_SESSION['id_user'])) {
	header('location: ../nextgigs');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
	<script src="../js/preview.js"></script>
</head>
<body>
<?php require_once 'header.php'; ?>
	<div class=" container_12">
	<div class="event grid_4">
		<img id="img_prev" src="../images/update.jpg" alt="your image"/>
	</div>
	<div class="event grid_8">	
	<form method="post" action="" enctype="multipart/form-data">
		<label for="gambar">Pilih Gambar</label>
		<input type="file" name="photoimg" onchange="readURL(this);"><br>
		<div class="grid_7">		 	
		<label for="nama">Nama Event</label>
		<input type="text" name="namaevent" required><br>
		<label for="waktu">Waktu Penyelenggaraan</label>
		<input type="date" name="waktu">	
		<label for="lokasi">Lokasi</label>
		<input type="text" name="lokasi"><br>
		<label for="keterangan">Keterangan</label>
		<textarea rows="5" cols="30" name="keterangan"></textarea>
		<div class="grid_12">	
		<input type="submit" value="Update" id="update_button" class="button">
	</div>	
	</div>
	</form>
	</div>
<?php require_once 'footer.php'; ?>
</body>
</html>
</body>
</html>