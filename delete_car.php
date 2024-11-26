<?php
session_start();
include("koneksi.php");

// Cek apakah pengguna sudah login dan merupakan admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Anda harus login sebagai admin untuk menghapus mobil.');</script>";
    echo "<script>window.location.href = 'login_admin.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_id = $_POST['car_id'];

    // Query untuk menghapus data mobil berdasarkan id
    $query = "DELETE FROM cars WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $car_id);

    if ($stmt->execute()) {
        echo "<script>alert('Mobil berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Gagal menghapus mobil');</script>";
    }

    $stmt->close();
    $koneksi->close();

    // Redirect kembali ke halaman store setelah penghapusan
    echo "<script>window.location.href = 'store.php';</script>";
}
?>