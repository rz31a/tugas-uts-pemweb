<?php
session_start();
include("koneksi.php");

// Query untuk mengambil data dari tabel 'cars'
$query = 'SELECT * FROM cars';
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sport Car Store</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #111;
            color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header input[type="text"] {
            flex: 1;
            padding: 8px;
            margin: 0 20px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
        }
        .categories {
            display: flex;
            overflow-x: auto;
            padding: 10px 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .categories button {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 20px;
            background-color: #f1f1f1;
            color: #333;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .categories button:hover {
            background-color: #ddd;
        }
        .categories button.active {
            background-color: #ff4b2b;
            color: white;
        }
        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .video-item {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            text-align: center;
        }
        .video-item:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .video-item img {
            width: 100%;
            max-height: 150px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }
        .video-info {
            padding: 15px;
        }
        .video-info .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        .video-info .views {
            font-size: 16px;
            color: #555;
            font-weight: bold;
        }
        .buy-now {
            padding: 10px;
            background-color: #ff4b2b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }
        .delete {
        padding: 10px;
        background-color: #e74c3c;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        margin-top: 10px;
        transition: background-color 0.3s;
        }
        .delete:hover {
            background-color: #c0392b;
        }
        
    </style>
</head>
<body>
    <div class="header">
        <input id="search" placeholder="Search" type="text"/>
    </div>
    <div class="categories">
        <button class="active">STORE</button>
        <button onclick="window.location.href='tampil.php'">Home</button>
        <button onclick="window.location.href='cart.php'">KERANJANG</button>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <button onclick="window.location.href='tambah_mobil.php'">TAMBAH MOBIL BARU</button>
        <?php endif; ?>
        <button onclick="window.location.href='login_admin.php'">ADMIN</button>
        <button onclick="window.location.href='login.php'">LOGIN</button>
    </div>

    <div class="video-grid">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="video-item">
                <?php
                    // Path gambar mobil
                    $imagePath = htmlspecialchars($row['ImageURL']);
                ?>
                <img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($row['Brand'] . ' ' . $row['Model']); ?>" />
                <div class="video-info">
                    <div class="title"><?php echo htmlspecialchars($row['Brand'] . ' ' . $row['Model']); ?></div>
                    <div class="views">Price: $<?php echo number_format($row['Price'], 2); ?></div>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($row['Brand'] . ' ' . $row['Model']); ?>"/>
                        <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($row['Price']); ?>"/>
                        <button type="submit" class="buy-now">Beli Sekarang</button>
                    </form>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <form action="delete_car.php" method="POST">
                        <input type="hidden" name="car_id" value="<?php echo htmlspecialchars($row['id']); ?>"/>
                        <button type="submit" class="delete" onclick="return confirm('Apakah Anda yakin ingin menghapus mobil ini?');">Hapus</button>
                    </form>
                    <?php endif; ?> 
                </div>
                <script>
                    document.getElementById('search').addEventListener('input', function() {
                        const searchTerm = this.value.toLowerCase();  // Ambil kata pencarian dan ubah ke lowercase
                        const items = document.querySelectorAll('.video-item');  // Ambil semua item video
                        items.forEach(item => {
                            const title = item.querySelector('.title').textContent.toLowerCase();  // Ambil judul mobil dan ubah ke lowercase
                            if (title.includes(searchTerm)) {
                                item.style.display = 'block';  // Tampilkan item jika judul cocok
                            } else {
                                item.style.display = 'none';  // Sembunyikan item jika tidak cocok
                            }
                        });
                    });

                </script>
            </div>
        <?php endwhile; ?>
    </div>

</body>
</html>
