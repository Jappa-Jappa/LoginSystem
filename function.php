<?php

//koneksi
$connection = mysqli_connect('localhost','root','','loginsystem');

//register
if (isset($_POST['register'])) {
    //jika tombol submit register diklik

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password']; //belum di enkripsi

    //fungsi enkripsi 
    $encriptPassword = password_hash($password, PASSWORD_DEFAULT);

    //insert into database
    $insert = mysqli_query($connection, "INSERT INTO user (nama,username,password) VALUES ('$nama', '$username', '$encriptPassword')");

    if ($insert) {
        //jika berhasil
        echo '
        <script>
            alert("Registrasi berhasil silahkan login");
            window.location.href="login.php";
        </script>
        ';
    } else {
        //jika gagal
        echo '
        <script>
            alert("Registrasi gagal");
            window.location.href="register.php";
        </script>
        ';
    }
}

//login
if (isset($_POST['login'])) {
    //jika tombol submit login diklik

    $username = $_POST['username'];
    $password = $_POST['password']; //belum di enkripsi

    //insert into database
    $checkdb = mysqli_query($connection, "SELECT * FROM user where username='$username'");
    $hitung = mysqli_num_rows($checkdb);
    $pw = mysqli_fetch_array($checkdb);
    $passwordsekarang = $pw['password'];

    if ($hitung>0) {
        //jika berhasil
        //verifikasi password
        if(password_verify($password,$passwordsekarang)){
            //jika password benar
            header('location:home.php');
        } else{
            //jika password salah
            echo '
        <script>
            alert("Your password is incorrect please try again");
            window.location.href="login.php";
        </script>
        ';
        }

    } else {
        //jika gagal
        echo '
        <script>
            alert("Cannot log in please try again");
            window.location.href="login.php";
        </script>
        ';
    }
}

?>

