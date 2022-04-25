<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

	<!-- Awal Navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Ikromi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            </div>
	    </nav>
    <!-- Akhir Navbar -->

	
	<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<!-- Awal Cek Kebenaran Uname dan Password -->
		<h3 align="center">Login</h3>
		<?php
		if(isset($_GET['message']))
		{
			if($_GET['message']=='nologin')
			{
		?>
			<div class="alert alert-danger">You must login first !</div>
			<br>
		<?php
			}
			elseif($_GET['message']=='logout')
			{
		?>	
			<div class="alert alert-info">Logout successful !</div>
		<?php
			}
			elseif($_GET['message']=='failed')
			{
		?>
			<div class="alert alert-danger">Username or password wrong !</div>
		<?php
			}
		}
		?>
	<!-- Akhir Cek Kebenaran Uname dan Password -->

	<!-- Awal Form -->
	<form method="post" action="aksilogin.php" class="form-group">
		<p>Username:<br>
		<input class="form-control" type="text" name="uname" required>
		</p>

		<p>Password:<br>
		<input class="form-control" type="password" name="passwd" required>
		</p>
		<a href="regis.php" class="link-danger" align="right"> <p>no account yet?</p> </a>
		<input class="btn btn-success" type="submit" value="Login">
	</form>
	<!-- Akhir Navbar -->
	
	</div>
	<div class="col-md-4"></div>
	</div>
</body>
</html>