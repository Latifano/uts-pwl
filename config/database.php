<?php 
try{
    $db = new PDO("mysql:host=localhost;dbname=db_akun",'root','');
}catch(PDOException $e){
    echo "Database Failed to Connect!";
};
?>