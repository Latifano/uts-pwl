<?php 
include "config/database.php";

$uname = $_POST['username'];
$eml = $_POST['email'];
$passwd = $_POST['password'];
$cpasswd = $_POST['cpassword'];

// jika $passwd sama dengan $cpasswd , maka : 
if($passwd == $cpasswd){
    // variabel $psw meng-enkripsi $passwd dengan password_has() secara default
    $psw = password_hash($passwd, PASSWORD_DEFAULT);
    // variabel $ins , untuk memasukan data kedalam database
    $ins = $db->prepare("INSERT INTO user(username,password,email) VALUES(?,?,?)");
    // execute = untuk mengeksekusi variabel $uname & $psw
    $ins->execute([$uname, $psw, $eml]);
    // jika berhasil kembali ke regis.php dan mengirim msg=success (messsage berhasil)
    header("Location: regis.php?msg=success");
}else{
    // jika gagal kembali ke regis.php dan mengirim msg=not-match (messsage tidak sama)
    header("Location: regis.php?msg=not-match");
}
?>