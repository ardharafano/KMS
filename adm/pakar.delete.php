<?php
	session_start();
	include_once('admin.session.php');
	$kode	= $_GET['kode'];
	$sql	= $conn->query("delete from kasus where kode_penyakit='$kode'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='pakar.php';
			</script>";
?>