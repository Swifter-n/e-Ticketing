<?php
include_once "library/inc.koneksi.php";
include_once "library/inc.library.php";

# TOMBOL SIMPAN DIKLIK
if(isset($_POST['btnSimpan'])){
  $kodeBaru = kodeSurat();
  $txtNo_md    = $_POST['txtNo_md'];
  $txtTgl_surat   = $_POST['txtTgl_surat'];
  $txtLampiran   = $_POST['txtLampiran'];
  $txtCabang = $_POST['txtCabang'];
  $txtAlamat    = $_POST['txtAlamat'];
  $txtPic = $_POST['txtPic'];
  $txtPermasalahan  = $_POST['txtPermasalahan'];
  $txtKeterangan  = $_POST['txtKeterangan'];
  $txtSolusi = $_POST['txtSolusi'];
  $txtStatus  = $_POST['txtStatus'];
  

 
  $pesanError = array();
  if(trim($txtNo_md)=="") {
    $pesanError[] = "Data <b>Nomer MD </b> tidak boleh kosong, harus diisi !";    
  }
  if(trim($txtTgl_surat)=="") {
    $pesanError[] = "Data <b>Tanggal Surat </b> tidak boleh kosong, harus diisi !";   
  }
  if(trim($txtLampiran)=="KOSONG") {
    $pesanError[] = "Data <b>Lampiran</b> belum dipilih !";    
  }
  if(trim($txtCabang)=="KOSONG") {
    $pesanError[] = "Data <b>Cabang</b> belum dipilih !";    
  }
  if(trim($txtAlamat)=="") {
    $pesanError[] = "Data <b>Alamat</b> tidak boleh kosong, harus diisi !";   
  }
  if(trim($txtPic)=="") {
    $pesanError[] = "Data <b>PIC</b> tidak boleh kosong, harus diisi !";    
  }

  # JIKA ADA PESAN ERROR DARI VALIDASI
  if (count($pesanError)>=1 ){
    echo "<div class='mssgBox'>";
    echo "<img src='images/attention.png'> <br><hr>";
      $noPesan=0;
      foreach ($pesanError as $indeks=>$pesan_tampil) { 
      $noPesan++;
        echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";  
      } 
    echo "</div> <br>"; 
  }
  else {
   $kode	= $_POST['txtKode'];

		// Simpan data dari form ke Database
		$mySql	= "UPDATE surat  SET 
						no_md='$txtNo_md', 
						tgl_surat='$txtTgl_surat', lampiran='$txtLampiran',
						cabang='$txtCabang', alamat='$txtAlamat', 
						pic='$txtPic', permasalahan='$txtPermasalahan', keterangan='$txtKeterangan', solusi='$txtSolusi', status='$txtStatus'
				  WHERE id='$kode'";		
		$myQry	= mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
		if($myQry){
			// Setelah data disimpan, Refresh
			echo "Data Berhasil disimpan";
      header("location: surat.php");
		}
		exit;
	}	
}

// Skrip membaca variable dari URL (Kode dikirim dari menu Edit)
$kode	= isset($_GET['kode']) ?  $_GET['kode'] : $_POST['txtKode']; 

# TAMPILKAN DATA LOGIN UNTUK DIEDIT
$mySql 	= "SELECT * FROM surat WHERE id='$kode'";
$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query ambil data salah : ".mysql_error());
$myData = mysql_fetch_array($myQry); 

	# MEMBUAT NILAI DATA PADA FORM
	// Masukkan data ke dalam variabel, supaya bisa dipanggil di Form
$dataKode		= $myData['id'];
	$dataNo_Md	= isset($_POST['txtNo_md']) ? $_POST['txtNo_md'] : $myData['no_md'];
	$dataTanggal_Surat	= isset($_POST['txtTgl_surat']) ? $_POST['txtTgl_surat'] : $myData['tgl_surat'];
	$dataLampiran	= isset($_POST['txtLampiran']) ? $_POST['txtLampiran'] : $myData['lampiran'];
	$dataCabang  = isset($_POST['txtCabang']) ? $_POST['txtCabang'] : $myData['cabang'];
	$dataAlamat  = isset($_POST['txtAlamat']) ? $_POST['txtAlamat'] : $myData['alamat'];
	$dataPic		= isset($_POST['txtPic']) ? $_POST['txtPic'] : $myData['pic'];
	$dataPermasalahan	= isset($_POST['txtPermasalahan']) ? $_POST['txtPermasalahan'] : $myData['permasalahan'];
	$dataKeterangan	= isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : $myData['keterangan'];
	$dataSolusi	= isset($_POST['txtSolusi']) ? $_POST['txtSolusi'] : $myData['solusi'];
	$dataStatus		= isset($_POST['txtStatus']) ? $_POST['txtStatus'] : $myData['status'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Ticket</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
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
    }
.odd input[type=text]{background: #bdc3c7; border-radius: 2px;}
input[type=text]{border-radius: 1px;}
    </style>
</head>
<body>
<div class="menu4">
    <a href="home.php"><span>Home</span></a>
    <a href="surat.php" class="current"><span>Surat</span></a>
    <a href="laporan_surat.php"><span>Laporan</span></a>
  </div>
  <div class="menu4sub"></div> <br><br>
<form action="" method="post" name="form1" enctype="multipart/form-data" target="_self">
  <table class="table-list" width="700" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td colspan="3" bgcolor="#F5F5F5"><strong>UBAH DATA SURAT</strong> </td>
    </tr>
    <tr>
      <td width="184"><strong>Kode</strong></td>
      <td width="5"><strong>:</strong></td>
      <td class="odd" width="489"><input name="textfield" type="text" value="<?php echo $dataKode; ?>" size="10" maxlength="10" readonly="readonly">
      <input name="txtKode" type="hidden" value="<?php echo $dataKode; ?>" /></td>
    </tr>
    <tr>
      <td><strong>No. MD</strong></td>
      <td><strong>:</strong></td>
      <td><input name="txtNo_md" type="text" value="<?php echo $dataNo_Md; ?>" size="30" maxlength="20"></td>
    </tr>
    <tr>
      <td><strong>Tanggal Surat </strong></td>
      <td><strong>:</strong></td>
      <td><input name="txtTgl_surat" type="date" value="<?php echo $dataTanggal_Surat; ?>" size="30" maxlength="100"></td>
    </tr>
    <tr>
      <td><strong>Lampiran</strong></td>
      <td><strong>:</strong></td>
      <td><input name="txtLampiran" type="text" value="<?php echo $dataLampiran; ?>" size="30" maxlength="100"></td>
    </tr>
    <tr>
      <td><strong>Cabang</strong></td>
      <td><strong>:</strong></td>
      <td><input name="txtCabang" type="text" value="<?php echo $dataCabang; ?>" size="30" maxlength="30"></td>
    </tr>
    <tr>
      <td><strong>Alamat</strong></td>
      <td><strong>:</strong></td>
      <td><input name="txtAlamat" type="text" value="<?php echo $dataAlamat; ?>" size="30" maxlength="30"></td>
    </tr>
    <tr>
      <td><strong>PIC</strong></td>
      <td><strong>:</strong></td>
      <td><input name="txtPic" type="text" value="<?php echo $dataPic; ?>" size="30" maxlength="30"></td>
    </tr>
    <tr>
      <td><strong>Permasalahan</strong></td>
      <td><strong>:</strong></td>
      <td><textarea name="txtPermasalahan" type="text" cols="30" rows="8" size="30"><?php echo $dataPermasalahan; ?></textarea></td>
    </tr>
    <tr>
      <td><strong>Rekomendasi</strong></td>
      <td><strong>:</strong></td>
      <td><textarea name="txtKeterangan" type="text" cols="30" rows"8" size="30"><?php echo $dataKeterangan; ?></textarea></td>
    </tr>
    <tr>
      <td><strong>Solusi</strong></td>
      <td><strong>:</strong></td>
      <td><input name="txtSolusi" type="text" value="<?php echo $dataSolusi; ?>" size="30" maxlength="30"></td>
    </tr>
    <tr>
      <td><strong>Status</strong></td>
      <td><strong>:</strong></td>
      <td><input name="txtStatus" type="text" value="<?php echo $dataStatus; ?>" size="30" maxlength="30"></td>
    </tr>
   
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="btnSimpan" type="submit" value=" Simpan " class="button no-1"></td>
    </tr>
  </table>
</form>
</body>
</html>