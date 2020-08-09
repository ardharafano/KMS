<?php
	session_start();
	include_once('admin.session.php');
	$kode	= $_GET['kode'];
	$conn->query("delete from penyakit where kode_penyakit='$kode'");
	$conn->query("delete from penyakit_gejala where kode_penyakit='$kode'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='penyakit.php?hal=1';
			</script>";
?>