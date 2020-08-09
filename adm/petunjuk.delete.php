<?php
	session_start();
	include_once('admin.session.php');
	$id	= $_GET['id'];
	$sql	= $conn->query("delete from petunjuk_teknis where id_informasi='$id'"); 
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='petunjuk.php?hal=1';
			</script>";
?>