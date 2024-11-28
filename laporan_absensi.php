<?php
session_start();
include 'koneksi.php';

$data = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];

    $stmt = $pdo->prepare(
        "SELECT absensi.id, siswa.nama, siswa.kelas, absensi.tanggal, absensi.status 
         FROM absensi 
         JOIN siswa ON absensi.id_siswa = siswa.id 
         WHERE absensi.tanggal BETWEEN :tanggal_mulai AND :tanggal_selesai"
    );
    $stmt->execute(['tanggal_mulai' => $tanggal_mulai, 'tanggal_selesai' => $tanggal_selesai]);
    $data = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Absensi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #6ab7ff, #dfe6e9);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        form {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            margin-bottom: 20px;
        }

        form h2 {
            font-size: 22px;
            margin-bottom: 15px;
            text-align: center;
            color: #333;
        }

        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
            font-weight: bold;
        }

        input[type="date"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background: #f9f9f9;
        }

        button {
            background-color: #1E90FF;
            color: white;
            border: none;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 14px;
        }

        th {
            background: #1E90FF;
            color: #ffffff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        @media (max-width: 600px) {
            table {
                width: 100%;
            }

            form {
                padding: 15px;
            }

            form h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <form method="POST">
        <h2>Laporan Absensi</h2>
        <label for="tanggal_mulai">Tanggal Mulai:</label>
        <input type="date" name="tanggal_mulai" id="tanggal_mulai" required>
        
        <label for="tanggal_selesai">Tanggal Selesai:</label>
        <input type="date" name="tanggal_selesai" id="tanggal_selesai" required>
        
        <button type="submit">Tampilkan</button>
    </form>

    <?php if (!empty($data)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['kelas'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['status'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p style="text-align: center; color: #555;">Tidak ada data untuk rentang tanggal tersebut.</p>
    <?php endif; ?>
</body>
</html>
