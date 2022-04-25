
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Input Mahasiswa</title>
</head>
<body>

    <?php
        session_start();
            
        include "config/database.php";

    ?>     
    
    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Ikromi</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
                <a class="nav-link" href="home.php">Home</a>
                <a class="nav-link" href="user.php">User</a>
				<a class="nav-link active" aria-current="page" href="view_data.php">Post</a>
			</div>
			</div>
		</div>
	</nav>
    <!-- Akhir Navbar -->

    <br>
    
    <!-- Awal Form Post -->
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
        <section>
                <h3 align="center">POST</h3>
                <form method="post" action="simpanData.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Picture</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <input type="text" class="form-control" name="deskripsi" required>
                    </div>
                    <input type="submit" class="btn btn-success" name="save" value="save">
                    <a class="btn btn-primary" href="home.php">Back</a>
                    <br>
                </form>
            </section>
        </div>
    </div>
    <!-- Akhir Form Post -->

    <br>
    <hr>
    <br>

    <!-- Awal tabel Post -->
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
        <section>
            <h3 align="center">POSTED</h3>
                <table class="table">
                    <thead align="center">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Description</th>
                        <th scope="col">Menu</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        
                        <?php
                        // $rs memakses DB menggunakan query
                        $rs_post = $db->query("SELECT * FROM posts");

                        // $rs->setFetchMode(PDO::FETCH_ASSOC);
                        $rs_post->setFetchMode(PDO::FETCH_OBJ);
                            $i = 1;
                            while($data = $rs_post->fetch())
                            {
                        ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $data->post_title?></td>
                                <td> <img style="width:50%; height:50%;" src="gambar/<?php echo $data->post_image?>" alt="gambar not found"></td>
                                <td><?php echo $data->post_description?></td>
                                <td> 
                                    <a href="editDataPost.php?id=<?php echo base64_encode(sha1(rand())."|".$data->post_id)?>">
                                    Edit
                                    </a> 
                                    | 
                                    <a href="deletePost.php?id=<?php echo base64_encode(sha1(rand())."|".$data->post_id)?>">Del
                                    </a>
                                </td>
                            </tr>
                        <?php
                                $i++;
                            }
                        ?>
                    </tbody>

                </table>
            </section>
        </div>
    </div>
    <!-- Akhir tabel Post -->

    
</body>
</html>