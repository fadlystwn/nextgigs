<!-- <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'> -->
<link rel="stylesheet" type="text/css" href="css/base.css">
  <header class="container_12">		
    <nav>
		  <ul>
        <li><a href="home">HOME</a></li>
        <li><a href="u/<?php echo $_SESSION['username']; ?>">PROFILE</a></li>
        <li><a href="new-event">UPDATE EVENT</a></li>
        <li><a href="friends">FRIENDS</a></li>
        <li><a href="pesan">MESSAGE</a></li>
      </ul>
    </nav>
    <a class ="logout" href="logout">logout</a>
</header>