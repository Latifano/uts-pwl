<?php

    include "config/database.php";

	$username = $_POST['uname'];
	$password = $_POST['passwd'];

    // $cekuser = memilih tabel user dg kolom username dan active , =? (artinya username yg dieksekusi)
    $cekuser = $db->prepare("SELECT * FROM user WHERE username=? AND active=1");
    $cekuser->execute([$username]);

    // jika $cekuser tidak kosong , maka
    if($cekuser->rowCount()>0)
    {
        // $cekuser menggunakan metode FETCH_ASSOC
        $cekuser->setFetchMode(PDO::FETCH_ASSOC);

        // membuat $user untuk mengambil $cekuser
        $user = $cekuser->fetch();

        //password_verify = mencocokan $password dengan data yang ada pada DB
        if(password_verify($password, $user['password']))
        {
            session_start();//untuk memulai session
            //melakukan assignment terhadap variabel session
            $_SESSION['uname'] = $username;
            $_SESSION['jam_mulai'] = date("Y-m-d H:i:s");
            $_SESSION['jam_selesai'] = date("Y-m-d H:i:s",strtotime("+1 hour"));
            $_SESSION['isLogin'] = true;

            header("Location: home.php");
        }
        // jika password yang diisi tidak cocok dengan yang ada didatabase
        else
        {
            header("Location: login.php?message=failed");
        }
    }
    // jika data yang ada di tabel kosong
    else
    {
        header("Location: login.php?message=failed");
    }