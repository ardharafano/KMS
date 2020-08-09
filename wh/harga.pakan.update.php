<?php
	session_start();
	include_once('admin.session.php');
	$inf	= $_GET['inf'];
	$sql	= $conn->query("select * from harga_pakan where id='$inf'");
	$data	= mysqli_fetch_array($sql);
	if(mysqli_num_rows($sql) > 0){
		$kode	= $data['kode'];
		$nama	= $data['nama'];
		$jenis	= $data['jenis'];
		$harga	= $data['harga'];
		$jumlah	= $data['jumlah'];
		$ket	= $data['ket'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Informasi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="../img/favicon.png"/>
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
    
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
			<div class="modal-header">
            	<h3>Edit Informasi</h3>
            </div>
            <div style="margin-top:10px;">
            	<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" for="kode">kode</label>
                        <div class="controls">
                            <input name="kode" type="text" id="kode" class="input-xxlarge" value='<?php echo "$kode";?>'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="nama">nama</label>
                        <div class="controls">
                            <input name="nama" type="text" id="nama" class="input-xxlarge" value='<?php echo "$nama";?>'>
                        </div>
                    </div>
					                    <div class="control-group">
                        <label class="control-label" for="jenis">jenis</label>
                        <div class="controls">
                            <input name="jenis" type="text" id="jenis" class="input-xxlarge" value='<?php echo "$jenis";?>'>
                        </div>
                    </div>
					                    <div class="control-group">
                        <label class="control-label" for="harga">harga</label>
                        <div class="controls">
                            <input name="harga" type="text" id="harga" class="input-xxlarge" value='<?php echo "$harga";?>'>
                        </div>
                    </div>
					                    <div class="control-group">
                        <label class="control-label" for="jumlah">jumlah</label>
                        <div class="controls">
                            <input name="jumlah" type="text" id="jumlah" class="input-xxlarge" value='<?php echo "$jumlah";?>'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="ket">Keterangan</label>
                        <div class="controls">
                            <select class="input-small" name="ket">
                           
                                <option value="<?php echo $ket ?>"><?php echo $ket ?></option>
                           
                                <option value=""></option>
                                <option value="Show">Show</option>
                                <option value="Hide">Hide</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label" for="update"></label>
                        <div class="controls">
	                    	<input name="update" type="submit" id="update" value="Update" class="btn btn-success">
                            <input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
						</div>
                    </div>
                    
                    <?php }
						if(isset($_POST['update'])){
							$conn->query("update harga_pakan set
											kode	= '$_POST[kode]',
											nama		= '$_POST[nama]',
											jenis	= '$_POST[jenis]',
											harga		= '$_POST[harga]',
											jumlah	= '$_POST[jumlah]',
											ket		= '$_POST[ket]'
											where id='$inf'") or die(mysqli_error);
								
							echo "<script language=javascript>
								window.alert('Edit Berhasil');
								window.location='harga.pakan.php?hal=1';
								</script>";
							exit;
						}
						
						if(isset($_POST['batal'])){
							echo "<script language=javascript>
								window.location='harga.pakan.php?hal=1';
								</script>";
							exit;
						}
					?>
                </form>
			</div>
    	</div>
</div>

<br><br><br><br>
<?php include_once('../footer.php'); ?>
<script src="../js/jquery-1.8.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>