<?php
session_start();

// Hitung total harga
$totalPrice = 0;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $totalPrice += $item['price'] * $item['quantity'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a1a1a;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background-color: #0d0d0d;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.5);
            width: 400px;
        }
        h2 {
            color: #007bff;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-size: 16px;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            border: 1px solid #333;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            outline: none;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .cart-button {
            background-color: #555;
            margin-top: 10px;
        }
        .cart-button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Checkout</h2>
        <p>Total: $<?php echo number_format($totalPrice, 2); ?></p>
        
        <form action="process_payment.php" method="POST">
            <label>Nama:</label>
            <input type="text" name="name" required>
            
            <label>Alamat:</label>
            <textarea name="address" required></textarea>
            
            <label>Metode Pembayaran:</label>
            <select name="payment_method" required>
                <option value="credit_card">Kartu Kredit</option>
                <option value="paypal">PayPal</option>
            </select>
            
            <button type="submit">Bayar Sekarang</button>
        </form>
        
        <!-- Tombol Ke Keranjang -->
        <a href="cart.php" class="cart-button"><button type="button">Lihat Keranjang</button></a>
    </div>
</body>
</html>
