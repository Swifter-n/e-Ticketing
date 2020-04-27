<?php
  include_once "library/inc.koneksi.php";
  include_once "library/inc.library.php";

 $dataSurat    = isset($_POST['cmbsurat']) ? $_POST['cmbsurat'] : '';
$filterSQL  = "";

if(isset($_POST['btnPilih1'])) {
  $filterSQL = " WHERE surat.no_surat LIKE '%{$dataSurat}'";
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
    <title>Halaman Surat</title>
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery-ui/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">
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
  </style>
  </head>
  <body>
  <div class="menu4">
    <a href="home.php"><span>Home</span></a>
    <a href="surat.php" class="current"><span>Surat</span></a>
    <a href="laporan_surat.php"><span>Laporan</span></a>
  </div>
  <div class="menu4sub"></div>
  <div>
      <h1 align="center"><b>DATA TICKET </b></h1>
      </div>
  <table width="700" border="0" cellspacing="1" cellpadding="3" class="table-border">
    
    <tr>
      <td colspan="2">
        <form action="" method="post" name="form1" target="_self" id="form1">
          <table  class="table-list" width="100%" border="0" cellspacing="1">
            <tr>
            <td colspan="2"  bgcolor=#ffa31a><strong>Filter</strong></td>
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
        </form>
<tr>
      </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td <td colspan="2">
      <div class="container">
        <table id="tableList" width="100%" border="0" cellspacing="1" cellpadding="3" summary="Data Surat">
        <thead>
          <tr>
            <th scope="col"><strong>No</strong></th>
            <th scope="col"><strong>No.Surat</strong></th>
            <th scope="col"><strong>Tgl Surat</strong></th>
            <th scope="col"><strong>No. MD</strong></th>
            <th scope="col"><strong>Lampiran</strong></th>
            <th scope="col"><strong>Cabang</strong></th>
            <th scope="col"><strong>Alamat</strong></th>
            <th scope="col"><strong>PIC</strong></th>
            <th scope="col"><strong>IT SO HEAD</strong></th>
            <th scope="col"><strong>Dept. IT HEAD</strong></th>
            <th scope="col"><strong>Permasalahan</strong></th>
            <th scope="col"><strong>Rekomendasi</strong></th>
            <th scope="col"><strong>Solusi</strong></th>
            <th scope="col" colspan="3" align="center"><strong>Tools</strong></th>
          </tr>
          </thead>
         <?php
  $mySql = "SELECT * FROM surat $filterSQL ORDER BY id ASC LIMIT $mulai, $baris";
  $myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error()); 
  $nomor = $mulai; 
  while ($myData = mysql_fetch_array($myQry)) {
            $nomor++;
            $kode = $myData['id'];
  ?>    <tbody>
          <tr>
            <td> <?php echo $nomor; ?> </td> 
            <td> <?php echo $myData['no_surat']; ?> </td>
            <td> <?php echo $myData['tgl_surat']; ?> </td>
            <td> <?php echo $myData['no_md']; ?> </td>
            <td> <?php echo $myData['lampiran']; ?> </td>
            <td> <?php echo $myData['cabang']; ?> </td>
            <td> <?php echo $myData['alamat']; ?> </td>
            <td> <?php echo $myData['pic']; ?> </td>
            <td> <?php echo $myData['itso_head']; ?> </td>
            <td> <?php echo $myData['head_helpdeks']; ?> </td>
            <td> <?php echo $myData['permasalahan']; ?> </td>
            <td> <?php echo $myData['keterangan']; ?> </td>
            <td> <?php echo $myData['solusi']; ?> </td>
            <td><a href="surat_edit.php?kode=<?php echo $kode; ?>" target="_self" alt="Edit Data">Edit</a></td>
            <td><a href="surat_delete.php?kode=<?php echo $kode; ?>" target="_self" alt="Delete Data" onclick="return confirm('YAKIN AKAN MENGHAPUS DATA SURAT INI ... ?')">Delete</a></td>
            <td><a href="cetak_surat.php?kode=<?php echo $kode; ?>" target="_self" alt="Print Data" onclick="return confirm('ANDA YAKIN INGIN PRINT SURAT INI ... ?')">Print</a></td></td>
          </tr> 
        <?php } ?>
        </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td width="334" bgcolor="#f39c12"><b>Jumlah Data :<?php echo $jumlah; ?></b>
      <td width="351" align="right" bgcolor="#f39c12"><b>Halaman ke :</b>
        <?php
          for ($h = 1; $h <= $maks; $h++) {
            echo "<a href='surat.php?hal=$h'>$h</a>";
          }
        ?>
      </td>
    </tr>
    </table>
    </td>
  </body>
</html>