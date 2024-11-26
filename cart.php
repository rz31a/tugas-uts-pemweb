<?php
session_start();

// Cek apakah keranjang sudah ada di sesi, jika belum buat array kosong
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Cek jika ada data yang dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    
    // Validasi harga sebelum menyimpannya
    $productPrice = filter_var($productPrice, FILTER_VALIDATE_FLOAT);
    if ($productPrice === false) {
        $productPrice = 0.00;
    }

    // Cek apakah produk sudah ada di keranjang
    $found = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['name'] == $productName) {
            $_SESSION['cart'][$key]['quantity']++;
            $found = true;
            break;
        }
    }
    if (!$found) {
        // Tambahkan produk baru ke dalam sesi keranjang
        $item = array(
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => 1
        );
        $_SESSION['cart'][] = $item;
    }
}

// Menghapus atau Mengurangi item dari keranjang
if (isset($_GET['action']) && isset($_GET['name'])) {
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['name'] == $_GET['name']) {
            if ($_GET['action'] == 'remove') {
                unset($_SESSION['cart'][$key]);
            } elseif ($_GET['action'] == 'decrease' && $item['quantity'] > 1) {
                $_SESSION['cart'][$key]['quantity']--;
            }
            break;
        }
    }
    // Reset array keys untuk memastikan tidak ada celah dalam array
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
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
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            background-color: #0d0d0d;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        .header input[type="text"] {
            padding: 8px;
            margin: 0 20px;
            border: 1px solid #333;
            border-radius: 20px;
            background-color: #333;
            color: #fff;
            outline: none;
        }
        .cart-container {
            margin-top: 20px;
        }
        .cart-item {
            background-color: #222;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            transition: transform 0.3s;
            text-align: left;
        }
        .cart-item:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0,0,0,0.4);
        }
        .cart-item p {
            margin: 0;
            padding: 5px 0;
        }
        .cart-item .actions {
            margin-top: 10px;
        }
        .cart-item .actions a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
            font-weight: bold;
        }
        .cart-item .actions a:hover {
            text-decoration: underline;
        }
        .checkout, .back-to-store {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 10px;
            border: none;
            border-radius: 20px;
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .checkout:hover, .back-to-store:hover {
            background-color: #0056b3;
        }
        .empty-cart {
            text-align: center;
            margin: 50px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <input id="search" placeholder="Search" type="text"/>
        </div>
        <div class="cart-container" id="cartContainer">
            <h2>Keranjang Belanja</h2>
            <?php
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    echo "<div class='cart-item'>";
                    echo "<p class='item-title'>{$item['name']} - $" . number_format($item['price'], 2) . " x {$item['quantity']}</p>";
                    echo "<div class='actions'>";
                    echo '<a href="?action=decrease&name=' . urlencode($item['name']) . '">Kurangi</a>';
                    echo '<a href="?action=remove&name=' . urlencode($item['name']) . '">Hapus</a>';
                    echo "</div>";
                    echo "</div>";
                }
                echo '<a href="checkout.php" class="checkout">Lanjutkan ke Pembayaran</a>';
                echo '<a href="store.php" class="back-to-store">Kembali ke Store</a>';
            } else {
                echo "<p class='empty-cart'>Keranjang Anda kosong</p>";
                echo '<a href="store.php" class="back-to-store">Kembali ke Store</a>';
            }
            ?>
        </div>
    </div>
    <script>
        document.getElementById('search').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const items = document.querySelectorAll('.cart-item');
            items.forEach(item => {
                const title = item.querySelector('.item-title').textContent.toLowerCase();
                if (title.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
