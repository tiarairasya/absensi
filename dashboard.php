<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://images.pexels.com/photos/3184450/pexels-photo-3184450.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080&dpr=2');
            background-size: cover; 
            background-position: center center; 
            background-attachment: fixed; 
            text-align: center;
            padding: 50px;
            color: white; 
        }
        h1 {
            color: black;
        }
        .menu {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 40px;
        }
        .menu a {
            display: block;
            text-align: center;
            width: 180px;
            height: 230px;
            padding-top: 15px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: #333;
            transition: transform 0.3s, background-color 0.3s;
        }
        .menu img {
            width: 120px;  
            height: 120px;
            margin-bottom: 15px;
            transition: transform 0.3s, opacity 0.3s; 
        }
        .menu a:hover {
            background-color: #007BFF; 
            color: white;
            transform: scale(1.05); 
        }
        .menu a:hover img {
            transform: scale(1.1);
            opacity: 0.9; 
        }
        .logout-button {
            text-align: center;
            margin-top: 50px; 
        }
        .logout-button a {
            display: inline-block;
            padding: 15px 30px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 18px; 
            transition: background-color 0.3s; 
        }
        .logout-button a:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?>!</h1>
    
    <div class="menu">
        <a href="input_absensi.php">
            <img src="https://www.talenta.co/wp-content/uploads/2020/07/Untitled-design-13-352x235.png" alt="Input Absensi">
            <p>Input Absensi</p>
        </a>
        <a href="input_siswa.php">
            <img src="https://davidgrcias.github.io/frontend/assets/images/absen.png" alt="Input Siswa">
            <p>Input Siswa</p>
        </a>
        <a href="laporan_absensi.php">
            <img src="https://fasttrack.donisamultimandiri.com/content/logo/donisa.jpg" alt="Laporan Absensi">
            <p>Laporan Absensi</p>
        </a>
        <a href="lihat_absensi.php">
            <img src="https://cerdig.com/wp-content/uploads/2023/09/Bagaimana-Aplikasi-Absensi-Meningkatkan-Komunikasi-Guru-Siswa-dan-Orang-Tua-298x300.jpg" alt="Lihat Absensi">
            <p>Lihat Absensi</p>
        </a>
    </div>

    <div class="logout-button">
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
