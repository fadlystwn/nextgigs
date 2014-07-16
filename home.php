<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<head>
	<title>HOME</title>
	<link rel="stylesheet" href="css/mosaic.css" type="text/css" media="screen" />
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/mosaic.1.0.1.min.js"></script>
	<script src="js/profile.js"></script>
	<script type="text/javascript">  
		jQuery(function($){
			$('.bar2').mosaic({
				animation: 'slide'//fade or slide
			});				
		});  
	</script>
</head>
<body>
<?php include ('header.php'); ?>
	<!-- user  -->
	<div class="wrapper home-container container_12">

		<div class="home-title grid_12">
			<p>Temukan Event di Sekitarmu!</p>
		</div>
		<div class="horizontalrule"></div>	
		<?php foreach(timeline() as $row): ?>
		<div class="mosaic-block bar2 grid_3">
			<a href="event-details/<?php echo $row['id_event']; ?>" class="mosaic-overlay">
				<div class="details">
					<h4 class="nama-event"><?php echo $row['nama_event']; ?></h4>
						<p class="keterangan"><?php echo $row['keterangan']; ?></p>
				</div>
			</a>
				<img src="<?php echo $row['gambar']; ?>"/>
		</div>
			<?php endforeach ?>

	</div>

<?php include ('footer.php'); ?>
</body>
</html>
