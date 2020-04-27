<?php
include_once "library/inc.koneksi.php";

if(!empty($_GET['kode'])){
	$kode= $_GET['kode'];
	$mySql = "DELETE FROM surat WHERE id='$kode'";
	$myQry = mysql_query($mySql);
	if($myQry){
		echo "Data Berhasil dihapus";
		header("location: surat.php");
	} else {
		echo "<b>Data yang dihapus tidak ada</b>";
	}
}