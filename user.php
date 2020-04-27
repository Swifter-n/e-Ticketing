
<!DOCTYPE html>
<html>
  <head>
    <title>Halaman Surat</title>
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery-ui/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/user.css">

  
  </head>
  <body>
  <header>
  <div class="menu4">
    <a href="home.php"><span>Home</span></a>
    <a href="surat.php" class="current"><span>Surat</span></a>
    <a href="laporan_surat.php"><span>Laporan</span></a>
  </div>
  </header>

  <article id="navbar">
  <nav>
  	<ul>
  		<li><a href="user.php?manager">Manager</a></li>
  		<li><a href="user.php?unit">Unit</a></li>
  		<li><a href="user.php?teknisi">Teknisi</a></li>
  		<li><a href="user.php?operator">Operator</a></li>
  	</ul>
  </nav>
  </article>
  <?php
  if(isset($_GET['manager'])) include("user/manager.php");
  else if(isset($_GET['unit'])) include("user/unit.php");
  else if(isset($_GET['teknisi'])) include("user/tekinsi.php");
  else if(isset($_GET['operator'])) include("user/operator.php");
  else include("");
  ?>
  </body>
</html>