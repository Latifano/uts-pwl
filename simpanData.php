<?php 
    include "config/database.php";

    if(isset($_POST['save'])){
        $nama_gambar = $_FILES['image']['name'];
        // image(lokasi asal gambar) , name(nama gambar)
        $lokasi_gambar = $_FILES['image']['tmp_name'];
        // image(lokasi asal gambar) , tmp_name(lokasi sementara dari file diupload)

        $title = $_POST['title'];
        $desc = $_POST['deskripsi'];

        move_uploaded_file($lokasi_gambar, 'gambar/'.$nama_gambar);
        // (lokasi sementara file , lokasi file akan dipindahkan)
        $ins = $db->prepare("INSERT INTO posts (post_title,post_image,post_description) VALUES(?,?,?)");
        $ins -> execute([$title,$nama_gambar,$desc]);
        header("Location: view_data.php");
    }
?>