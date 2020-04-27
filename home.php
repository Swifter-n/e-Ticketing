<?php
@session_start();
include_once "library/inc.koneksi.php";
include_once "library/inc.tanggal.php";
include_once "library/inc.library.php";
if (@$_SESSION['unit'] || @$_SESSION['operator'] || @$_SESSION['teknisi'] || @$_SESSION['manager']) {
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>Halaman Utama</title>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="plugins/tigra_calendar/tcal.css" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">

</head>
<body>
<div id="header">
<img src="images/mega.png">
<script>
  dateToday = new Date();
  timeNow = dateToday.getTime()
  dateToday.setTime(timeNow)
  theHour = dateToday.getHours();
  if (theHour > 15)display = "Sore";
  else if (theHour > 12)display = "Siang";
  else display = "Pagi";
  var greeting = ("<h5>Selamat " +display+ ", <?php echo $_SESSION['operator'];?></h5>");
  document.write(greeting);
</script>
</div>
     <article>    
<ul class="ca-menu">
                    <li>
                        <a href="surat.php">
                            <span class="ca-icon"><img src="images/mail.png"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">Manage Ticketing</h2>
                                <h3 class="ca-sub">Kelola Data Ticket</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="surat_add.php">
                            <span class="ca-icon"><img src="images/note.png"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">Input Ticketing</h2>
                                <h3 class="ca-sub">Input Data Ticket</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="user.php">
                            <span class="ca-icon"><img src="images/user.png"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">Manage User</h2>
                                <h3 class="ca-sub">Kelola Data User</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <span class="ca-icon"><img src="images/logout.png"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">Logout</h2>
                                <h3 class="ca-sub">Keluar Dari Beranda</h3>
                            </div>
                        </a>
                    </li>
                </ul>
                </article>  
               
                   <footer>
                      <address class="alamat">
                      Hubungi Kami :<br/> IT Helpdesk & Technical Support<br>
  ITSO Lt.8 Menara Bank Mega - Jl. Kapt Tendean Kav.32-14A Jakarta Selatan 12790-Telp.021-79175000-ext 68233/68222/68333/68123 <br>
  Email : helpdesk@bankmega.com</address>
  <p>Copyright &copy; 2016 Powered By Ibnu Yahya Saputra, Ihsanul Fikri & Methamazid Rusdi</p>
                       
                   </footer>
             
</body>
</html>
<?php
}else{
	header("location: login.php");
}
?>

