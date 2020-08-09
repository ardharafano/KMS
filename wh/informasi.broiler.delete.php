<?php
	session_start();
	include_once('admin.session.php');
	$id	= $_GET['id'];
	$sql	= $conn->query("delete from artikel_pedaging where id_informasi='$id'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='informasi.broiler.php?hal=1';
			</script>";
?>