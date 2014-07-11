<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head> 
<title>NEXTGIGS - Situs Berbagi Event Musik </title>
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
  <body>
    <header>
      <h1>SELAMAT DATANG DI NEXTGIGS</h1>
        <h2>Situs Berbagi Event Musik Di Kotamu!</h2>
    </header>
    <div class="layout"></div>
    <div class="login" id="login">
      <form method="post" action="checklogin">
        <div class="input-container">
        <input name="email" class="input-text" type="email" placeholder="example@email.com" maxlength="30" size="20" required>
        <input name="password" class="input-text" type="password" size="20" required>
        </div>
        <center><input type="submit" name="login" value="Login">
          <p>Belum punya akun? Silahkan <a href="daftar.php">daftar</a></p>
          <p><a href="">Lupa password?</a></p>
        </center>
      </form>
    </div>
    <footer>
      Copyright &copy 2014 Fadly Setiawan
    </footer>
    </body>
</html>