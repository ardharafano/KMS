<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Administrator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="img/favicon.png"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    
	<style>
		body{
			background-image: url(img/body.jpg);
			background-repeat: repeat;
			background-attachment: fixed;
		}
	</style>

<script type="text/javascript">
$(document).ready(function() {
	$("#form_login").validate();
})

function validasi(form){
	if(form.username.value == ""){
		alert("USERNAME MASIH KOSONG");
		form.username.focus();
		return (false);
	}
     
	if(form.password.value == ""){
		alert("PASSWORD MASIH KOSONG");
		form.password.focus();
		return (false);
	}

	return (true);
}
</script>

</head>
<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
<body OnLoad="document.login.username.focus();">
<div class="modal-body text-center">
				<?php
				if(isset($_POST['login'])){
					include("lib/database.php");
					
					$username	= $_POST['username'];
					$password	= $_POST['password'];
					$level		= $_POST['level'];
					
					$sql = $conn->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
					if(mysqli_num_rows($sql) == 0){
					}else{
						$row = mysqli_fetch_assoc($sql);
						
						if($row['level'] == 'Manager' && $level == 'Manager'){
							$_SESSION['username']=$username;
							$_SESSION['level']='Manager';
							header("Location: adm/home.php");
						}else if($row['level'] == 'Production' && $level == 'Production'){
							$_SESSION['username']=$username;
							$_SESSION['level']='Production';
							header("Location: prod/home.php");
						}else if($row['level'] == 'Warehouse' && $level == 'Warehouse'){
							$_SESSION['username']=$username;
							$_SESSION['level']='Warehouse';
							header("Location: wh/home.php");
						}else{
							echo '<div class="alert alert-danger"><center>Upss...!!! Login gagal.</center></div>';
						}
					}
				}
				?>
				<div class="modal-body text-center">
	<form class="form-horizontal" name="login" id="form-login" method="post" action="login.php" onSubmit="return validasi(this)">
	<div class="modal-body text-center">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-user"></i></span><input type="text" id="username" class="required input-large" name="username" placeholder="Username..">
		</div>
        <div class="row">
			&nbsp;
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-lock"></i></span><input type="password" id="password" class="input-large" name="password" placeholder="Password..">
		</div>
        <div class="row">
			&nbsp;
		</div>
		<div class="form-group">
		<select name="level" class="form-control" required>
			<option value="">Pilih Level User</option>
			<option value="Manager">Manager</option>
			<option value="Production">Production</option>
			<option value="Warehouse">Warehouse</option>
		</select>
				</div>
				&nbsp;
		<div>
			<button class="btn btn-small btn-info" type="submit" name="login" id="login">Login</button>
		</div> 
	</div>
</form>
</body>