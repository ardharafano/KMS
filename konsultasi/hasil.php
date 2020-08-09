<?php
	session_start();
	include_once '../lib/database.php';
	include_once 'header.php';
	$id = $_GET['id'];
	$konsultasi = $_GET['konsultasi'];			
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hasil Konsultasi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="../img/favicon.png"/>
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    
	<style>
		body{
			background-image: url(../img/body.jpg);
			background-repeat: repeat;
			background-attachment: fixed;
		}
	</style>
</head>

<body>	

<div class="container">
        <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
			<div>
            	<div class="text-error">
                	<a href="../"><button class="btn btn-danger btn-medium" title="Keluar dan konsultasi sebagai User yang lain"><span class="icon-off icon-white"></span> Keluar</button></a>
				</div>
                <div class="text-error" style="margin-top:20px;">
                	<?php
						$sql_user = $conn->query("select * from user where id_user='$id'");
						$detail_user = mysqli_fetch_array($sql_user);
						if(mysqli_num_rows($sql_user) > 0){
							$nama	= $detail_user['nama'];
							$umur	= $detail_user['alamat'];
							$jenis_ayam	= $detail_user['jenis_ayam'];
							$nohp	= $detail_user['nohp'];
							$tgl_konsultasi	= $detail_user['tgl_konsultasi'];
							
							echo   "Nama : <b class='text-info'>$nama</b>
									<br>
									Jenis Kelamin: <b class='text-info'>$jenis_ayam</b>
									<br>
									Alamat: <b class='text-info'>$umur</b>
									<br>
									No Hp: <b class='text-info'>$nohp</b>
									<br>
									Konsultasi Pada : <b class='text-info'>$tgl_konsultasi</b>";
						}
					?>
                </div>
                <div style="margin-top:20px">
                    <form name="form1" method="post" action="">
                        <div class="span4 navbar-inner"><h5 class="text-left text-error">Gejala Yang Dipilih :</h5>
                    <?php
                        //GEJALA YANG DIPILIH USER
                        $sk = $conn->query("select id_gejala from hasil_konsultasi where konsultasi='$konsultasi'") or die(mysqli_error());
                        $rk = mysqli_num_rows($sk);
                        
                        while($dk = mysqli_fetch_array($sk)){
                            $sg = $conn->query("select * from gejala where id_gejala='$dk[id_gejala]'") or die(mysqli_error());
                            $dg = mysqli_fetch_array($sg);
                            echo "<font face='Comic Sans MS, cursive' class='text-info text-left'>* $dg[kode_gejala]<h5>$dg[nama_gejala]</h5></font>";
                        }
						?>
                        </div>
                        <div class="span4 navbar-inner">
						<?php
                        //PROSES PENYAKIT P01
                        $s1 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P01%') AND konsultasi=$konsultasi");
                        $r1 = mysqli_num_rows($s1);
                        
                        $ssum1 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j1
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P01%')")
                                                or die(mysqli_error());
                        $dsum1 = mysqli_fetch_array($ssum1);
                        $proses1 = $dsum1['j1']/17;
                        
                        //PROSES PENYAKIT P02
                        $s2 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P02%') AND konsultasi=$konsultasi");
                        $r2 = mysqli_num_rows($s2);
                        
                        $ssum2 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j2
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P02%')")
                                                or die(mysqli_error());
                        $dsum2 = mysqli_fetch_array($ssum2);
                        $proses2 = $dsum2['j2']/16;
                        
                        //PROSES PENYAKIT P03
                        $s3 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P03%') AND konsultasi=$konsultasi");
                        $r3 = mysqli_num_rows($s3);
                        
                        $ssum3 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j3
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P03%')")
                                                or die(mysqli_error());
                        $dsum3 = mysqli_fetch_array($ssum3);
                        $proses3 = $dsum3['j3']/12;
                        
                        //PROSES PENYAKIT P04
                        $s4 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P04%') AND konsultasi=$konsultasi");
                        $r4 = mysqli_num_rows($s4);
                        
                        $ssum4 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j4
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P04%')")
                                                or die(mysqli_error());
                        $dsum4 = mysqli_fetch_array($ssum4);
                        $proses4 = $dsum4['j4']/11;
                        
                        //PROSES PENYAKIT P05
                        $s5 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P05%') AND konsultasi=$konsultasi");
                        $r5 = mysqli_num_rows($s5);
                        
                        $ssum5 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j5
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P05%')")
                                                or die(mysqli_error());
                        $dsum5 = mysqli_fetch_array($ssum5);
                        $proses5 = $dsum5['j5']/15;
                        
                        //PROSES PENYAKIT P06
                        $s6 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P06%') AND konsultasi=$konsultasi");
                        $r6 = mysqli_num_rows($s6);
                        
                        $ssum6 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j6
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P06%')")
                                                or die(mysqli_error());
                        $dsum6 = mysqli_fetch_array($ssum6);
                        $proses6 = $dsum6['j6']/9;
                        
                        //PROSES PENYAKIT P07
                        $s7 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P07%') AND konsultasi=$konsultasi");
                        $r7 = mysqli_num_rows($s7);
                        
                        $ssum7 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j7
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P07%')")
                                                or die(mysqli_error());
                        $dsum7 = mysqli_fetch_array($ssum7);
                        $proses7 = $dsum7['j7']/7;
                        
                        //PROSES PENYAKIT P08
                        $s8 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P08%') AND konsultasi=$konsultasi");
                        $r8 = mysqli_num_rows($s8);
                        
                        $ssum8 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j8
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P08%')")
                                                or die(mysqli_error());
                        $dsum8 = mysqli_fetch_array($ssum8);
                        $proses8 = $dsum8['j8']/6;
						
						//PROSES PENYAKIT P09
                        $s9 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P09%') AND konsultasi=$konsultasi");
                        $r9 = mysqli_num_rows($s9);
                        
                        $ssum9 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j9
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P09%')")
                                                or die(mysqli_error());
                        $dsum9 = mysqli_fetch_array($ssum9);
                        $proses9 = $dsum9['j9']/17;
						
						//PROSES PENYAKIT P10
                        $s10 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P10%') AND konsultasi=$konsultasi");
                        $r10 = mysqli_num_rows($s10);
                        
                        $ssum10 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j10
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P10%')")
                                                or die(mysqli_error());
                        $dsum10 = mysqli_fetch_array($ssum10);
                        $proses10 = $dsum10['j10']/5;
						
						//PROSES PENYAKIT P11
                        $s11 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P11%') AND konsultasi=$konsultasi");
                        $r11 = mysqli_num_rows($s11);
                        
                        $ssum11 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j11
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P11%')")
                                                or die(mysqli_error());
                        $dsum11 = mysqli_fetch_array($ssum11);
                        $proses11 = $dsum11['j11']/8;
						
						//PROSES PENYAKIT P12
                        $s12 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P12%') AND konsultasi=$konsultasi");
                        $r12 = mysqli_num_rows($s8);
                        
                        $ssum12 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j12
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P12%')")
                                                or die(mysqli_error());
                        $dsum12 = mysqli_fetch_array($ssum12);
                        $proses12 = $dsum12['j12']/9;
						
						//PROSES PENYAKIT P13
                        $s13 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P13%') AND konsultasi=$konsultasi");
                        $r13 = mysqli_num_rows($s13);
                        
                        $ssum13 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j13
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P13%')")
                                                or die(mysqli_error());
                        $dsum13 = mysqli_fetch_array($ssum13);
                        $proses13 = $dsum13['j13']/7;
						
						//PROSES PENYAKIT P14
                        $s14 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P14%') AND konsultasi=$konsultasi");
                        $r14 = mysqli_num_rows($s8);
                        
                        $ssum14 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j14
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P14%')")
                                                or die(mysqli_error());
                        $dsum14 = mysqli_fetch_array($ssum14);
                        $proses14 = $dsum14['j14']/9;
                        
						                        $s1 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P01%') AND konsultasi=$konsultasi");
                        $r1 = mysqli_num_rows($s1);
                       
					   //HASIL SIMILARITY P01-P14
					   echo "<center><b>Hasil Similarity</b></center>";
					   //P01
                        $proses1 = $dsum1['j1']/17;
						echo "<br><b>P01 - Berak Kapur</b> = ".$proses1;
						
						//P02
                        $proses2 = $dsum2['j2']/19;
						echo "<br><b>P02 - Kolera Ayam</b> = ".$proses2;
						
						//P03
                        $proses3 = $dsum3['j3']/12;
						echo "<br><b>P03 - Flu Burung</b> = ".$proses3;
						
						//P04
                        $proses4 = $dsum4['j4']/11;
						echo "<br><b>P04 - Tetelo</b> = ".$proses4;
						
						//P05
                        $proses5 = $dsum5['j5']/15;
						echo "<br><b>P05 - Tipus Ayam</b> = ".$proses5;
						
						//P06
                        $proses6 = $dsum6['j6']/9;
						echo "<br><b>P06 - Berak Darah</b> = ".$proses6;
						
						//P07
                        $proses7 = $dsum7['j7']/7;
						echo "<br><b>P07 - Gumboro</b> = ".$proses7;
						
						//P08
                        $proses8 = $dsum8['j8']/6;
						echo "<br><b>P08 - Salesma Ayam</b> = ".$proses8;
						
					    //P09
                        $proses9 = $dsum9['j9']/17;
						echo "<br><b>P09 - Batuk Ayam Menahun</b> = ".$proses9;
					
					    //P10
                        $proses10 = $dsum10['j10']/5;
						echo "<br><b>P10 - Batuk Darah</b> = ".$proses10;
						
					    //P11
                        $proses11 = $dsum11['j11']/8;
						echo "<br><b>P11 - Busung Ayam</b> = ".$proses11;
						
					    //P12
                        $proses12 = $dsum12['j12']/9;
						echo "<br><b>P12 - Mereks</b> = ".$proses12;
						
						//P13
                        $proses13 = $dsum13['j13']/7;
						echo "<br><b>P13 - Produksi Telur Menurun</b> = ".$proses13;
						
						//P14
                        $proses14 = $dsum14['j14']/9;
						echo "<br><b>P14 - Produksi Telur Awal</b> = ".$proses14;
										
                        //MEMBANDINGKAN NILAI SIMILARITY DAN MENGAMBIL NILAI YANG PALING TINGGI
                        $MAX = max($proses1, $proses2, $proses3, $proses4, $proses5, $proses6, $proses7, $proses8, $proses9, $proses10, $proses11, $proses12, $proses13, $proses14);
                       
                        //MENAMPILKAN HASIL AKHIR
                        if($MAX==$proses1){
                            $sp = $conn->query("select * from penyakit where kode_penyakit LIKE 'P01%'") or die(mysqli_error());
                            $dp = mysqli_fetch_array($sp);
                            $spas =  $conn->query("select * from user where id_user='$id'") or die(mysqli_error());
                            $dpas = mysqli_fetch_array($spas);
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'> Ayam Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[kode_penyakit]</u></b>- <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = $conn->query("insert into keterangan (id_konsultasi, nama, jenis_ayam, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', '$dpas[jenis_ayam]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
                        else if($MAX==$proses2){
                            $sp = $conn->query("select * from penyakit where kode_penyakit LIKE 'P02%'") or die(mysqli_error());
                            $dp = mysqli_fetch_array($sp);
                            $spas =  $conn->query("select * from user where id_user='$id'") or die(mysqli_error());
                            $dpas = mysqli_fetch_array($spas);
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'> Ayam Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[kode_penyakit]</u></b>- <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = $conn->query("insert into keterangan (id_konsultasi, nama, jenis_ayam, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', '$dpas[jenis_ayam]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
                        else if($MAX==$proses3){
                            $sp = $conn->query("select * from penyakit where kode_penyakit LIKE 'P03%'") or die(mysqli_error());
                            $dp = mysqli_fetch_array($sp);
                            $spas =  $conn->query("select * from user where id_user='$id'") or die(mysqli_error());
                            $dpas = mysqli_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'> Ayam Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[kode_penyakit]</u></b>- <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = $conn->query("insert into keterangan (id_konsultasi, nama, jenis_ayam, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', '$dpas[jenis_ayam]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
                        else if($MAX==$proses4){
                            $sp = $conn->query("select * from penyakit where kode_penyakit LIKE 'P04%'") or die(mysqli_error());
                            $dp = mysqli_fetch_array($sp);
                            $spas =  $conn->query("select * from user where id_user='$id'") or die(mysqli_error());
                            $dpas = mysqli_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'> Ayam Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[kode_penyakit]</u></b>- <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = $conn->query("insert into keterangan (id_konsultasi, nama, jenis_ayam, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', '$dpas[jenis_ayam]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
                        else if($MAX==$proses5){
                            $sp = $conn->query("select * from penyakit where kode_penyakit LIKE 'P05%'") or die(mysqli_error());
                            $dp = mysqli_fetch_array($sp);
                            $spas =  $conn->query("select * from user where id_user='$id'") or die(mysqli_error());
                            $dpas = mysqli_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'> Ayam Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[kode_penyakit]</u></b>- <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = $conn->query("insert into keterangan (id_konsultasi, nama, jenis_ayam, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', '$dpas[jenis_ayam]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
						else if($MAX==$proses6){
                            $sp = $conn->query("select * from penyakit where kode_penyakit LIKE 'P06%'") or die(mysqli_error());
                            $dp = mysqli_fetch_array($sp);
                            $spas =  $conn->query("select * from user where id_user='$id'") or die(mysqli_error());
                            $dpas = mysqli_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'> Ayam Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[kode_penyakit]</u></b>- <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = $conn->query("insert into keterangan (id_konsultasi, nama, jenis_ayam, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', '$dpas[jenis_ayam]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
						else if($MAX==$proses7){
                            $sp = $conn->query("select * from penyakit where kode_penyakit LIKE 'P07%'") or die(mysqli_error());
                            $dp = mysqli_fetch_array($sp);
                            $spas =  $conn->query("select * from user where id_user='$id'") or die(mysqli_error());
                            $dpas = mysqli_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'> Ayam Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[kode_penyakit]</u></b>- <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = $conn->query("insert into keterangan (id_konsultasi, nama, jenis_ayam, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', '$dpas[jenis_ayam]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
						else if($MAX==$proses8){
                            $sp = $conn->query("select * from penyakit where kode_penyakit LIKE 'P08%'") or die(mysqli_error());
                            $dp = mysqli_fetch_array($sp);
                            $spas =  $conn->query("select * from user where id_user='$id'") or die(mysqli_error());
                            $dpas = mysqli_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'> Ayam Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[kode_penyakit]</u></b>- <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = $conn->query("insert into keterangan (id_konsultasi, nama, jenis_ayam, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', '$dpas[jenis_ayam]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
						else if($MAX==$proses9){
                            $sp = $conn->query("select * from penyakit where kode_penyakit LIKE 'P09%'") or die(mysqli_error());
                            $dp = mysqli_fetch_array($sp);
                            $spas =  $conn->query("select * from user where id_user='$id'") or die(mysqli_error());
                            $dpas = mysqli_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'> Ayam Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[kode_penyakit]</u></b>- <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = $conn->query("insert into keterangan (id_konsultasi, nama, jenis_ayam, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', '$dpas[jenis_ayam]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
						else if($MAX==$proses10){
                            $sp = $conn->query("select * from penyakit where kode_penyakit LIKE 'P10%'") or die(mysqli_error());
                            $dp = mysqli_fetch_array($sp);
                            $spas =  $conn->query("select * from user where id_user='$id'") or die(mysqli_error());
                            $dpas = mysqli_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'> Ayam Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[kode_penyakit]</u></b>- <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = $conn->query("insert into keterangan (id_konsultasi, nama, jenis_ayam, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', '$dpas[jenis_ayam]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
						else if($MAX==$proses11){
                            $sp = $conn->query("select * from penyakit where kode_penyakit LIKE 'P11%'") or die(mysqli_error());
                            $dp = mysqli_fetch_array($sp);
                            $spas =  $conn->query("select * from user where id_user='$id'") or die(mysqli_error());
                            $dpas = mysqli_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'> Ayam Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[kode_penyakit]</u></b>- <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = $conn->query("insert into keterangan (id_konsultasi, nama, jenis_ayam, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', '$dpas[jenis_ayam]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
						else if($MAX==$proses12){
                            $sp = $conn->query("select * from penyakit where kode_penyakit LIKE 'P12%'") or die(mysqli_error());
                            $dp = mysqli_fetch_array($sp);
                            $spas =  $conn->query("select * from user where id_user='$id'") or die(mysqli_error());
                            $dpas = mysqli_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'> Ayam Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[kode_penyakit]</u></b>- <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = $conn->query("insert into keterangan (id_konsultasi, nama, jenis_ayam, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', '$dpas[jenis_ayam]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
						else if($MAX==$proses13){
                            $sp = $conn->query("select * from penyakit where kode_penyakit LIKE 'P13%'") or die(mysqli_error());
                            $dp = mysqli_fetch_array($sp);
                            $spas =  $conn->query("select * from user where id_user='$id'") or die(mysqli_error());
                            $dpas = mysqli_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'> Ayam Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[kode_penyakit]</u></b>- <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = $conn->query("insert into keterangan (id_konsultasi, nama, jenis_ayam, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', '$dpas[jenis_ayam]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
						else if($MAX==$proses14){
                            $sp = $conn->query("select * from penyakit where kode_penyakit LIKE 'P14%'") or die(mysqli_error());
                            $dp = mysqli_fetch_array($sp);
                            $spas =  $conn->query("select * from user where id_user='$id'") or die(mysqli_error());
                            $dpas = mysqli_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'> Ayam Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[kode_penyakit]</u></b>- <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = $conn->query("insert into keterangan (id_konsultasi, nama, jenis_ayam, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', '$dpas[jenis_ayam]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
                    ?>
                    </div>
                    </form>
						<div><div style="margin-bottom: 5px;"><br><br><br>
						<input value="Lihat Proses" type="button" onclick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = ''; this.innerText = ''; this.value = 'Tutup'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = 'Buka'; }"></div>
						<div style="margin: 0px; padding: 10px; border: 1px inset;">
						<div style="display: none;">
						<div class="span8 navbar-inner" style="margin-top:20px">
						<?php
                        //PROSES PENYAKIT P01
                        $s1 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P01%') AND konsultasi=$konsultasi");
                        $r1 = mysqli_num_rows($s1);
                        
                        echo "<center><h1>PROSES LOGIKA KONSULTASI</h1></center>";
						echo "<h3>P01 - Berak Kapur</h3>";
						echo "Ditemukan ".$r1." Gejala Yang Sama Pada Penyakit P01, Yaitu :";
						echo "<br>";
						
						while($d1 = mysqli_fetch_array($s1)){
							if($r1>0){
								$sg1 = $conn->query("select * from gejala where id_gejala='$d1[id_gejala]'") or die(mysqli_error());
								
								while($dg1 = mysqli_fetch_array($sg1)){
									echo "$dg1[kode_gejala], bobot = $dg1[bobot] <br>";
								}
							}
						}
						
						$ssum1 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j1
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P01%')") or die(mysqli_error());
                        $dsum1 = mysqli_fetch_array($ssum1);
						echo "<br>a = Jumlah Bobot Untuk Penyakit P01 = $dsum1[j1]";
						
                        $proses1 = $dsum1['j1']/17;
						echo "<br>b = Total Bobot Pada P01 = 17";
						echo "<br>Rumus Similarity P01 : a/b";
						echo "<br><b>Similarity P01</b> = ".$proses1;
						echo "<br>";
                        
                        //PROSES PENYAKIT P02
                        $s2 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P02%') AND konsultasi=$konsultasi");
                        $r2 = mysqli_num_rows($s2);
                        
						echo "<br><br>";
						echo "<h3>P02 - Kolera Ayam</h3>";
						echo "Ditemukan ".$r2." Gejala Yang Sama Pada Penyakit P02, Yaitu :";
						echo "<br>";
						
						while($d2 = mysqli_fetch_array($s2)){
							if($r2>0){
								$sg2 = $conn->query("select * from gejala where id_gejala='$d2[id_gejala]'") or die(mysqli_error());
								
								while($dg2 = mysqli_fetch_array($sg2)){
									echo "$dg2[kode_gejala], bobot = $dg2[bobot] <br>";
								}
							}
						}
						
                        $ssum2 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j2
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P02%')") or die(mysqli_error());
                        
						$dsum2 = mysqli_fetch_array($ssum2);
						echo "<br>a = Jumlah Bobot Untuk Penyakit P02 = $dsum2[j2]";
						
                        $proses2 = $dsum2['j2']/19;
                        echo "<br>b = Total Bobot Pada P02 = 19";
						echo "<br>Rumus Similarity P02 : a/b";
						echo "<br>Similarity P02 = ".$proses2;
						echo "<br><br>";
                        
                        //PROSES PENYAKIT P03
                        $s3 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P03%') AND konsultasi=$konsultasi");
                        $r3 = mysqli_num_rows($s3);
                        
                        echo "<br><br>";
						echo "<h3>P03 - Flu Burung</h3>";
						echo "Ditemukan ".$r3." Gejala Yang Sama Pada Penyakit P03, Yaitu :";
						echo "<br>";
						
						while($d3 = mysqli_fetch_array($s3)){
							if($r3>0){
								$sg3 = $conn->query("select * from gejala where id_gejala='$d3[id_gejala]'") or die(mysqli_error());
								
								while($dg3 = mysqli_fetch_array($sg3)){
									echo "$dg3[kode_gejala], bobot = $dg3[bobot] <br>";
								}
							}
						}
						
						$ssum3 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j3
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P03%')") or die(mysqli_error());
                        $dsum3 = mysqli_fetch_array($ssum3);
						echo "<br>a = Jumlah Bobot Untuk Penyakit P03 = $dsum3[j3]";
						
                        $proses3 = $dsum3['j3']/12;
						echo "<br>b = Total Bobot Pada P03 = 12";
						echo "<br>Rumus Similarity P03 : a/b";
						echo "<br>Similarity P03 = ".$proses3;
						echo "<br><br>";
                        
                        //PROSES PENYAKIT P04
                        $s4 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P04%') AND konsultasi=$konsultasi");
                        $r4 = mysqli_num_rows($s4);
                        
						echo "<br><br>";
						echo "<h3>P04 - Tetelo</h3>";
						echo "Ditemukan ".$r4." Gejala Yang Sama Pada Penyakit P04, Yaitu :";
						echo "<br>";
						
						while($d4 = mysqli_fetch_array($s4)){
							if($r4>0){
								$sg4 = $conn->query("select * from gejala where id_gejala='$d4[id_gejala]'") or die(mysqli_error());
								
								while($dg4 = mysqli_fetch_array($sg4)){
									echo "$dg4[kode_gejala], bobot = $dg4[bobot] <br>";
								}
							}
						}
						
                        $ssum4 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j4
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P04%')") or die(mysqli_error());
                        $dsum4 = mysqli_fetch_array($ssum4);
						echo "<br>a = Jumlah Bobot Untuk Penyakit P04 = $dsum4[j4]";
						
                        $proses4 = $dsum4['j4']/11;
                        echo "<br>b = Total Bobot Pada P04 = 11";
						echo "<br>Rumus Similarity P04 : a/b";
						echo "<br>Similarity P04 = ".$proses4;
						echo "<br><br>";
                        
						
                        //PROSES PENYAKIT P05
                        $s5 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P05%') AND konsultasi=$konsultasi");
                        $r5 = mysqli_num_rows($s5);
						
						echo "<br><br>";
						echo "<h3>P05 - Tipus Ayam</h3>";
						echo "Data Ditemukan ".$r5." Gejala Yang Sama Pada Penyakit P05, Yaitu :";
						echo "<br>";
						
						while($d5 = mysqli_fetch_array($s5)){
							if($r5>0){
								$sg5 = $conn->query("select * from gejala where id_gejala='$d5[id_gejala]'") or die(mysqli_error());
								
								while($dg5 = mysqli_fetch_array($sg5)){
									echo "$dg5[kode_gejala], bobot = $dg5[bobot] <br>";
								}
							}
						}
                        
                        $ssum5 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j5
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P05%')") or die(mysqli_error());
                        $dsum5 = mysqli_fetch_array($ssum5);
						echo "<br>a = Jumlah Bobot Untuk Penyakit P05 = $dsum5[j5]";
						
                        $proses5 = $dsum5['j5']/15;
						echo "<br>b = Total Bobot Pada P05 = 15";
						echo "<br>Rumus Similarity P05 : a/b";
						echo "<br>Similarity P05 = ".$proses5;
						echo "<br><br>";
                        
                        //PROSES PENYAKIT P06
                        $s6 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P06%') AND konsultasi=$konsultasi");
                        $r6 = mysqli_num_rows($s6);
                        
						echo "<br><br>";
						echo "<h3>P06 - Berak Darah</h3>";
						echo "Data Ditemukan ".$r6." Gejala Yang Sama Pada Penyakit P06, Yaitu :";
						echo "<br>";
						
						while($d6 = mysqli_fetch_array($s6)){
							if($r6>0){
								$sg6 = $conn->query("select * from gejala where id_gejala='$d6[id_gejala]'") or die(mysqli_error());
								
								while($dg6 = mysqli_fetch_array($sg6)){
									echo "$dg6[kode_gejala], bobot = $dg6[bobot] <br>";
								}
							}
						}
						
                        $ssum6 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j6
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P06%')")
                                                or die(mysqli_error());
                        $dsum6 = mysqli_fetch_array($ssum6);
						echo "<br>a = Jumlah Bobot Untuk Penyakit P06 = $dsum6[j6]";
						
                        $proses6 = $dsum6['j6']/9;
						echo "<br>b = Total Bobot Pada P06 = 9";
						echo "<br>Rumus Similarity P06 : a/b";
						echo "<br>Similarity P06 = ".$proses6;
						echo "<br><br>";
                        
						
                        //PROSES PENYAKIT P07
                        $s7 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P07%') AND konsultasi=$konsultasi");
                        $r7 = mysqli_num_rows($s7);
                        
						echo "<br><br>";
						echo "<h3>P07 - Gumboro</h3>";
						echo "Data Ditemukan ".$r7." Gejala Yang Sama Pada Penyakit P07, Yaitu :";
						echo "<br>";
						
						while($d7 = mysqli_fetch_array($s7)){
							if($r7>0){
								$sg7 = $conn->query("select * from gejala where id_gejala='$d7[id_gejala]'") or die(mysqli_error());
								
								while($dg7 = mysqli_fetch_array($sg7)){
									echo "$dg7[kode_gejala], bobot = $dg7[bobot] <br>";
								}
							}
						}
						
                        $ssum7 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j7
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P07%')") or die(mysqli_error());
                        $dsum7 = mysqli_fetch_array($ssum7);
						echo "<br>a = Jumlah Bobot Untuk Penyakit P07 = $dsum7[j7]";
						
                        $proses7 = $dsum7['j7']/7;
                        echo "<br>b = Total Bobot Pada P07 = 7";
						echo "<br>Rumus Similarity P07 : a/b";
						echo "<br>Similarity P07 = ".$proses7;
						echo "<br><br>";
						
						
                        //PROSES PENYAKIT P08
                        $s8 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P08%') AND konsultasi=$konsultasi");
                        $r8 = mysqli_num_rows($s8);
                        
						echo "<br><br>";
						echo "<h3>P08 - Salesma Ayam</h3>";
						echo "Data Ditemukan ".$r8." Gejala Yang Sama Pada Penyakit P08, Yaitu :";
						echo "<br>";
						
						while($d8 = mysqli_fetch_array($s8)){
							if($r8>0){
								$sg8 = $conn->query("select * from gejala where id_gejala='$d8[id_gejala]'") or die(mysqli_error());
								
								while($dg8 = mysqli_fetch_array($sg8)){
									echo "$dg8[kode_gejala], bobot = $dg8[bobot] <br>";
								}
							}
						}
						
                        $ssum8 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j8
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P08%')") or die(mysqli_error());
                        $dsum8 = mysqli_fetch_array($ssum8);
						echo "<br>a = Jumlah Bobot Untuk Penyakit P08 = $dsum8[j8]";
						
                        $proses8 = $dsum8['j8']/6;
						echo "<br>b = Total Bobot Pada P08 = 6";
						echo "<br>Rumus Similarity P08 : a/b";
						echo "<br>Similarity P08 = ".$proses8;
						echo "<br><br>";
						
						//PROSES PENYAKIT P09
                        $s9 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P09%') AND konsultasi=$konsultasi");
                        $r9 = mysqli_num_rows($s9);
                        
						echo "<br><br>";
						echo "<h3>P09 - Batuk Ayam Menahun</h3>";
						echo "Data Ditemukan ".$r9." Gejala Yang Sama Pada Penyakit P09, Yaitu :";
						echo "<br>";
						
						while($d9 = mysqli_fetch_array($s9)){
							if($r9>0){
								$sg9 = $conn->query("select * from gejala where id_gejala='$d9[id_gejala]'") or die(mysqli_error());
								
								while($dg9 = mysqli_fetch_array($sg9)){
									echo "$dg9[kode_gejala], bobot = $dg9[bobot] <br>";
								}
							}
						}
						
                        $ssum9 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j9
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P09%')") or die(mysqli_error());
                        $dsum9 = mysqli_fetch_array($ssum9);
						echo "<br>a = Jumlah Bobot Untuk Penyakit P09 = $dsum9[j9]";
						
                        $proses9 = $dsum9['j9']/17;
						echo "<br>b = Total Bobot Pada P09 = 17";
						echo "<br>Rumus Similarity P09 : a/b";
						echo "<br>Similarity P09 = ".$proses9;
						echo "<br><br>";
						
						//PROSES PENYAKIT P10
                        $s10 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P10%') AND konsultasi=$konsultasi");
                        $r10 = mysqli_num_rows($s10);
                        
						echo "<br><br>";
						echo "<h3>P10 - Batuk Darah</h3>";
						echo "Data Ditemukan ".$r10." Gejala Yang Sama Pada Penyakit P10, Yaitu :";
						echo "<br>";
						
						while($d10 = mysqli_fetch_array($s10)){
							if($r10>0){
								$sg10 = $conn->query("select * from gejala where id_gejala='$d10[id_gejala]'") or die(mysqli_error());
								
								while($dg10 = mysqli_fetch_array($sg10)){
									echo "$dg10[kode_gejala], bobot = $dg10[bobot] <br>";
								}
							}
						}
						
                        $ssum10 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j10
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P10%')") or die(mysqli_error());
                        $dsum10 = mysqli_fetch_array($ssum10);
						echo "<br>a = Jumlah Bobot Untuk Penyakit P10 = $dsum10[j10]";
						
                        $proses10 = $dsum10['j10']/5;
						echo "<br>b = Total Bobot Pada P10 = 5";
						echo "<br>Rumus Similarity P10 : a/b";
						echo "<br>Similarity P10 = ".$proses10;
						echo "<br><br>";
						
						//PROSES PENYAKIT P11
                        $s11 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P11%') AND konsultasi=$konsultasi");
                        $r11 = mysqli_num_rows($s11);
                        
						echo "<br><br>";
						echo "<h3>P11 - Busung Ayam</h3>";
						echo "Data Ditemukan ".$r11." Gejala Yang Sama Pada Penyakit P11, Yaitu :";
						echo "<br>";
						
						while($d11 = mysqli_fetch_array($s11)){
							if($r11>0){
								$sg11 = $conn->query("select * from gejala where id_gejala='$d11[id_gejala]'") or die(mysqli_error());
								
								while($dg11 = mysqli_fetch_array($sg11)){
									echo "$dg11[kode_gejala], bobot = $dg11[bobot] <br>";
								}
							}
						}
						
                        $ssum11 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j11
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P11%')") or die(mysqli_error());
                        $dsum11 = mysqli_fetch_array($ssum11);
						echo "<br>a = Jumlah Bobot Untuk Penyakit P11 = $dsum11[j11]";
						
                        $proses11 = $dsum11['j11']/8;
						echo "<br>b = Total Bobot Pada P11 = 8";
						echo "<br>Rumus Similarity P11 : a/b";
						echo "<br>Similarity P11 = ".$proses11;
						echo "<br><br>";
						
						//PROSES PENYAKIT P12
                        $s12 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P12%') AND konsultasi=$konsultasi");
                        $r12 = mysqli_num_rows($s12);
                        
						echo "<br><br>";
						echo "<h3>P12 - Mereks</h3>";
						echo "Data Ditemukan ".$r12." Gejala Yang Sama Pada Penyakit P12, Yaitu :";
						echo "<br>";
						
						while($d12 = mysqli_fetch_array($s12)){
							if($r12>0){
								$sg12 = $conn->query("select * from gejala where id_gejala='$d12[id_gejala]'") or die(mysqli_error());
								
								while($dg12 = mysqli_fetch_array($sg12)){
									echo "$dg12[kode_gejala], bobot = $dg12[bobot] <br>";
								}
							}
						}
						
                        $ssum12 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j12
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P12%')") or die(mysqli_error());
                        $dsum12 = mysqli_fetch_array($ssum12);
						echo "<br>a = Jumlah Bobot Untuk Penyakit P12 = $dsum12[j12]";
						
                        $proses12 = $dsum12['j12']/9;
						echo "<br>b = Total Bobot Pada P12 = 9";
						echo "<br>Rumus Similarity P12 : a/b";
						echo "<br>Similarity P12 = ".$proses12;
						echo "<br><br>";
						
						//PROSES PENYAKIT P13
                        $s13 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P13%') AND konsultasi=$konsultasi");
                        $r13 = mysqli_num_rows($s13);
                        
						echo "<br><br>";
						echo "<h3>P13 - Produksi Telur Menurun</h3>";
						echo "Data Ditemukan ".$r13." Gejala Yang Sama Pada Penyakit P13, Yaitu :";
						echo "<br>";
						
						while($d13 = mysqli_fetch_array($s13)){
							if($r13>0){
								$sg13 = $conn->query("select * from gejala where id_gejala='$d13[id_gejala]'") or die(mysqli_error());
								
								while($dg13 = mysqli_fetch_array($sg13)){
									echo "$dg13[kode_gejala], bobot = $dg13[bobot] <br>";
								}
							}
						}
						
                        $ssum13 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j13
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P13%')") or die(mysqli_error());
                        $dsum13 = mysqli_fetch_array($ssum13);
						echo "<br>a = Jumlah Bobot Untuk Penyakit P13 = $dsum13[j13]";
						
                        $proses13 = $dsum13['j13']/7;
						echo "<br>b = Total Bobot Pada P13 = 7";
						echo "<br>Rumus Similarity P13 : a/b";
						echo "<br>Similarity P13 = ".$proses13;
						echo "<br><br>";
						
						//PROSES PENYAKIT P14
                        $s14 = $conn->query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P14%') AND konsultasi=$konsultasi");
                        $r14 = mysqli_num_rows($s14);
                        
						echo "<br><br>";
						echo "<h3>P14 - Produksi Telur Awal</h3>";
						echo "Data Ditemukan ".$r14." Gejala Yang Sama Pada Penyakit P14, Yaitu :";
						echo "<br>";
						
						while($d14 = mysqli_fetch_array($s14)){
							if($r14>0){
								$sg14 = $conn->query("select * from gejala where id_gejala='$d14[id_gejala]'") or die(mysqli_error());
								
								while($dg14 = mysqli_fetch_array($sg14)){
									echo "$dg14[kode_gejala], bobot = $dg14[bobot] <br>";
								}
							}
						}
						
                        $ssum14 = $conn->query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j14
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from kasus b where b.kode_penyakit like 'P14%')") or die(mysqli_error());
                        $dsum14 = mysqli_fetch_array($ssum14);
						echo "<br>a = Jumlah Bobot Untuk Penyakit P14 = $dsum14[j14]";
						
                        $proses14 = $dsum14['j14']/9;
						echo "<br>b = Total Bobot Pada P14 = 9";
						echo "<br>Rumus Similarity P14 : a/b";
						echo "<br>Similarity P14 = ".$proses14;
						echo "<br><br>";
                        
                        //MEMBANDINGKAN NILAI SIMILARITY DAN MENGAMBIL NILAI YANG PALING TINGGI
                        $MAX = max($proses1, $proses2, $proses3, $proses4, $proses5, $proses6, $proses7, $proses8, $proses9, $proses10, $proses11, $proses12, $proses13, $proses14);
                        ?>
                        </div>
						</div>
						</div>
						</div>
				</div>
			</div>
		</div>
</div>

<br><br><br><br>
<script src="../js/jquery-1.8.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>