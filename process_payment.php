<?php
session_start();

// Proses pembayaran (contoh sederhana, tanpa integrasi gateway)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $paymentMethod = $_POST['payment_method'];

    // Kosongkan keranjang setelah pembayaran
    unset($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .confirmation-container {
            text-align: center;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        h2 {
            color: #4CAF50;
        }
        p {
            font-size: 18px;
            margin: 10px 0;
        }
        .button-container {
            margin-top: 20px;
        }
        .button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <h2>Terima Kasih, <?php echo htmlspecialchars($name); ?>!</h2>
        <p>Pembelian Anda telah berhasil diproses.</p>
        <p>Detail pengiriman ke alamat: <?php echo htmlspecialchars($address); ?></p>
        <p>Metode Pembayaran: <?php echo htmlspecialchars($paymentMethod); ?></p>
        <div class="button-container">
            <a href="tampil.php" class="button">Kembali ke Home</a>
        </div>
    </div>
</body>
</html>
