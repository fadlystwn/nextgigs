<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
    <link rel="stylesheet" type="text/css" href="css/base.css">
</head>
<body>
<div class="wrapper container_12">
<div class= "push_1 grid_10">
    <form method="post" action="?user&create">
    <label for="namadepan">Nama Depan</label>
    <input type="text" name="namadepan" required><br>
    <label for="namabelakang">Nama belakang</label>   
    <input type="text" name="namabelakang" required><br> 
    <label for="text">Email</label>
    <input type="email" name="email" required><br>
    <label for="password">Password</label>
    <input type="password" name="password" required><br>
    <label for="lahir">Lahir</label>
    <input type="date" name="lahir" required><br> 
   <input class="button" type="submit" value="daftar">
    </form>
</div>
</div>
<div><?php include 'footer.php';?></div>
</body>

    
</html>