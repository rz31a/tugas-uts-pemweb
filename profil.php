<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna - R Store</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #111;
            color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .navbar .logo img {
            height: 40px;
        }
        .navbar .nav-links a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }
        .navbar .nav-icons i {
            color: white;
            margin-left: 10px;
            font-size: 18px;
            cursor: pointer;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 300px;
            background-image: url('aventador.jpg'); /* Ganti dengan URL gambar mobil Anda */
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
        }
        .header h1 {
            font-size: 3em;
        }
        .header p {
            font-size: 1.2em;
        }
        .container {
            padding: 20px;
            max-width: 800px;
            margin: auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .profile-pic {
            display: block;
            margin: 20px auto;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h2 {
            color: #4CAF50;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            line-height: 1.6;
            text-align: center;
        }
        .footer {
            background-color: #111;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img alt="Logo" src="ai-ferrarry.png"/>
        </div>
        <div class="nav-links">
            <a href="tampil.php">HOME</a>
            <a href="sejarah.php">SEJARAH</a>
            <a href="profil.php">PROFILE</a> 
            <a href="store.php">STORE</a>
            <a href="login.php">LOGIN</a>
        </div>
        <div class="nav-icons">
            <i class="fas fa-comments"></i>
            <i class="fas fa-search"></i>
            <i class="fas fa-bars"></i>
        </div>
    </div>
    
    <div class="header">
        <div>
            <h1>R STORE</h1>
          
        </div>
    </div>
    
    <div class="container">
        <img alt="Profile Picture" class="profile-pic" src="rza.jpg"/>
        <h2>REZA PUTRA PRATAMA</h2>
        <p>Email: reza.putra31@mhs.itenas.ac.id</p>
        <p>Tanggal Bergabung: 31 Agustus 2021</p>
        <p>Pesanan Terakhir: 15 Januari 2024</p>
    </div>
    
    <div class="footer">
        <p>© 2024 R Store. All rights reserved.</p>
    </div>
</body>
</html>
