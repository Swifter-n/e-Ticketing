<?php
include_once "library/inc.library.php";
include_once "library/inc.koneksi.php";
include_once "library/inc.tanggal.php";
include_once "library/inc.jam.php";

if(isset($_POST['btnSimpan'])){
  $kodeBaru = kodeSurat();
  $bulan = bulan();
  $NoSurat = sprintf($kodeBaru).'/ITSO/'.$bulan.'/'.date('Y');
  $txtTanggal = $_POST['txtTanggal'];date('d-m-Y');
  $txtNo_md    = $_POST['txtNo_md'];
  $txtTgl_surat   = $_POST['txtTgl_surat'];
  $txtLampiran   = $_POST['txtLampiran'];
  $txtCabang = $_POST['txtCabang'];
  $txtAlamat    = $_POST['txtAlamat'];
  $txtPic = $_POST['txtPic'];
  $txtItso = $_POST['txtItso'];
  $txtHead = $_POST['txtHead'];
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
  if(trim($txtPermasalahan)=="") {
    $pesanError[] = "Data <b>Permasalahan</b> tidak boleh kosong, harus diisi !";   
  }
  if(trim($txtKeterangan)=="") {
    $pesanError[] = "Data <b>Keterangan</b> tidak boleh kosong, harus diisi !";   
  }
  if (trim($txtSolusi)=="") {
    $pesanError[] = "Data <b>Solusi</b> tidak boleh kosong, harus diisi !";
  }
  if(trim($txtStatus)=="KOSONG") {
    $pesanError[] = "Data <b>Status</b> belum dipilih !";   
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
    $kodeBaru = kodeSurat();
    
     $mySql  = "INSERT INTO surat ( 
                id, tanggal, no_surat,
                no_md, tgl_surat, lampiran, 
                cabang, alamat, pic, itso_head, head_helpdeks, 
                permasalahan, keterangan, solusi, status)
              VALUES ( 
                  '$kodeBaru', '$txtTanggal', '$NoSurat', '$txtNo_md', '$txtTgl_surat', 
                  '$txtLampiran', '$txtCabang', '$txtAlamat', 
                  '$txtPic', '$txtItso', '$txtHead', '$txtPermasalahan', '$txtKeterangan', '$txtSolusi', 
                  '$txtStatus')";   
    $myQry  = mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
    if($myQry){
      // Setelah data disimpan, Refresh
      echo "Data Berhasil disimpan";
      header("location: surat.php");
    }
    exit;
  } 
  $bulan = bulan();
}
# MEMBUAT NILAI DATA PADA FORM
$kodeBaru = kodeSurat();
$bulan = bulan();
$dataNo_surat = isset($_POST['$NoSurat'])? $_POST['$NoSurat'] : sprintf($kodeBaru).'/ITSO/'.$bulan.'/'.date('Y');
$dataTanggal  = isset($_POST['dataTanggal']) ? $_POST['dataTanggal'] : date('d-m-Y');
$dataNo_md    = isset($_POST['txtNo_md']) ? $_POST['txtNo_md'] : '';
$dataTgl_surat  = isset($_POST['txtTgl_surat']) ? $_POST['txtTgl_surat'] : '';
$dataLampiran  = isset($_POST['txtLampiran']) ? $_POST['txtLampiran'] : '';
$dataCabang    = isset($_POST['txtCabang']) ? $_POST['txtCabang'] : '';
$dataAlamat= isset($_POST['txtAlamat']) ? $_POST['txtAlamat'] : '';
$dataPic   = isset($_POST['txtPic']) ? $_POST['txtPic'] : '';
$dataItso   = isset($_POST['txtItso']) ? $_POST['txtItso'] : '';
$dataHead   = isset($_POST['txtHead']) ? $_POST['txtHead'] : '';
$dataPermasalahan   = isset($_POST['txtPermasalahan']) ? $_POST['txtPermasalahan'] : '';
$dataKeterangan  = isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : '';
$dataSolusi = isset($_POST['txtSolusi']) ? $_POST['txtSolusi'] : '';
$dataStatus    = isset($_POST['txtStatus']) ? $_POST['txtStatus'] : ''; 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Surat</title>
  <link rel="stylesheet" type="text/css" href="css/css.css">

<style type="text/css">
  .button{
    text-decoration: none;
    color: white;
    display: block;
    width: 100px;
    padding: 5px 10px;
    margin: 10px;
    font-size: 12px;
    text-align: center;
    border-radius: 7px;
  }
  .no-1{
    background-color: rgba(60, 189, 217, 1);
  }
  .no-1:hover{
    background-color: rgba(60, 189, 217, 0.8);
  }
.no-2{
    background-color: rgba(60, 189, 217, 1);
  }
  .no-2:hover{
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
  <div class="menu4sub"></div>
<form action="" method="post" name="form1" target="_self">             
  <table class="table-list" width="700" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <th colspan="3"><strong>TAMBAH DATA SURAT </strong><hr></th>
    </tr>
    <tr>
      <td width="181"><b>Kode</b></td>
      <td width="6"><b>:</b></td>
      <td  class="odd" width="491"><input name="textfield" type="text" value="<?php echo $kodeBaru; ?>" size="10" maxlength="10" readonly="readonly" /></td>
    </tr>
    <tr>
      <td><b>No.Surat </b></td>
      <td><b>:</b></td>
      <td  class="odd"><input name="NoSurat" type="text" value="<?php echo $dataNo_surat; ?>" size="40" maxlength="20" readonly="readonly" /></td>
    </tr>
    <tr>
      <td><b>Tanggal </b></td>
      <td><b>:</b></td>
      <td  class="odd"><input name="txtTanggal" type="text" value="<?php echo $dataTanggal; ?>"size="40" maxlength="20" readonly="readonly" /></td>
    </tr>
    <tr>
      <td><b>No. MD </b></td>
      <td><b>:</b></td>
      <td><input name="txtNo_md" type="text" value="<?php echo $dataNo_md; ?>" size="40" placeholder="No. MD" maxlength="20" /></td>
    </tr>
    <tr>
      <td><b>Tanggal MD </b></td>
      <td><b>:</b></td>
      <td><input name="txtTgl_surat" type="date" value="<?php echo $dataTgl_surat; ?>" size="30" maxlength="100" /></td>
    </tr>
    <tr>
      <td><b>Lampiran </b></td>
      <td><b>:</b></td>
      <td><input name="txtLampiran" type="text" value="<?php echo $dataLampiran; ?>" size="30" placeholder="Lampiran" maxlength="100" /></td>
    </tr>
    <tr>
      <td><b>Cabang </b></td>
      <td><b>:</b></td>
      <td><input name="txtCabang" type="text" value="<?php echo $dataCabang; ?>" size="30" placeholder="Cabang atau Divisi" maxlength="30" /></td>
    </tr>
    <tr>
      <td><b>Alamat </b></td>
      <td><b>:</b></td>
      <td><input name="txtAlamat" type="text" value="<?php echo $dataAlamat; ?>" size="30" placeholder="Alamat" maxlength="30" /></td>
    </tr>
    <tr>
      <td><b>PIC </b></td>
      <td><b>:</b></td>
      <td><input name="txtPic" type="text" value="<?php echo $dataPic; ?>" size="30" placeholder="PIC" maxlength="30" /></td>
    </tr>
    <tr>
      <td><b>ITSO HEAD </b></td>
      <td><b>:</b></td>
      <td><input name="txtItso" type="text" value="<?php echo $dataItso; ?>" size="30" placeholder="Head ITSO" maxlength="30" /></td>
    </tr>
    <tr>
      <td><b>Dept. Head IT Support Technical </b></td>
      <td><b>:</b></td>
      <td><input name="txtHead" type="text" value="<?php echo $dataHead; ?>" size="30" placeholder="Dept. Head IT Helpdeks" maxlength="30" /></td>
    </tr>
    <tr>
      <td><b>Permasalahan </b></td>
      <td><b>:</b></td>
      <td><textarea name="txtPermasalahan" type="text" value="<?php echo $dataPermasalahan; ?>" size="30" placeholder="Text Your Message" cols="50" rows="5" /></textarea> </td>
    </tr>
    <tr>
      <td><b>Rekomendasi </b></td>
      <td><b>:</b></td>
      <td><textarea name="txtKeterangan" type="text" value="<?php echo $dataKeterangan; ?>" size="30" placeholder ="Text Your Message" cols="50" rows="5"  /></textarea></td>
    </tr>
    <tr>
      <td><b>Solusi</b></td>
      <td><b>:</b></td>
      <td><input name="txtSolusi" type="text" value="<?php echo $dataSolusi; ?>" size="30" placeholder="Solusi"></td>
    </tr>
    <tr>
      <td><b>Status </b></td>
      <td><b>:</b></td>
      <td><input name="txtStatus" type="text" value="<?php echo $dataStatus; ?>" size="30" placeholder="Status" maxlength="30" /></td>
    </tr>
    <tr>
     <td align="center"><input name="btnSimpan" type="submit" value=" Simpan " class="button no-1" /></td>
      <td align="center"><input name="btnReset" type="reset" value="Reset" class="button no-2"></td>
    </tr>
  </table>
 </form>
</body>
</html>