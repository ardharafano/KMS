<?php
	include_once('header.php');
	$id_informasi	= $_GET['id'];
	$sql	= $conn->query("select * from artikel_pedaging where id_informasi='$id_informasi'");
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
<div class="container">
<a class="btn" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
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
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_telegram"></a>
<a class="a2a_button_google_gmail"></a>
</div></div>
<script async src="https://static.addtoany.com/menu/page.js"></script>

<center><div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.2&appId=111648572203663&autoLogAppEvents=1"></script>


<div class="fb-comments"></div></center>
<br><br><br><br>

	<?php } ?>
</body>
</html>