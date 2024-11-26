<?php
session_start();
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];

// Validasi format email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // menyeleksi data pada tabel Users
    $user_data = mysqli_query($koneksi, "SELECT * FROM Users WHERE email='$email' AND password='$password'");
    $user_count = mysqli_num_rows($user_data);

    // menyeleksi data pada tabel Admins
    $admin_data = mysqli_query($koneksi, "SELECT * FROM Admins WHERE email='$email' AND password='$password'");
    $admin_count = mysqli_num_rows($admin_data);

    if($admin_count > 0){
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "admin";
        header("location:tampil.php");
    } elseif ($user_count > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "user";
        header("location:tampil.php");
    } else {
        echo "<script>alert('Login gagal! Email dan password tidak benar');</script>";
        echo "<script>window.location ='form_login.php';</script>";
    }
} else {
    echo "<script>alert('Format email tidak valid');</script>";
    echo "<script>window.location ='form_login.php';</script>";
}
?>
