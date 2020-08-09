<?php include_once('header.php');
include_once('menu.php'); ?>
			<?php
			$username = $_SESSION['username']; // mengambil username dari session yang login
			
			$sql = $conn->query("SELECT * FROM admin WHERE username='$username'"); // query memilih entri username pada database
			if(mysqli_num_rows($sql) == 0){
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
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

<p hidden><?php
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
?></p>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Upload File</title>
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

 

 <div class="container">
        <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:50px 20px 10px 50px; margin-top:50px; margin-left:auto; margin-right:auto;">
			<div>
            	<div class="modal-header">
                	<h3>Upload</h3>
                </div>


    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="form-group">
		  		<table class="table" border =2>
			   <tr>
			   <td>Nama Pengirim: <input type="text" name="nama_pengirim" value="<?php echo $row['level']; ?>"></td>
			   <td>Keterangan: <input type="text" name="keterangan"></td></tr></table>
            <div class="col-md-10">
              <input type="file" name="myFile" class="filestyle" data-icon="false">
			   <form action="edit.php" method="post">
            </div>
            <div class="col-md-2">
              <input type="submit" name="upload" class="btn btn-primary" value="Upload">
            </div>
          </div>
        </form>

        <?php
        // definisi folder upload
        define("UPLOAD_DIR", "../uploads/");

        if (!empty($_FILES["myFile"])) {
          $myFile = $_FILES["myFile"];
          $ext    = pathinfo($_FILES["myFile"]["name"], PATHINFO_EXTENSION);
          $size   = $_FILES["myFile"]["size"];
          $tgl   = date("Y-m-d");

          if ($myFile["error"] !== UPLOAD_ERR_OK) {
            echo '<div class="alert alert-warning">Gagal upload file.</div>';
            exit;
          }

          // filename yang aman
          $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

          // mencegah overwrite filename
          $i = 0;
          $parts = pathinfo($name);
          while (file_exists(UPLOAD_DIR . $name)) {
            $i++;
            $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
          }

          // upload file
          $success = move_uploaded_file($myFile["tmp_name"],
            UPLOAD_DIR . $name);
          if (!$success) { 
            echo '<div class="alert alert-warning">Gagal upload file.</div>';
            exit;
          }else{

            $insert = $conn->query("INSERT INTO uploads(tgl_upload, file_name, nama_pengirim, keterangan, file_size, file_type) VALUES('$tgl', '$name', '$nama_pengirim', '$keterangan', '$size', '$ext')");
            if($insert){
              echo '<div class="alert alert-success">File berhasil di upload.</div>';
            }else{
              echo '<div class="alert alert-warning">Gagal upload file.</div>';
              exit;
            }
          }

          // set permisi file
          chmod(UPLOAD_DIR . $name, 0644);
        }
        ?>

      </div>
    </div>



    <hr>

  </div>

</body>
</html>