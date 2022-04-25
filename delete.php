<?php
     include "config/database.php";

     $id = explode("|", base64_decode($_GET['id']));

     $del = $db->prepare("DELETE FROM user WHERE id=?");
     $del->execute([$id[1]]);

     header("Location: user.php");
?>