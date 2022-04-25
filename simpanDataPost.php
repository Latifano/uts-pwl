<?php 
    include "config/database.php";

    if(isset($_POST['save'])){
        $nama_gambar = $_FILES['image']['name'];
        $lokasi_gambar = $_FILES['image']['tmp_name'];

        $title = $_POST['title'];
        $desc = $_POST['deskripsi'];
        $id_form = $_POST['id'];
        $id = explode("|", base64_decode($id_form));

        move_uploaded_file($lokasi_gambar, 'gambar/'.$nama_gambar);
        $ins = $db->prepare("UPDATE posts SET post_image=?, post_title=?,post_description=? WHERE post_id=?");
        $ins -> execute([$nama_gambar,$title,$desc,$id[1]]);
        header("Location: view_data.php");
    }
?>