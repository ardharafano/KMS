<?php
	include_once('header.php');
	include_once('menu.php');
	?>
	
	<p align="center">
<!DOCTYPE html>
<html lang="en">
	<title>Gejala</title>
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

					<div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:70px; margin-left:auto; margin-right:auto;">
			<h3>Gejala</h3>
			<br>
			
			<a href="gejala.add.php"><input name="tambah" type="submit" id="tambah" value="Tambah Data" class="btn btn-danger"></a>
    <table id="table-data" class="table table-striped table-hover">
	<thead>
      <tr>
        <th>NO.</th>
        <th>KODE GEJALA</th>
		<th>NAMA GEJALA</th>
		<th>BOBOT</th>
        <th>OPSI</th>
      </tr>
	 </thead>
	 <tbody>
      <?php
      $sql = $conn->query("select * from gejala ORDER BY id_gejala");
      if($sql->num_rows > 0){
        $no = 1;
        while($row = $sql->fetch_assoc()){
          echo '
          <tr>
            <td>'.$no.'</td>
			<td>'.$row['kode_gejala'].'</td>
			<td>'.$row['nama_gejala'].'</td>
            <td>'.$row['bobot'].'</td>
			<td><a href="gejala.update.php?kode='.$row['kode_gejala'].'" class="btn btn-primary btn-info">Edit</a>
			<a href="gejala.delete.php?kode='.$row['kode_gejala'].'" class="btn btn-primary btn-danger">Delete</a></td>
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