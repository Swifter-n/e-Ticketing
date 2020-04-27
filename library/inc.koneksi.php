<?php

$myHost	= "localhost";
$myUser	= "root";
$myPass	= "";
$myDbs	= "laporan";

$koneksidb	= mysql_connect($myHost, $myUser, $myPass) or die ("Koneksi ke MySQL tidak berhasil ".mysql_error());

mysql_select_db($myDbs, $koneksidb) or die ("Database <>$myDbs</> tidak ditemukan ! ".mysql_error());
?>