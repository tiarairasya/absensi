<?php
session_start();

include 'koneksi.php';

$stmt = $pdo->prepare("SELECT * FROM siswa");
$stmt->execute();
$siswa = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_siswa = $_POST['id_siswa'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("INSERT INTO absensi (id_siswa, tanggal, status) VALUES (:id_siswa, :tanggal, :status)");
    $stmt->execute(['id_siswa' => $id_siswa, 'tanggal' => $tanggal, 'status' => $status]);

    if ($stmt->rowCount() > 0) {
        echo "<script>alert('Absensi berhasil dicatat!');</script>";
    } else {
        echo "<script>alert('Gagal mencatat absensi.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Absensi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #74b9ff, #dfe6e9);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-container h2 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .form-container label {
            font-size: 14px;
            color: #555;
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-container select,
        .form-container input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background: #1E90FF;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .form-container button:hover {
            background: #0056b3;
        }

        input::placeholder, select {
            color: #aaa;
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
        <h2>Form Input Absensi</h2>
        <form method="POST">
            <label for="id_siswa">Siswa</label>
            <select name="id_siswa" id="id_siswa" required>
                <option value="" disabled selected>Pilih siswa</option>
                <?php foreach ($siswa as $s): ?>
                    <option value="<?= htmlspecialchars($s['id']) ?>"><?= htmlspecialchars($s['nama']) ?> (<?= htmlspecialchars($s['kelas']) ?>)</option>
                <?php endforeach; ?>
            </select>

            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" required>

            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="" disabled selected>Pilih status</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alfa">Alfa</option>
            </select>

            <button type="submit">Catat Absensi</button>
        </form>
    </div>
</body>
</html>
