<?php
	include_once 'admin.session.php';
?>


<div class="container">
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
            <!-- Komponen navbar -->	
			<ul class="nav pull-left">
				<li class="active"><a href="home.php"><span class="icon-home"></span><b class="text-error"> Knowledge Management</b></a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-info-sign"></span><b> Artikel</b><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="harga.pakan.php?hal=1"><span class="icon-info-sign"></span><b> Harga Pakan</b></a></li>
					</ul>
				</li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-info-sign"></span><b> Dokumen</b><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="upload.php?hal=1"><span class="icon-info-sign"></span><b> Upload File</b></a></li>
						<li><a href="download.php?hal=1"><span class="icon-info-sign"></span><b> Download File</b></a></li>
					</ul>
			<li><a href="petunjuk.php?hal=1"><span class="icon-info-sign"></span><b> Petunjuk Teknis</b></a></li>
			</ul>
			<ul class="nav pull-right">
			<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Hi, <b class="text-error"><?php echo $_SESSION['username']; ?></b><b class="caret"></b></a>
					<ul class="dropdown-menu">
				<li><a href="profile.php"><span class="icon-info-sign"></span><b> Profil</b></a></li>
				</ul>
				<li><a href="logout.php"><span class="icon-bar icon-off"></span><b> Logout</b></a></li>
			</ul>
		</div>
	</div>
</div>