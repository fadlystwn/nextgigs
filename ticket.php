<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include 'header.php'; ?>
	<section class="container_12">
			<div class="horizontalrule"></div>	
				<h4>MANAGE YOUR TICKET AND GIGS</h4>
					<div class="horizontalrule"></div>
						<?php foreach (myevent() as $row): ?>
							<div class="grid_10 push_1 my_event">
								<img class="grid_2" src="<?php echo $row['picture']; ?> ">
									<ul>
										<li><a href="">Ticket</a></li>
										<li><a href="">Delete Event</a></li>	
									</ul>
									<div class="grid_6">
										<div class="horizontalrule"></div>
											<form>
												<label for="price" class="grid_2">PRICE</label>
												<input type="text" name="price" class="grid_2"></br>
												<label for="quantity" class="grid_2">STOCK</label>
												<input type="text" name="quantity" class="grid_2">
												<input type="submit" value="Submit" class="button grid_2 push_1">
											</form>
										<div class="horizontalrule"></div>	
									</div>
							</div>
						<?php endforeach ?>
		</section>		
</body>
</html>