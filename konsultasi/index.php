<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Konsultasi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="../img/favicon.png"/>
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    
	<style>
		body{
			background-image: url(./img/body.jpg);
			background-repeat: repeat;
			background-attachment: fixed;
		}
	</style>
</head>

<body>
<?php
	include_once '../lib/database.php';
	include_once 'header.php';
?>
<div class="container">
        <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
			<div>
            	<div class="modal-header">
                	<center><h4>Daftar Konsultasi</h4></center>
                </div>
                <center><div style="margin-top:10px">
                    <form name="form1" method="post" action="" enctype="multipart/form-data">
                        <div class="control-group">
                            <div class="controls">
                                <input name="nama" type="text" id="nama" class="input-large" placeholder="Nama.." required>
                            </div>
						</div>
                        <div class="control-group">
                            <div class="controls">
                                <select name="jenis_ayam"><option value="" >Silahkan Pilih</option>
								<option value="Ayam Pedaging">Ayam Pedaging</option>
								<option value="Ayam Petelur">Ayam Petelur</option></select>
                            </div>
						</div>
						 <div class="control-group">
                            <div class="controls">
                                <input name="alamat" type="text" id="alamat" class="input-large" placeholder="Email..." required>
                            </div>
						</div>
						 <div class="control-group">
                            <div class="controls">
                                <input name="nohp" type="text" id="nohp" class="input-large" placeholder="Nohp..." required>
                            </div>
						</div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="next" id="next" value="Konsultasi" class="btn btn-success">
                               <a href="../" class="btn btn-warning">Back</a> 
							</div>
						</div></center>
                                        
						<div style="margin-top:10px">
						<center><div class="span6"></center>
                    	<div class="text-left" align="justify">
                    		<div align="justify">
							<?php 
							include"cara.php"; ?>					
							</div>
							</div>
						</div>
						<?php
                            if(isset($_POST['next'])){
                                $query = $conn->query("insert into user (nama,jenis_ayam,alamat, nohp, tgl_konsultasi) values ('$_POST[nama]', '$_POST[jenis_ayam]','$_POST[alamat]','$_POST[nohp]', NOW())") or die(mysqli_error());
                                if($query){
                                    
                                    $s = $conn->query("select * from user order by id_user desc") or die(mysqli_error());
                                    $r = mysqli_fetch_array($s);
                                    $_SESSION['nama']	= "$r[nama]";
                                    $_SESSION['id']		= "$r[id_user]";
									echo "<script language=javascript>
											window.location='konsultasi.form.php?id=$_SESSION[id]';
											</script>";
									exit;
                                }
                            }
                        ?>
                    </form>
                </div>
			</div>
    	</div>
</div>

<br><br><br><br>
<script src="../js/jquery-1.8.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>