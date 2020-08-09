<?php
	include_once('header.php');
	include_once('menu.php');
	?>
<p hidden><?php
## baca php.net/manual/en/function.error-reporting.php
error_reporting(E_ALL);

## baca php.net/manual/en/function.ini-set.php
## error diumpetin
ini_set('display_errors', 0);

echo $keterangan.$_POST['keterangan']; // padahal $keterangan undefined

$keterangan = $_POST['keterangan'];    // baru didefinisikan di sini
echo $keterangan."<br>";

## error GAK diumpetin
ini_set('display_errors', 1);


echo $keterangan."<br>";
?></p>

<?php
## baca php.net/manual/en/function.error-reporting.php
error_reporting(E_ALL);

## baca php.net/manual/en/function.ini-set.php
## error diumpetin
ini_set('display_errors', 0);

echo $nama_pengirim.$_POST['nama_pengirim']; // padahal $keterangan undefined

$nama_pengirim = $_POST['nama_pengirim'];    // baru didefinisikan di sini
echo $nama_pengirim."<br>";

## error GAK diumpetin
ini_set('display_errors', 1);


echo $nama_pengirim."<br>";
?>

	<p align="center">
<!DOCTYPE html>
<html lang="en">
	<title>Download File</title>
<head>
	<link rel="shortcut icon" href="../img/favicon.png"/>
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<style>
		body{
			background-image: url(img/body.jpg);
			background-repeat: repeat;
			background-attachment: fixed;
		}
	</style>
</head>
<body>

  <div class="container container-body">
   <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:50px 20px 10px 50px; margin-top:50px; margin-left:auto; margin-right:auto;">
    <h1>Download</h1>
    <hr>
    <?php

      function bytesToSize($bytes, $precision = 2){  
        $kilobyte = 1024;
        $megabyte = $kilobyte * 1024;
        $gigabyte = $megabyte * 1024;
        $terabyte = $gigabyte * 1024;
       
        if (($bytes >= 0) && ($bytes < $kilobyte)) {
          return $bytes . ' B';
        } elseif (($bytes >= $kilobyte) && ($bytes < $megabyte)) {
          return round($bytes / $kilobyte, $precision) . ' KB';
        } elseif (($bytes >= $megabyte) && ($bytes < $gigabyte)) {
          return round($bytes / $megabyte, $precision) . ' MB';
        } elseif (($bytes >= $gigabyte) && ($bytes < $terabyte)) {
          return round($bytes / $gigabyte, $precision) . ' GB';
        } elseif ($bytes >= $terabyte) {
          return round($bytes / $terabyte, $precision) . ' TB';
        } else {
          return $bytes . ' B';
        }
      }
    ?>

    <table id="table-data" class="table table-striped table-hover">
	<thead>
      <tr>
        <th>NO.</th>
        <th>FILE NAME</th>
		<th>NAMA PENGIRIM</th>
		<th>KETERANGAN</th>
        <th>FILE SIZE</th>
        <th>FILE TYPE</th>
        <th>OPSI</th>
      </tr>
	 </thead>
	 <tbody>
      <?php
      $sql = $conn->query("SELECT * FROM uploads ORDER BY id DESC");
      if($sql->num_rows > 0){
        $no = 1;
        while($row = $sql->fetch_assoc()){
          echo '
          <tr>
            <td>'.$no.'</td>
            <td>'.$row['file_name'].'</td>
			<td>'.$row['nama_pengirim'].'</td>
			<td>'.$row['keterangan'].'</td>
            <td>'.bytesToSize($row['file_size']).'</td>
            <td>'.$row['file_type'].'</td>
            <td><a href="../uploads/'.$row['file_name'].'" class="tip"><span class="icon-download"></span></a>
			<a href="delete.php?id='.$row['id'].'" class="tip"><span class="icon-remove"></span></a>
          </tr>
          ';
          $no++;
        }
      }else{
        echo '<tr><td colspan="5">Tidak ada data</td></tr>';
      }
      ?>
    </tbody>
	

    <hr>

  </div>


    <script>
    $(document).ready(function(){
        $('#table-data').DataTable();
    });
</script>
</table>
</html>
</body>