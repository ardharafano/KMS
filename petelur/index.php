<?php
	include_once('header.php');
	?>
	
	<p align="center">
<!DOCTYPE html>
<html lang="en">
	<title>Artikel Ayam Petelur</title>
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
    <table id="table-data" class="table table-striped table-hover">
	<thead>
      <tr>
        <th>NO.</th>
		<th>TANGGAL</th>
        <th>JUDUL</th>
		<th>KATEGORI</th>
		<th>OPSI</th>
      </tr>
	 </thead>
	 <tbody>
      <?php
	  	
      $sql = $conn->query("select * from artikel_petelur ORDER BY id_informasi DESC");
      if($sql->num_rows > 0){
        $no = 1;
        while($row = $sql->fetch_assoc()){
          echo '
          <tr>
            <td>'.$no.'</td>
			<td>'.$row['tgl'].'</td>
			<td>'.$row['judul'].'</td>
			<td>'.$row['kategori'].'</td>
			<td><a href="artikel.php?id='.$row['id_informasi'].'" class="btn btn-success">View</td>
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
<br><br><br><br>
</html>
</body>