<?php
  include_once "library/inc.koneksi.php";
  include_once "library/inc.library.php";


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
    .find{margin-bottom: 20px}
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
      <h1 align="center"><b>View Ticket Status</b></h1>
      </div>
      <div class="find">
        <form method="post" action="">
          <p>Nomer Ticket</p>
          <input type="text" name="cari"/>
          <input type="submit" name="kirim" value="Find Ticket">
        </form>
      </div>
      <div class="container">
        <table id="tableList" width="100%" border="0" cellspacing="1" cellpadding="3" summary="Data Surat">
        <thead>
          <tr>
            <th scope="col"><strong>No</strong></th>
            <th scope="col"><strong>No.Surat</strong></th>
            <th scope="col"><strong>Cabang</strong></th>
            <th scope="col"><strong>Alamat</strong></th>
            <th scope="col"><strong>Permasalahan</strong></th>
            <th scope="col"><strong>Rekomendasi</strong></th>
            <th scope="col"><strong>Solusi</strong></th>
            <th scope="col"><strong>Status</strong></th>

          </tr>
          </thead>
         <?php
  if(isset($_POST['kirim'])){   
  $cari = $_POST['cari'];    
  $myQry = mysql_query("SELECT * FROM surat WHERE no_surat LIKE '%$cari%'");
  }else{
    $myQry = mysql_query("SELECT * FROM surat");
  }
  $nomor = 0;
  while ($myData = mysql_fetch_array($myQry)) {
            $nomor++;
            $kode = $myData['id'];
  ?>    <tbody>
          <tr>
            <td> <?php echo $nomor; ?> </td> 
            <td> <?php echo $myData['no_surat']; ?> </td>
            <td> <?php echo $myData['cabang']; ?> </td>
            <td> <?php echo $myData['alamat']; ?> </td>
            <td> <?php echo $myData['permasalahan']; ?> </td>
            <td> <?php echo $myData['keterangan']; ?> </td>
            <td> <?php echo $myData['solusi']; ?> </td>
            <td> <?php echo $myData['status']; ?> </td>
          </tr> 
        <?php } ?>
        </tbody>
        </table>
      </td>
    </tr>
    </table>
    </td>
  </body>
</html>