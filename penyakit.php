<?php
	include_once('header.php');
	include_once('menu.php');
	?>
	
	<p align="center">
<!DOCTYPE html>
<html lang="en">
	<title>Penyakit Ayam dan Solusi</title>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
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
    <table id="table-data" class="table table-striped table-hover">
	<thead>
    <center><a href="konsultasi/index.php" target='blank'><input name="tambah" type="submit" id="tambah" value="Konsultasikan Penyakit Ayam Anda" class="btn btn-danger"></a></center> 
	  <tr>
        <th>NO.</th>
        <th>KODE</th>
		<th>NAMA PENYAKIT</th>
		<th>KETERANGAN</th>
        <th>SOLUSI</th>
      </tr>
	 </thead>
	 <tbody>
      <?php
	  	
      $sql = $conn->query("select * from penyakit ORDER BY kode_penyakit ASC");
      if($sql->num_rows > 0){
        $no = 1;
        while($row = $sql->fetch_assoc()){
          echo '
          <tr>
            <td>'.$no.'</td>
			<td>'.$row['kode_penyakit'].'</td>
			<td>'.$row['nama_penyakit'].'</td>
            <td>'.$row['ket'].'</td>
			<td>'.$row['solusi'].'</td>
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
<center><div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.2&appId=111648572203663&autoLogAppEvents=1"></script>


<div class="fb-comments"></div></center>
<br><br><br><br>
</html>
</body>