<?php
if (!isset($_SESSION['id_user'])) {
	header('location: ../nextgigs');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script src="js/preview.js"></script>
</head>
<body>
<?php require_once 'header.php'; ?>
	<div class=" container_12">
	<div class="update-event grid_4">
		<img id="img_prev" src="images/update.jpg" alt="your image"/>
	</div>
 <div class="update-event grid_8">	
	<form method="post" action="create-event" enctype="multipart/form-data">
		<label for="gambar" class="grid_3">Pilih Gambar</label>
		<input type="file" name="image" onchange="readURL(this);" class="grid_2"><br>		 	
		<label for="nama_event" class="grid_3">Nama Event</label>
		<input type="text" name="nama_event" required class="grid_3"><br>
		<label for="tanggal_event" class="grid_3">Waktu Penyelenggaraan</label>
		<input type="date" name="tanggal_event" class="grid_3">	
		<label for="lokasi" class="grid_3">Lokasi</label>
		<input type="text" name="lokasi" class="grid_3"><br>
		<label for="keterangan" class="grid_3 ">Keterangan</label>
		<textarea name="keterangan" class="grid_3"></textarea>
		<input type="submit" value="Submit" id="update_button" class="grid_3 push_2 button">
	</div>
	</form>
	</div>
<?php require_once 'footer.php'; ?>
</body>
</html>