<?php
	session_start();
	include_once('admin.session.php');
	$inf	= $_GET['inf'];
	$sql	= $conn->query("delete from peralatan_petelur where id_informasi='$inf'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='peralatan.petelur.php?hal=1';
			</script>";
?>