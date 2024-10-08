<?php
    include "service/database.php";
    $register_massage = "";
    session_start();
    if(isset($_SESSION["is_login"])) {
            header("location: dashboard.php");
    }

    if(isset($_POST["register"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $hash_password = hash("sha256", $password);

            // $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";


            try {
                $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash_password')";
                if ($db->query($sql)) {
                    // echo "OK DATA MASUK";
                    $register_massage = "daftar akun berhasil,silahkan login";
          
                } else {
                // echo "DATA GAGAL MASUK";
                    $register_massage = "daftar akun gagal,silahkan coba lagi";
                }
            }catch (mysqli_sql_exception) {
                $register_massage = "username sudah ada, silahkan ganti yang lain";
            }
            $db->close();
            // if ($db->query($sql)) {
            //         // echo "OK DATA MASUK";
            //     $register_massage = "daftar akun berhasil,silahkan login";
          
            // } else {
            //     // echo "DATA GAGAL MASUK";
            //     $register_massage = "daftar akun gagal,silahkan coba lagi";
            // } 
            
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "layout/header.html" ?>
    <h3>DAFTAR AKUN</h3>
    <i><?= $register_massage ?></i>
    <form action="register.php" method=POST>
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <button type="submit" name="register">Daftar Sekarang</button>
    </form>
    <?php include "layout/footer.html"?>
</body>
</html>