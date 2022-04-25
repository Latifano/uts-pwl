<?php
     include "config/database.php";

     $id = explode("|", base64_decode($_GET['id']));

     $del = $db->prepare("DELETE FROM posts WHERE post_id=?");
     $del->execute([$id[1]]);

     header("Location: view_data.php");
?>