<?php
include_once "library/inc.koneksi.php";
include_once "library/inc.library.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cetak Surat</title>
	<style type="text/css">
		*{margin: 0; padding: 0;}
		body{font-family: arial;}
		header{margin: auto; width: 800px;text-align: center;margin-bottom: 50px;}
		header h1{font-size: 25px;line-height: 30px;}
		article{width: 800px; margin:auto;overflow: hidden;}
		article p{text-align: justify;line-height:35px;font-size: 20px}
		article .odd{margin-bottom: 10px;width: 700px;text-align: justify;line-height:35px;font-size: 20px}
		article .signature{margin-bottom: 70px;}
		article .text{text-align: center;margin-bottom: 90px;}
		article .left{float: left; width: 400px;}
		article .right{float: right; width: 370px;}
		article #line1{margin: 0 85px;font-weight: bold;}
		article #line{font-weight: bold;}
		article #line2{margin: 0 120px;font-weight: bold;}
		footer{line-height: 20px;margin: auto;width: 800px;position: absolute;bottom: 0;font-size: 8px;}
		



	</style>
</head>
<body>
<?php
if(!empty($_GET['kode'])){
	$kode	= $_GET['kode'];
  	$mySql = "SELECT * FROM surat WHERE id ='$kode'";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
	while ($myData = mysql_fetch_array($myQry)){
		?>
<header>
<h1>Surat Rekomendasi</h1>
<h1>No.<?php echo $myData['no_surat'];?></h1>
<hr color="black">
</header>
<article>
	<p>Berdasarkan hasil pengecekan dan maintenance pada :</p>
	<p>KC/KCP/DIV : &nbsp;&nbsp;<?php echo $myData['cabang'];?></p>
	<p>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;<?php echo $myData['alamat'];?></p><br/><br/>

	<p>Telah ditemukan adanya permasalahan dengan rincian sebagai berikut : </p>
	<div class="odd">
	<p><?php echo $myData['permasalahan'];?></p>
</div>
	<p>Maka bersama surat ini divisi ITSO merekomendasikan kepada KC/KCP/DIV tsb: </p>
	<p>Untuk Melakukan : <?php echo $myData['solusi'];?> </p>
	<p>Pada Object/Item : <?php echo $myData['keterangan'];?></p><br/>

	
		<p>Dimana hal ini bertujuan untuk menunjang kelancaran operasional Bank Mega.</p>
		<p>Demikian disampaikan,terimakasih atas perhatian dan kerjasamanya.</p> <br/>
<p>Jakarta,
	<script type='text/javascript'>

var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
var date = new Date();
var day = date.getDate();
var month = date.getMonth();
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
document.write(day + " " + months[month] + " " + year);
</script>
</p><br/><br/><br/><br/><br/>
<p id="line2"><?php echo $myData['pic']; ?></p>
<hr color="#000" width="270">
	<p class="signature">IT Technical Support Specialist</p>
<p class="text"><b>Menyetujui,</b></p><br/><br/><br/>
</div>
<div class="left">
<p id="line"><?php echo $myData['itso_head']; ?></p>
<hr color="#000" width="150">
<p class="signature">ITSO HEAD</p>
</div>
<div class="right">
<p id="line1"><?php echo $myData['head_helpdeks']; ?></p>
<hr color="#000" width="290">
<p class="signature">IT Technical Support Dept. Head</p>
</div>
</article>

<footer>
	<address>
	IT Helpdesk & Technical Support<br>
	ITSO Lt.8 Menara Bank Mega - Jl. Kapt Tendean Kav.32-14A Jakarta Selatan 12790-Telp.021-79175000-ext 68233/68222/68333/68123<br>
	Email : helpdesk@bankmega.com
	</address>
	</footer>
<script type="text/javascript">
	window.print()
</script>
<?php
	} 
}
?>
</body>
</html>