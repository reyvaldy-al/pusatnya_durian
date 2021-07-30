<?php
include 'classpelanggan.php';
session_start();
if(isset($_POST['login'])){
  $login = new pelanggan();
  if($login->login($_POST)){
    $_SESSION["login"];
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Pelanggan</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

   <?php include 'menu.php'; ?>

<div class="container">
	<div class="row ">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Login pelanggan</h3>
				</div>
				<div class="panel-body">
					<form method="post">
						<div class ="form-group">
							<label>Email</label>
							<input type="email" class="form-control"name="email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password">
						</div>
						<button class="btn btn-primary" name="login">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php


 ?>

</body>
</html>
