<?php
	session_start();
	include_once('admin.session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tambah Informasi</title>
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
	include_once('header.php');
	include_once('menu.php');
?>
<div class="container">
        <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
			<div class="modal-header">
            	<h3>Tambah Informasi</h3>
            </div>
            <div style="margin-top:10px;">
            	<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" for="kode">Kode</label>
                        <div class="controls">
                            <input name="kode" type="text" id="kode" class="input-xxlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="isi">nama</label>
                        <div class="controls">
                        	<textarea name="nama" type="text" id="nama" rows="7" class="input-xxlarge"></textarea>
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" for="isi">jenis</label>
                        <div class="controls">
                        	<textarea name="jenis" type="text" id="jenis" rows="7" class="input-xxlarge"></textarea>
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" for="isi">harga</label>
                        <div class="controls">
                        	<textarea name="harga" type="text" id="harga" rows="7" class="input-xxlarge"></textarea>
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" for="isi">jumlah</label>
                        <div class="controls">
                        	<textarea name="jumlah" type="text" id="jumlah" rows="7" class="input-xxlarge"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="ket">Keterangan</label>
                        <div class="controls">
                            <select class="input-small" name="ket">
                                <option value="Show">Show</option>
                                <option value="Hide">Hide</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label" for="simpan"></label>
                        <div class="controls">
	                    	<input name="simpan" type="submit" id="simpan" value="Simpan" class="btn btn-success">
                            <input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
						</div>
                    </div>
                    
                    <?php
						if(isset($_POST['simpan'])){
							$conn->query("insert into harga_pakan (kode, nama, jenis, harga, jumlah,  ket) values ('$_POST[kode]', '$_POST[nama]', '$_POST[jenis]', '$_POST[harga]', '$_POST[jumlah]', '$_POST[ket]')")
							or die(mysqli_error);
								
							echo "<script language=javascript>
								window.alert('Simpan Berhasil');
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

</body>
</html>