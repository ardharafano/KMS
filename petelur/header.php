<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
	session_start();
	include '../lib/database.php';
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="../img/favicon.png"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    
	<style>
		body{
			background-image: url(img/body.jpg);
			background-repeat: repeat;
			background-attachment: fixed;
		}
	</style>
</head>

<body>
<div class="container">
	<div class="navbar-inner" style="border:0px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:45px; margin-left:auto; margin-right:auto;">
    	<div style="margin-top:2px; margin-bottom:2px; margin-left:auto; margin-right:auto;">

            <table border="0" cellpadding="5" cellspacing="0" align="left">
                <tr>
                	<td width="15%" align="center">
                    	<b>KNOWLEDGE MANAGEMENT SYSTEM BUDIDAYA AYAM PEDAGING DAN AYAM PETELUR</b>
					</td>
					
				</tr>
			</table>

		</div>
	</div>
    
</div>

<div class="container">
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
            <!-- Komponen navbar -->	
			<ul class="nav pull-left">
				
				<li><a href="../"><span class="icon-home"></span><b> Home</b></a></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-list"></span><b> Artikel</b><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="../broiler/index.php?hal=1"><span class="icon-list"></span><b> Tentang Ayam Pedaging</b></a></li>
						<li><a href="index.php?hal=1"><span class="icon-list"></span><b> Tentang Ayam Petelur</b></a></li>
						<li><a href="../harga.pakan.php"><span class="icon-list"></span><b> Harga Pakan</b></a></li>
						<li><a href="../penyakit.php"><span class="icon-list"></span><b> Penyakit Ayam & Solusi</b></a></li>
					</ul>
				</li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-file"></span><b> Basis Pengetahuan </b><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="../konsultasi/index.php"><span class="icon-check"></span><b> Konsultasi</b></a></li>
						<li><a href="../download.php"><span class="icon-download"></span><b> Download Dokumen</b></a></li>
					</ul>
				</li>
				<li><a href="../forum/home.php"><span class="icon-comment"></span><b> Diskusi</b></a></li>
				<li><a href="../info.php"><span class="icon-tag"></span><b> Hubungi Kami</b></a></li>
			</ul>
			
						<ul class="nav pull-right">
				
</li>
				<li><a href="../login.php" target='blank'><span class="icon-info-sign"></span><b> Login</b></a></li>
			</ul>

		</div>
	</div>
</div>
</body>
<script src="../js/jquery-1.8.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
