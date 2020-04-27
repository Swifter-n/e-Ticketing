<?php
include_once "library/inc.library.php";
include_once "library/inc.koneksi.php";
?>

<?php
 $dataSurat    = isset($_POST['cmbsurat']) ? $_POST['cmbsurat'] : '';
$filterSQL  = "";

if(isset($_POST['btnPilih1'])) {
  $filterSQL = " WHERE surat.no_surat LIKE '%{$dataSurat}'";
}else{
  $filterSQL = "";
}

 $pencarianSQL = "";
 
if(isset($_POST['btnCari'])) {
  $txtKataKunci = trim($_POST['txtKataKunci']);

  
  $pencarianSQL = "WHERE cabang='$txtKataKunci' OR pic LIKE '%$txtKataKunci%' ";
}


$dataKataKunci = isset($_POST['txtKataKunci']) ? $_POST['txtKataKunci'] : '';

$baris  = 50;
$hal  = isset($_GET['hal']) ? $_GET['hal'] : 1;
$pageSql= "SELECT * FROM surat $pencarianSQL  $filterSQL";
$pageQry= mysql_query($pageSql, $koneksidb) or die ("error paging: ".mysql_error());
$jumlah = mysql_num_rows($pageQry);
$maks = ceil($jumlah/$baris);
$mulai  = $baris * ($hal-1); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Ticket</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" type="text/css" href="css/table1.css"/>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<style type="text/css">
	.button{
        padding: 5px 10px;
        margin: 10px;
        font-size: 10px;
        font-family: 'Roboto Condensed', sans-serif;
        color: white;
        width: 100px;
        border-radius: 7px;
    }
    .no-1{
        background-color: rgba(60, 189, 217, 1);
    }
    .no-1:hover{
         background-color: rgba(60, 189, 217, 0.8);
    }</style>
</head>
<body>
	<div class="menu4">
		<a href="home.php"><span>Home</span></a>
		<a href="surat.php" class="current"><span>Surat</span></a>
		<a href="laporan_surat.php"><span>Laporan</span></a>
	</div>
	<div class="menu4sub"></div><br/>
<h2 align="center"> LAPORAN DATA TICKET </h2><br/>
<form action="search.php" method="post" name="form1" target="_self" id="form1">
<table  class="table-list" width="100%" border="0" cellspacing="1" cellpadding="3">
            <tr>
              <td colspan="2" bgcolor="#ffa31a"><strong>PENCARIAN</strong></td>
            </tr>
            <tr>
              <td width="20%"><img src="images/ebook.png"><strong>Search (Cabang and Divisi / PIC)</strong> </td>
             <table></table> <input name="txtKataKunci" type="text" value="<?php echo $dataKataKunci; ?>" size="35" maxlength="100" />
            <input name="btnCari" type="submit" value=" Cari " class="button no-1" />
              </td>
            </tr>
            <td width="30"><img src="images/tag.png"><strong>Filter Data</strong></td>
  <td width="5"><b>:</b></td>
  <td width="317">   
  <select name="cmbsurat">
    <?php
      $dateApp = 2013;
      $dateNow = date("Y");
      $dateNow++;

      while ($dateApp < $dateNow) {
        $cek = ($_POST['cmbsurat'] == $dateApp)?'selected':'';
        echo "<option value='$dateApp' $cek>$dateApp</option>";
        $dateApp++;
      }
    ?>
  </select>
      <input name="btnPilih1" type="submit" value=" Pilih " class="button no-1" /></td>
</tr>
          </table>
          </form><br/><br/>

<table id="tableList" summary="Laporan Surat">
     <tr>
   <th><strong>No</strong></th>
				<th><strong>Tanggal</strong></th>
				<th><strong>No. Surat</strong></th>
				<th><strong>No.MD</strong></th>
				<th><strong>Tanggal MD</strong></th>
				<th><strong>Lampiran</strong></th>
				<th><strong>Cabang</strong></th>
				<th><strong>Alamat</strong></th>
				<th><strong>PIC</strong></th>
				<th><strong>Permasalahan</strong></th>
				<th><strong>Rekomendasi</strong></th>
				<th><strong>Solusi</strong></th>
				<th><strong>Status</strong></th>
  </tr>
	 <?php
       
	$mySql = "SELECT * FROM surat $filterSQL ORDER BY id LIMIT $mulai, $baris";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
	$nomor = 0; 
	while ($myData = mysql_fetch_array($myQry)) {
		$nomor++;
	?>
      		
  <tr>
   <td> <?php echo $nomor; ?> </td>
				<td> <?php echo $myData['tanggal']; ?> </td>
				<td> <?php echo $myData['no_surat']; ?> </td>
				<td> <?php echo $myData['no_md']; ?> </td>
				<td> <?php echo $myData['tgl_surat']; ?> </td>
				<td> <?php echo $myData['lampiran']; ?> </td>
				<td> <?php echo $myData['cabang']; ?> </td>
				<td> <?php echo $myData['alamat']; ?> </td>
				<td> <?php echo $myData['pic']; ?> </td>
				<td> <?php echo $myData['permasalahan']; ?> </td>
				<td> <?php echo $myData['keterangan']; ?> </td>
				<td> <?php echo $myData['solusi']; ?> </td>
				<td> <?php echo $myData['status']; ?> </td>
  </tr>
   <?php } ?>

</table>
<div style="width:100%; background: #ffa31a; color: #fff;text-align: right;"><b>Jumlah Data :<?php echo $jumlah; ?></b>
     <b>Halaman ke :</b>
        <?php
          for ($h = 1; $h <= $maks; $h++) {
            echo "<a href='surat.php?hal=$h'>$h</a>";
          }
        ?>
      </div>
<br />
<a href="cetak/Surat_Rekomendasi.php" target="_blank"> <img src="images/btn_print2.png" width="20" border="0"/> </a>