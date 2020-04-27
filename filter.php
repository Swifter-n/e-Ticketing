<?php 
include_once "library/inc.koneksi.php";

$dataSurat    = isset($_POST['cmbSurat']) ? $_POST['cmbSurat'] : '';
$filterSQL  = "";
# Filter Surat
if(isset($_POST['btnPilih1'])) {
  $filterSQL = " WHERE surat.id = '$dataSurat'";
}else{
  $filterSQL = "";
}


$baris  = 50;
$hal  = isset($_GET['hal']) ? $_GET['hal'] : 1;
$pageSql= "SELECT * FROM surat $filterSQL";
$pageQry= mysql_query($pageSql, $koneksidb) or die ("error paging: ".mysql_error());
$jumlah = mysql_num_rows($pageQry);
$maks = ceil($jumlah/$baris);
$mulai  = $baris * ($hal-1);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="menu4">
    <a href="home.php"><span>Home</span></a>
    <a href="surat.php" class="current"><span>Surat</span></a>
    <a href="laporan_surat.php"><span>Laporan</span></a>
  </div>
  <div class="menu4sub"></div>
  <table width="700" border="0" cellspacing="1" cellpadding="3" class="table-border">
    <tr>
      <td colspan="2" align="right"><h1><b>DATA SURAT </b></h1></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">
        <table class="table-list" width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr>
            <th width="5%" bgcolor="#F5F5F5"><strong>No</strong></th>
            <th width="40%" bgcolor="#F5F5F5"><strong>No.Surat</strong></th>
            <th width="10%" bgcolor="#F5F5F5"><strong>Cabang</strong></th>
            <th width="15%" bgcolor="#F5F5F5"><strong>Alamat</strong></th>
            <th width="51%" bgcolor="#F5F5F5"><strong>Permasalahan</strong></th>
            <th width="11%" bgcolor="#F5F5F5"><strong>Rekomendasi</strong></th>
          </tr>
          <?php
  $mySql = "SELECT * FROM surat $filterSQL ORDER BY tgl_surat";
  $myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error()); 
  $nomor = $mulai; 
  while ($myData = mysql_fetch_array($myQry)) {
            $nomor++;
            $kode = $myData['id'];
  ?>    
          <tr>
            <td> <?php echo $nomor++ ?> </td> 
            <td> <?php echo $myData['no_surat']; ?> </td>
            <td> <?php echo $myData['cabang']; ?> </td>
            <td> <?php echo $myData['alamat']; ?> </td>
            <td> <?php echo $myData['permasalahan']; ?> </td>
            <td> <?php echo $myData['keterangan']; ?> </td>
            
          </tr> 
        <?php } ?>
        </table>
      </td>
    </tr>
    </table>
    </body>
    </html>
			
			