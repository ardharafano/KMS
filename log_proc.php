				<?php
				if(isset($_POST['login'])){
					include("lib/database.php");
					
					$username	= $_POST['username'];
					$password	= $_POST['password'];
					$level		= $_POST['level'];
					
					$sql = $conn->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
					if(mysqli_num_rows($sql) == 0){
						echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
					}else{
						$row = mysqli_fetch_assoc($sql);
						
						if($row['level'] == 'admin'){
							$_SESSION['username']=$username;
							$_SESSION['level']='admin';
							header("Location: adm/home.php");
						}else if($row['level'] == 'production'){
							$_SESSION['username']=$username;
							$_SESSION['level']='production';
							header("Location: prod/home.php");
						}else if($row['level'] == 'warehouse'){
							$_SESSION['username']=$username;
							$_SESSION['level']='warehouse';
							header("Location: wh/home.php");
						}else{
							echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
						}
					}
				}
				?>