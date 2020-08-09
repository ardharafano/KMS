<?php
	session_start();
	include_once('admin.session.php');
	$inf	= $_GET['inf'];
	$sql	= $conn->query("delete from peralatan_broiler where id_informasi='$inf'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='peralatan.broiler.php?hal=1';
			</script>";
?>