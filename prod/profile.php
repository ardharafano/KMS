<?php 
include("header.php"); // memanggil file header.php
include("menu.php"); // memanggil file header.php
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin</title>
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
		<div class="content">
		<br><br>
			<h2>Profile</h2>
			<hr />
			
			<?php
			$username = $_SESSION['username']; // mengambil username dari session yang login
			
			$sql = $conn->query("SELECT * FROM admin WHERE username='$username'"); // query memilih entri username pada database
			if(mysqli_num_rows($sql) == 0){
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data profile -->
			<table class="table table-striped table-condensed">
				<tr>
					<th>Username</th>
					<td><?php echo $row['username']; ?></td>
				</tr>
				<tr>
					<th>Nama</th>
					<td><?php echo $row['nama']; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $row['email']; ?></td>
				</tr>
				<tr>
					<th>Level</th>
					<td><?php echo $row['level']; ?></td>
				</tr>
			</table>
			
			<a href="admin.update.php?id=<?php echo $row['id_user'];?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Profile</a>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
