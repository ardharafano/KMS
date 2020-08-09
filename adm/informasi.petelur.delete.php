<?php
	session_start();
	include_once('admin.session.php');
	$id		= $_GET['id'];
	$sql	= $conn->query("delete from artikel_petelur where id_informasi='$id'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='informasi.petelur.php?hal=1';
			</script>";
?>