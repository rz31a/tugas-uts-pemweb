<?php
session_start();
include 'koneksi.php';

// Cek apakah pengguna sudah login dan merupakan admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Anda harus login sebagai admin untuk menambah mobil baru.');</script>";
    echo "<script>window.location.href = 'login_admin.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];

    // Direktori penyimpanan gambar
    $targetDir = "uploads/";
    $imageFileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $imageFileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Cek apakah file gambar valid
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        // Izinkan hanya format gambar tertentu
        $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array(strtolower($fileType), $allowedTypes)) {
            // Pindahkan file ke folder uploads
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                $imageURL = $targetFilePath; // Simpan jalur file ke database

                // Menyisipkan data baru ke tabel 'cars' dengan prepared statement
                $stmt = $koneksi->prepare("INSERT INTO cars (Model, Brand, Price, ImageURL) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssds", $name, $brand, $price, $imageURL);

                if ($stmt->execute()) {
                    echo "<script>alert('Mobil baru berhasil ditambahkan');</script>";
                    echo "<script>window.location.href = 'store.php';</script>"; // Redirect ke halaman store
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "<script>alert('Gagal mengunggah gambar');</script>";
            }
        } else {
            echo "<script>alert('Format file gambar tidak didukung');</script>";
        }
    } else {
        echo "<script>alert('Harap unggah file gambar');</script>";
    }
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('background-car.jpg'); /* Ganti dengan path gambar background Anda */
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }
        .form-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .form-container input, .form-container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        .form-container input {
            background-color: white;
            color: black;
        }
        .form-container button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Mobil Baru</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="name">Nama Model:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="brand">Merek:</label>
            <input type="text" id="brand" name="brand" required><br>

            <label for="price">Harga:</label>
            <input type="number" id="price" name="price" step="0.01" required><br>

            <label for="image">Unggah Gambar:</label>
            <input type="file" id="image" name="image" required><br>

            <button type="submit">Tambah Mobil</button>
        </form>
    </div>
</body>
</html>
