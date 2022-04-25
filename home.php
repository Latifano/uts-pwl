<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<!-- Awal Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="home.php"> Ikromi </a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-link active" aria-current="page" href="home.php">Home</a>
				<a class="nav-link" href="user.php">User</a>
				<a class="nav-link" href="view_data.php">Post</a>
			</div>
			<a class="nav-link" href="logout.php">Logout</a>
		</div>
		</div>
	</nav>
	<!-- Akhir Navbar -->

	<!-- Awal Selamat Datang -->
	<br>
		<h4>
		<div class="welcome row d-flex justify-content-center">
			<?php
				session_start();
				if($_SESSION['isLogin'] != true || $_SESSION['jam_selesai']==date("Y-m-d H:i:s"))
				{
					header("Location: form_login.php?message=nologin");
				}
				echo " Welcome ",strtoupper($_SESSION['uname'])," ! Login Time : ",$_SESSION['jam_mulai'];
				echo "<br>";
			?>
		</div>
		</h4>
	<!-- Awal Selamat Datang -->
</body>
</html>