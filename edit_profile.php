<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/profile.js"></script>
		<div class="grid_7 push_1">
		<form method="POST" action="upload-photouser" enctype="multipart/form-data">
		<label for="gambar" class="grid_3">Ganti Profile</label>
		<input type="file" name="image" onchange="readURL(this);" class="grid_2"><br>
		<div><input class="button grid_2 " type="submit" value="update"></div>
		</form>
		</div>
		<div class="grid_7 push_1">
		<?php foreach(showUser($username) as $row): ?>	
		<form method="POST" action="update">
		<label for="nama_depan" class="grid_3">Nama Depan</label>
		<input type="text" class="grid_3" name="nama_depan" value="<?php echo $row['nama_depan']; ?>"><br>
		<label for="nama_belakang" class="grid_3">Nama Belakang</label>
		<input type="text" name="nama_belakang" class="grid_3" value="<?php echo $row['nama_belakang']; ?>"><br>
		<label for="about" class="grid_3">About</label>
		<textarea  name="about" class="grid_3"><?php echo $row['about']; ?></textarea><br>
		<label for="alamat" class="grid_3">alamat</label>
		<textarea  name="alamat" class="grid_3"><?php echo $row['alamat']; ?></textarea><br>
		<label for="url_facebook" class="grid_3">facebook</label>
		<input type="text" name="url_facebook" class="grid_3" value="<?php echo $row['url_facebook']; ?>"><br>
		<label for="url_twitter" class="grid_3">twitter</label>
		<input type="text" name="url_twitter" class="grid_3" value="<?php echo $row['url_twitter']; ?>"><br>
		<div><input class="button grid_2 push_2" type="submit" value="update"></div>
	</form>
<?php endforeach ?>
</div>