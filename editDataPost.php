<!DOCTYPE html>
<html>
	<head>
		<title>Edit Post</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>

	<!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="home.php">Ikromi</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
                <a class="nav-link" href="view_data.php">Post</a>
				<a class="nav-link active" aria-current="page" href="editDataMhs.php">Edit</a>
			</div>
			</div>
		</div>
	</nav>
    <!-- Akhir Navbar -->

		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<?php
					include "config/database.php";

					// menghilangkan | pada baris enkripsi yang sudah didecode
					$id = explode("|", base64_decode($_GET['id']));
					$cekuser=$db->prepare("SELECT * FROM posts WHERE post_id=?");
					$cekuser->execute([$id[1]]);


					// jika $cekuser tidak kosong , maka jalankan :
					if($cekuser->rowCount()>0)
					{
						$cekuser->setFetchMode(PDO::FETCH_OBJ);
        				$user = $cekuser->fetch();

				?>
				<!-- Awal form edit post -->
					<h3 align="center">Edit Post</h3>
                    <form method="post" action="simpanDataPost.php" enctype="multipart/form-data">
						<div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value=" <?= $user->post_title ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Picture</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <input type="text" class="form-control" name="deskripsi" required>
                        </div>
                        <input type="hidden" name="id" value="<?php echo base64_encode(sha1(rand())."|".$user->post_id)?>">
                        <input type="submit" class="btn btn-success" name="save" value="save">
                        <a href="view_data.php" class="btn btn-danger">Cancel</a>
                        <br>
                    </form>
				<!-- Akhir form edit post -->
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