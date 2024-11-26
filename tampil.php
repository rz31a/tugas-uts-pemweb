<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R STORE</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM5UEqzOcZFJHFAp9zu6uhZ5M7lKhcxlg6rvLx" crossorigin="anonymous">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1a1a1a;
            padding: 10px 20px;
        }
        .navbar .logo img {
            height: 40px;
        }
        .navbar .nav-links {
            display: flex;
            gap: 20px;
        }
        .navbar .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }
        .navbar .nav-icons {
            display: flex;
            gap: 15px;
        }
        .navbar .nav-icons i {
            color: #fff;
            font-size: 18px;
        }
        .hero {
            position: relative;
            color: #fff;
            background-image: url('ai-ferrarry.png'); /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
        }
        .hero .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: left;
        }
        .hero .content h1 {
            font-size: 60px;
            margin: 0;
        }
        .hero .content h2 {
            font-size: 24px;
            margin: 0;
        }
        .hero .content .arrow {
            margin-top: 20px;
            display: inline-block;
            border: 2px solid #fff;
            padding: 10px;
            border-radius: 50%;
        }
        @media (max-width: 768px) {
            .hero .content h1 {
                font-size: 36px;
            }
            .hero .content h2 {
                font-size: 18px;
            }
            .navbar .nav-links {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img alt="Logo" height="40" src="ai-ferrarry.png" width="40"/>
        </div>
        <div class="nav-links">
            <a href="tampil.php">HOME</a> 
            <a href="sejarah.php">SEJARAH</a> 
            <a href="profil.php">PROFILE</a> 
            <a href="store.php">STORE</a> 
            <a href="login.php">LOGIN</a> 
            <a href="login_admin.php">ADMIN</a> 
        </div>
        <div class="nav-icons">
            <i class="fas fa-comments"></i>
            <i class="fas fa-search"></i>
            <i class="fas fa-bars"></i>
        </div>
    </div>
    <div class="hero">
        <div class="content">
            <h2>Pilih</h2>
            <h1>Dan Kendarai<br/>Mobil Impian Mu</h1>
            <div class="arrow">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
    </div>
</body>
</html>
