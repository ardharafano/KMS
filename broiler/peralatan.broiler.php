<?php
	include_once('header.php');
	$i = 1;
	$jml_per_halaman = 1; // jumlah data yg ditampilkan perhalaman
	$jml_data = mysqli_num_rows($conn->query("select * from peralatan_broiler"));
	$jml_data = mysqli_num_rows($conn->query("select * from peralatan_broiler"));
	$jml_halaman = ceil($jml_data / $jml_per_halaman);
	
	if(isset($_GET['hal'])){
		
			$hal = $_GET['hal'];
			$i = ($hal - 1) * $jml_per_halaman  + 1;
			$s = $conn->query("select * from peralatan_broiler order by id_informasi desc limit ".(($hal - 1) * $jml_per_halaman).", $jml_per_halaman");
		
	}else{
		$s = $conn->query("select * from peralatan_broiler order by id_informasi desc limit 0, $jml_per_halaman")
				or die(mysqli_error());
	}
?>

<head>
	<meta charset="utf-8">
	<title>Peralatan dan Perkandangan Broiler</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="../img/favicon.png"/>
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    
	<style>
		body{
			background-image: url(./img/body.jpg);
			background-repeat: repeat;
			background-attachment: fixed;
		}
	</style>
</head>

		<div class="container container-body">
			
<div class="container">
        <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
			<div>
            	<div class="modal-header">
                	<h3>List Informasi</h3>
                </div>
				<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php?hal=1"><b>Tentang Ayam Broiler</b></a></li>
      <li><a href="peralatan.broiler.php?hal=1"><b>Peralatan & Perkandangan</b></a></li>
    </ul>
  </div>
	</nav>
                <div style="margin-top:10px">
                    <table class="table table-condensed table-bordered table-hover">
                    <thead>
                    	<td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>No</h5></font></td>
                        <td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Judul</h5></font></td>
                        <td width="35%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Isi</h5></font></td>
                        <td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Tanggal</h5></font></td>   
                    </thead>
                    <?php 
						while($data=mysqli_fetch_array($s)){
							$id=$data['id_informasi'];
							$judul=$data['judul'];
							$isi=$data['isi'];
							$tgl=$data['tgl'];
                    ?>
                    <tbody>
                    	<td><font face="Comic Sans MS, cursive" class="text-info text-center"><h5><?php echo $i ?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-error text-center"><h5><?php echo "$judul";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-nowrap" style="width: 8rem;"><h5><?php echo "$isi";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-center"><h5><?php echo "$tgl";?></h5></font></td>
                    </tbody>
                    <?php $i++; } ?>
                    </table>
                    </div>
                    
                    <div class="pagination pagination-centered">
                        <ul>
                            <?php for($i = 1; $i <= $jml_halaman; $i++) { ?>
                                <li><a href="peralatan.broiler.php?hal=<?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                </div>
			</div>
    	</div>
</div>
<center><div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.2&appId=111648572203663&autoLogAppEvents=1"></script>


<div class="fb-comments"></div></center>
<br><br><br><br>

</body>
</html>