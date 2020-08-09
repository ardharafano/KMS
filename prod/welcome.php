			<?php
			$username = $_SESSION['username']; // mengambil username dari session yang login
			
			$sql = $conn->query("SELECT * FROM admin WHERE username='$username'"); // query memilih entri username pada database
			if(mysqli_num_rows($sql) == 0){
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
<div class="container">
        <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
			<div class="hero-unit text-center">
            	<font face="Comic Sans MS, cursive">Selamat Datang <b class="text-error"><?php echo $row['nama']; ?></b>, sebagai <b class="text-error"><?php echo $row['level']; ?></b>.<br>silahkan pilih menu untuk mengelola halaman website.</font>
			</div>
            
    	</div>
    </div>
</div>