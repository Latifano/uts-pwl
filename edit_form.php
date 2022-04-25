<?php
    include "config/database.php";

    $uname = $_POST['username'];
    $passwd = $_POST['passwd'];
    $eml = $_POST['email'];
    $cpasswd = $_POST['cpasswd'];
    $id_dari_form = $_POST['id'];

    if($passwd==$cpasswd)
    {
    	$id = explode("|",base64_decode($id_dari_form));

        $psw = password_hash($passwd,PASSWORD_DEFAULT);

	    $upd = $db->prepare("UPDATE user SET username=?,email=?,password=? WHERE id=?");
	    $upd->execute([$uname,$eml,$psw,$id[1]]);
        header("Location: view_data.php?message=success");  	
    }
    else
    {
        header("Location: edit.php?message=not-match");
    }
?>