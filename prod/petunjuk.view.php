<?php
	include_once('header.php');
	include_once('menu.php');
	?>
<?php
	include_once('header.php');
	$id_informasi	= $_GET['id'];
	$sql	= $conn->query("select * from petunjuk_teknis where id_informasi='$id_informasi'");
	$data	= mysqli_fetch_array($sql);
	if(mysqli_num_rows($sql) > 0){
		$judul	= $data['judul'];
		$kategori	= $data['kategori'];
		$isi	= $data['isi'];
		$tgl	= $data['tgl'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Artikel - <?php echo "$judul";?></title>
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
?>
<br>
<br>
<br>
<div class="container">
<a class="btn" href="petunjuk.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<table class="table">
		<tr>
			<td>Tanggal</td>
			<td><?php echo "$tgl";?><td>
		</tr>
		<tr>
			<td>Judul</td>
			<td><?php echo "$judul";?><td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td><?php echo "$kategori";?><td>
		</tr>
		<tr>
			<td>Isi</td>
			<td><?php echo "$isi";?><td>
		</tr>
	</table>

<center><div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.2&appId=111648572203663&autoLogAppEvents=1"></script>


<div class="fb-comments"></div></center>
<br><br><br><br>

	<?php } ?>
</body>
</html>