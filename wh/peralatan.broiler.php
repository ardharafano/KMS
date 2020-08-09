<?php
	session_start();
	include_once('admin.session.php');

	$i = 1;
	$jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
	$jml_data = mysqli_num_rows($conn->query("select * from peralatan_broiler"));
	$jml_halaman = ceil($jml_data / $jml_per_halaman);
	
	if(isset($_GET['hal'])){
		
			$hal = $_GET['hal'];
			$i = ($hal - 1) * $jml_per_halaman  + 1;
			$s = $conn->query("select * from peralatan_broiler order by id_informasi desc limit ".(($hal - 1) * $jml_per_halaman).", $jml_per_halaman");
		
	}else{
		$s = $conn->query("select * from peralatan_broiler order by id_informasi desc limit 0, $jml_per_halaman")
				or die(mysqli_error());
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Informasi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="../img/favicon.png"/>
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    
	<style>
		body{
			background-image: url(../img/body.jpg);
			background-repeat: repeat;
			background-attachment: fixed;
		}
	</style>
</head>

<body>

<?php
	include_once('menu.php');
?>
<div class="container">
        <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
			<div>
            	<div class="modal-header">
                	<h3>List Informasi</h3>
                </div>
				<div class="container container-body">
			<br>
			
			<nav class="navbar navbar-default">
			<div class="container-fluid">
			<div class="navbar-header">
			</div>
			<ul class="nav navbar-nav">
			<li><a href="informasi.broiler.php?hal=1"><b>Tentang Ayam Broiler</b></a></li>
			<li><a href="peralatan.broiler.php?hal=1"><b>Peralatan & Perkandangan</b></a></li>
			<li><a href="harga.pakan.php?hal=1"><b>Harga Pakan</b></a></li>
			</ul>
			</div>
			</nav>				
            	<div style="margin-top:10px" class="text-right">
            		<a href="peralatan.broiler.add.php"><input name="tambah" type="submit" id="tambah" value="Tambah Data" class="btn btn-danger"></a>
                </div>
                <div style="margin-top:10px">
                    <table class="table table-condensed table-bordered table-hover">
                    <thead>
                    	<td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>No</h5></font></td>
                        <td width="25%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Judul</h5></font></td>
                        <td width="35%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Isi</h5></font></td>
                        <td width="15%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Tanggal</h5></font></td>
                        <td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Keterangan</h5></font></td>
                        <td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5><span class="icon-wrench"></span></h5></font></td>
                    </thead>
                    <?php 
						while($data=mysqli_fetch_array($s)){
							$id=$data['id_informasi'];
							$judul=$data['judul'];
							$isi=$data['isi'];
							$tgl=$data['tgl'];
							$ket=$data['ket'];
                    ?>
                    <tbody>
                    	<td><font face="Comic Sans MS, cursive" class="text-info text-center"><h5><?php echo $i ?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-error text-center"><h5><?php echo "$judul";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$isi";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-center"><h5><?php echo "$tgl";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-center"><h5><?php echo "$ket";?></h5></font></td>
                        <td>
                        	<font face="Comic Sans MS, cursive" class="text-info text-center"><h5>
                                <a class="tip" href="peralatan.broiler.update.php?inf=<?php echo $id;?>" data-toggle="tooltip" data-placement="bottom"
                                    title="Edit"><span class="icon-pencil"></span></a>
                                <a class="tip" href="peralatan.broiler.delete.php?inf=<?php echo $id;?>" data-toggle="tooltip" data-placement="bottom"
                                    title="Hapus"><span class="icon-remove"></span></a>
							</h5></font>
						</td>
                    </tbody>
                    <?php $i++; } ?>
                    </table>
                    </div>
                    
                    <div class="pagination pagination-centered">
                        <ul>
                            <?php for($i = 1; $i <= $jml_halaman; $i++) { ?>
                                <li><a href="peralatan.broiler.php?hal=<?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                </div>
			</div>
    	</div>
</div>

<br><br><br><br>
<?php include_once('../footer.php'); ?>
<script src="../js/jquery-1.8.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>