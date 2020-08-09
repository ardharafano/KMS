<?php
	session_start();
	include_once('admin.session.php');
	$id	= $_GET['id'];
	$sql	= $conn->query("delete from harga_pakan where id='$id'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='harga.pakan.php?hal=1';
			</script>";
?>