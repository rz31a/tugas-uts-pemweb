<?php 
$host = "localhost";
$user = "root";
$password = "";
$dbname = "mobil";

// Mengaktifkan report kesalahan untuk mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Membuat koneksi
    $koneksi = new mysqli($host, $user, $password, $dbname);
} catch (Exception $e) {
    // Jika koneksi gagal, hentikan program dan tampilkan pesan
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
