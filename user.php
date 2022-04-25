
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
                    <a class="nav-link active" aria-current="page" href="user.php">User</a>
                    <a class="nav-link" href="view_data.php">Post</a>
                    <a class="nav-link" href="inputUser.php">Input</a>
                </div>
                </div>
            </div>
	    </nav>
    <!-- Akhir Navbar -->

    <br>

    <!-- Awal tabel data user -->
    <h3 align="center">DATA USER</h3>
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
        <?php
            session_start();
            // jika home.php akan diakses melalui url tetapi user sudah menglogoutnya
            if($_SESSION['isLogin'] != true || $_SESSION['jam_selesai']==date("Y-m-d H:i:s")){
                // maka kembali ke login.php & menampilkan pesan nologin
                header("Location: login.php?message=nologin");
            }

            include "config/database.php";

            // $rs memakses DB menggunakan query
            $rs = $db->query("SELECT * FROM user");

            // $rs->setFetchMode(PDO::FETCH_ASSOC);
            $rs->setFetchMode(PDO::FETCH_OBJ);
        ?>
        

        <table border=5 cellspacing=4 cellpadding=4 align=center>
        <tr align="center" style="font-size: 20px;">
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Status</th>
            <th>Menu</th>
        </tr>
        <?php
            $i = 1;
            while($data = $rs->fetch())
            {
        ?>
        <tr align="center" style="font-size: 20px;">
            <td><?php echo $i?></td>
            <td><?php echo $data->username?></td>
            <td><?php echo $data->email?></td>
            <td><?php echo $data->active==0?"Non Aktif":"Aktif"?></td>
            <!-- base64_encode , sha1 , rand = untuk mengenkripsi id -->
            <td> 
                <a href="edit.php?id=<?php echo base64_encode(sha1(rand())."|".$data->id)?>">
                Edit
                </a> 
                | 
                <a href="delete.php?id=<?php echo base64_encode(sha1(rand())."|".$data->id)?>">Delete
                </a>
            </td>
        </tr>
        
        <?php
                $i++;
            }
        ?>
        </div>
    
    </div>
    
    <!-- Akhir tabel data user -->

</body>
</html>