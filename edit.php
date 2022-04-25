<!DOCTYPE html>
<html>
	<head>
		<title>Edit Form</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<?php
					include "config/database.php";

					// menghilangkan | pada baris enkripsi yang sudah didecode
					$id = explode("|", base64_decode($_GET['id']));
					$cekuser=$db->prepare("SELECT * FROM user WHERE id=?");
					$cekuser->execute([$id[1]]);


					// jika $cekuser tidak kosong , maka jalankan :
					if($cekuser->rowCount()>0)
					{
						$cekuser->setFetchMode(PDO::FETCH_OBJ);
        				$user = $cekuser->fetch();

				?>

				<!-- Awal form edit -->
					<form method="post" action="edit_form.php" class="form-group">
						<label>Username *)</label>
						<input class="form-control" name="username" type="text" value="<?php echo $user->username?>" required><br>
						
						<label> <b>Email *</b></label>
                		<input class="form-control" name="email" type="text" required> <br>

						<label>Password *)</label>
						<input class="form-control" name="passwd" type="password" required><br>

						<label>Confirm Password *)</label>
	                    <input class="form-control"  name="cpasswd" type="password" required><br>
	                    <input type="hidden" name="id" value="<?php echo base64_encode(sha1(rand())."|".$user->id)?>">

						<input class="btn btn-primary" value="Save" type="submit">
						<a class="btn btn-danger" href="view_data.php">Batal</a>
					</form>
				<!-- Akhir form edit -->
				<?php
					}
					else
					// jika $cekuser kosong maka kembali ke view_data.php ...
					{
						header("Location: view_data.php?message=notfound");	
					}
				?>
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</body>
</html>