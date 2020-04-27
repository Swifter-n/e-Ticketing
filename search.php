
<?php
include "library/inc.koneksi.php";
 include_once "library/inc.library.php";

  $pencarianSQL = "";

if(isset($_POST['btnCari'])) {
  $txtKataKunci = trim($_POST['txtKataKunci']);


  $pencarianSQL = "WHERE cabang='$txtKataKunci' OR pic LIKE '%$txtKataKunci%' ";
}


$dataKataKunci = isset($_POST['txtKataKunci']) ? $_POST['txtKataKunci'] : '';



$baris  = 50;
$hal  = isset($_GET['hal']) ? $_GET['hal'] : 1;
$pageSql= "SELECT * FROM surat $pencarianSQL";
$pageQry= mysql_query($pageSql, $koneksidb) or die ("error paging: ".mysql_error());
$jumlah = mysql_num_rows($pageQry);
$maks = ceil($jumlah/$baris);
$mulai  = $baris * ($hal-1);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Halaman Search</title>
  <link rel="stylesheet" type="text/css" href="css/css.css">
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
    }
    </style>
</head>
  <body>
  <div class="menu4">
    <a href="home.php"><span>Home</span></a>
    <a href="surat.php" class="current"><span>Surat</span></a>
    <a href="laporan_surat.php"><span>Laporan</span></a>
  </div><br/>
  <div>
      <h1 align="center"><b>DATA SURAT </b></h1>
    
  </div><br/>
  <div class="menu4sub"></div>
  <table width="100%" border="0" cellspacing="1" cellpadding="3" class="table-border">
    <tr>
      <td colspan="2">
        <form action="" method="post" name="form1" target="_self" id="form1">
          <table  class="table-list" width="100%" border="0" cellspacing="1" cellpadding="3">
            <tr>
              <td colspan="2" bgcolor="#ffa31a"><strong>PENCARIAN</strong></td>
            </tr>
            <tr>
              <td width="30%"><img src="images/ebook.png"><strong>Search (Cabang and Divisi / PIC)</strong> </td>
              <table> </table><input name="txtKataKunci" type="text" value="<?php echo $dataKataKunci; ?>" size="35" maxlength="100" />
            <input name="btnCari" type="submit" value=" Cari " class="button no-1" />
              </td>
            </tr>
          </table>
        </form>
      </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">
        <table id="tableList" summary="Search Data">
          <tr>
            <th scope="col"><strong>No</strong></th>
            <th scope="col"><strong>No.Surat</strong></th>
            <th scope="col"><strong>Cabang</strong></th>
            <th scope="col"><strong>Alamat</strong></th>
            <th scope="col"><strong>Permasalahan</strong></th>
            <th scope="col"><strong>Rekomendasi</strong></th>
            <th scope="col" colspan="3" align="center"><strong>Tools</strong></th>
          </tr>
         <?php
  $mySql = "SELECT * FROM surat $pencarianSQL ORDER BY id ASC LIMIT $mulai, $baris";
  $myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error()); 
  $nomor = $mulai; 
  while ($myData = mysql_fetch_array($myQry)) {
            $nomor++;
            $kode = $myData['id'];
  ?>    
          <tr>
            <td> <?php echo $nomor; ?> </td> 
            <td> <?php echo $myData['no_surat']; ?> </td>
            <td> <?php echo $myData['cabang']; ?> </td>
            <td> <?php echo $myData['alamat']; ?> </td>
            <td> <?php echo $myData['permasalahan']; ?> </td>
            <td> <?php echo $myData['keterangan']; ?> </td>
            <td><button><a href="surat_edit.php?kode=<?php echo $kode; ?>" target="_self" alt="Edit Data Data" class="line">Edit</a></td></button>
             <td><button><a href="surat_delete.php?kode=<?php echo $kode; ?>" target="_self" alt="Delete Data" onclick="return confirm('YAKIN AKAN MENGHAPUS DATA SURAT INI ... ?')" class="line">Delete</a></td></button>
             <td><button><a href="cetak_surat.php?kode=<?php echo $kode; ?>" target="_self" alt="Print Data" onclick="return confirm('ANDA YAKIN INGIN PRINT SURAT INI ... ?')" class="line">Print</a></td></button>
             
          
          </tr> 
        <?php } ?>
        </table>
      </td>
    </tr>
    </table>
    </body>
    </html>