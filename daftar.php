<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>

    <link rel="stylesheet" type="text/css" href="css/960_12_col.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container_12">
<div class="grid_9 push_1 layout-register">
</div>
<div class="grid_8 push_2 register">
    <form method="post" action="check-email-user">
        <label for="nama_depan" class="grid_3">Nama Depan</label>
        <input type="text" name="nama_depan" required class="grid_3">
        <label for="nama_belakang" class="grid_3">Nama belakang</label>   
        <input type="text" name="nama_belakang" required class="grid_3">
        <label for="text" class="grid_3">Email</label>
        <input type="email" name="email" required class="grid_3">
        <label for="text" class="grid_3">Username</label>
        <input type="text" name="username" required class="grid_3">
        <label for="password" class="grid_3">Password</label>
        <input type="password" name="password" required class="grid_3">
        <label for="lahir" class="grid_3">Lahir</label>
        <input type="date" name="lahir" required class="grid_3"> 
        <input class="button grid_3" type="submit" value="daftar" >
    </form>
    <p class="grid_6">Jika sudah memiliki akun silahkan <a href="http://localhost/fadly/nextgigs">login</a></p>
</div>
</div>
</div>  
 <footer>
   <p>Copyright <a href="http://fadlysetiawan.com">Fadly Setiawan</a> &copy 2014</p>
</footer>
</body>
</html>