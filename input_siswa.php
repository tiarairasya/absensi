<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $stmt = $pdo->prepare("INSERT INTO siswa (nama, kelas) VALUES (:nama, :kelas)");
    $stmt->execute(['nama' => $nama, 'kelas' => $kelas]);

    if ($stmt->rowCount() > 0) {
        echo "<script>alert('Data siswa berhasil ditambahkan!');</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data siswa.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Siswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #6ab7ff, #dfe6e9);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .form-container h2 {
            font-size: 24px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
            font-weight: bold;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background: #f9f9f9;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            background-color: #1E90FF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 20px;
            }
            .form-container h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Form Input Siswa</h2>
        <form method="POST">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan nama siswa" required>
            
            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" id="kelas" placeholder="Masukkan kelas siswa" required>
            
            <button type="submit">Tambah Siswa</button>
        </form>
    </div>
</body>
</html>
