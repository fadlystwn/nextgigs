<!DOCTYPE html>
<html>
<head>
	<title>Event Details - NEXTGIGS</title>
		<base href="http://localhost/fadly/nextgigs/">
</head>
<body>
<?php
	$data = explode('/', $_SERVER['REQUEST_URI']);
	$id_event = end($data);
?>
<?php require_once 'header.php'; ?>
<?php foreach(eventDetails($id_event) as $row): ?>
<div class=" container_12">
	<div class="wrapper grid_5">
		<img class="event-details" src="<?php echo $row['gambar']; ?>">
	</div>
<?php endforeach ?>
	<div class="wrapper grid_7">
		<h3>INFORMASI LENGKAP</h3>
			<p align="center"><?php echo $row['nama_event']; ?> 
			<?php echo $row['lokasi']; ?> <?php echo $row['tanggal_event']; ?><br>
			<?php echo $row['keterangan']; ?>
			</p>
	</div>
	<div class="ticket grid_7 wrapper">
		BUY TICKET
	</div>
</div>
</body>
</html>

