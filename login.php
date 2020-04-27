
<?php
@session_start();
include_once "library/inc.koneksi.php";

if (@$_SESSION['unit'] || @$_SESSION['operator'] || @$_SESSION['teknisi'] || @$_SESSION['manager']) {
header("location: home.php");
	}else{
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/footer.css">
</head>
<body>
<div id="header" ><img src="images/mega.png"></div>
<article>
<marquee bgcolor="#ffa31a" witdh="100" height="20" direction="left" align="middle" scrolldelay="2"><b>Selamat Datang di Layanan E-Ticketing Surat</b></marquee><br/> <br/><br/>
<h1>Selamat Datang<br/> di E-Ticketing Surat</h1>
<table align="center">
	<form action="" method="POST">
	<td><h3>Login</h3></td>
	<tr>
	<td>Username :</td>
	</tr>
	<tr>
	<td><input type="text" name="txtUser" placeholder="Username" required></td>
	</tr>
	<tr><td></td></tr>
	<tr>
	<td >Password :</td>
	</tr>
	<tr>
	<td><input type="password" name="txtPassword" placeholder="Password" required></td>
	</tr>
	<tr>
	<td colspan="3" align="center">
	<input type="submit" name="btnLogin" value="Login" class="button no-1">
	</td>
	</tr>
	</form>
	</table>
</article>

	<?php
$txtUser = @$_POST['txtUser'];
$txtPassword = @$_POST['txtPassword'];
$btnLogin = @$_POST['btnLogin'];

if ($btnLogin) {
	if ($txtUser == "" || $txtPassword == "") {
		?> <script type="text/javascript">alert("Username Dan Password Tidak Boleh Kosong");</script> <?php
 
	}else{
		$sql = mysql_query("select * from user where username = '$txtUser' and password = '$txtPassword'") or die(mysql_error());
		$data = mysql_fetch_array($sql);
		$cek = mysql_num_rows($sql);
		if ($cek >=1) {
		if($data['level'] == "unit"){
			@$_SESSION['unit'] = $data['nama'];
			header("location: unit.php");
}else if($data['level'] == "operator"){
			@$_SESSION['operator'] = $data['nama'];
			header("location: home.php");
	}else if($data['level'] == "teknisi"){
			@$_SESSION['teknisi'] = $data['nama'];
			header("location: teknisi.php");
	}else if($data['level'] == "manager"){
			@$_SESSION['manager'] = $data['nama'];
			header("location: manager.php");
	}
}else{
		echo '<script language="javascript">';
echo 'alert("Maaf Username Dan Password Anda Salah, Silakan Login Kembali")';
echo '</script>';		 
	}

}
}

?>

   <footer>
   <address class="alamat"> Hubungi Kami : <br/>IT Helpdesk & Technical Support<br>
  ITSO Lt.8 Menara Bank Mega - Jl. Kapt Tendean Kav.32-14A Jakarta Selatan 12790-Telp.021-79175000-ext 68233/68222/68333/68123 <br>
  Email : helpdesk@bankmega.com</address>  
  <p>Copyright &copy; 2016 Powered By Ibnu Yahya Saputra , Ihsanul Fikri & Methamazid Rusdi</p>   
   </footer>

</body>
</html>  

<?php
}
?>