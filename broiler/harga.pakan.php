<?php
	include_once('header.php');
	include_once('menu.php');
	?>
	
	<p align="center">
<!DOCTYPE html>
<html lang="en">
	<title>Harga Pakan</title>
<head>
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
			<br><br><br><br>
			
			<nav class="navbar navbar-default">
			<div class="container-fluid">
			<div class="navbar-header">
			</div>
			<ul class="nav navbar-nav">
			<li><a href="index.php?hal=1"><b>Tentang Ayam Broiler</b></a></li>
			<li><a href="peralatan.broiler.php?hal=1"><b>Peralatan & Perkandangan</b></a></li>
			<li><a href="harga.pakan.php?hal=1"><b>Harga Pakan</b></a></li>
			</ul>
			</div>
			</nav>
    <table id="table-data" class="table table-striped table-hover">
	<thead>
      <tr>
        <th>NO.</th>
        <th>KODE</th>
		<th>NAMA BARANG</th>
		<th>JENIS</th>
        <th>HARGA</th>
        <th>JUMLAH</th>
      </tr>
	 </thead>
	 <tbody>
      <?php
	  	
      $sql = $conn->query("select * from harga_pakan ORDER BY id DESC");
      if($sql->num_rows > 0){
        $no = 1;
        while($row = $sql->fetch_assoc()){
          echo '
          <tr>
            <td>'.$no.'</td>
			<td>'.$row['kode'].'</td>
			<td>'.$row['nama'].'</td>
            <td>'.$row['jenis'].'</td>
            <td>Rp.'.$row['harga'].',-</td>
			<td>'.$row['jumlah'].'</td>
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