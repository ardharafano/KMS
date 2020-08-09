				<?php
				if(isset($_POST['login'])){
					include("../lib/database.php");
					
					$username	= $_POST['username'];
					$password	= $_POST['password'];
					$level		= $_POST['level'];
					
					$sql = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
					if(mysqli_num_rows($sql) == 0){
						echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
					}else{
						$row = mysqli_fetch_assoc($sql);
						
						if($row['level'] == 1 && $level == 1){
							$_SESSION['username']=$username;
							$_SESSION['level']='admin';
							header("Location: adm/home.php");
						}else if($row['level'] == 2 && $level == 2){
							$_SESSION['username']=$username;
							$_SESSION['level']='production';
							header("Location: prod/home.php");
						}else if($row['level'] == 3 && $level == 3){
							$_SESSION['username']=$username;
							$_SESSION['level']='warehouse';
							header("Location: wh/home.php");
						}else{
							echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
						}
					}
				}
				?>