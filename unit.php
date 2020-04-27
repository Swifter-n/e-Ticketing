<?php
@session_start();
include_once "library/inc.koneksi.php";

if (@$_SESSION['unit'] || @$_SESSION['operator'] || @$_SESSION['teknisi'] || @$_SESSION['manager']) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Unit lain</title>
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
  var greeting = ("<h5>Selamat " +display+ ", <?php echo $_SESSION['unit'];?></h5>");
  document.write(greeting);
</script>
</div>
</div>
<article>    
<ul class="ca-menu">
                    <li>
                        <a href="view_status.php">
                            <span class="ca-icon"><img src="images/mail.png"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">View Status Ticketing</h2>
                                <h3 class="ca-sub">View Status Data Ticket</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="input_tiket.php">
                            <span class="ca-icon"><img src="images/note.png"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">Input Ticketing</h2>
                                <h3 class="ca-sub">Input Data Ticket</h3>
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
<div>
 <footer>
                      <address class="alamat">
                      Hubungi Kami :<br/> IT Helpdesk & Technical Support<br>
  ITSO Lt.8 Menara Bank Mega - Jl. Kapt Tendean Kav.32-14A Jakarta Selatan 12790-Telp.021-79175000-ext 68233/68222/68333/68123 <br>
  Email : helpdesk@bankmega.com</address>
  <p>Copyright &copy; 2016 Powered By Ibnu Yahya Saputra, Ihsanul Fikri & Methamazid Rusdi</p>
                       
                   </footer>
</div>
</body>
</html>
<?php
}else{
	header("location: login.php");
}
?>