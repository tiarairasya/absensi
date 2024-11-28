<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $sql = "UPDATE siswa SET nama = :nama, kelas = :kelas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nama' => $nama, 'kelas' => $kelas, 'id' => $id]);

    echo "Data siswa berhasil diperbarui!";
    header("Location: lihat_siswa.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM siswa WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $siswa = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<?php if ($siswa): ?>
<form method="POST">
    <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
    <label>Nama: <input type="text" name="nama" value="<?= $siswa['nama'] ?>" required></label><br>
    <label>Kelas: <input type="text" name="kelas" value="<?= $siswa['kelas'] ?>" required></label><br>
    <button type="submit">Perbarui</button>
</form>
<?php else: ?>
<p>Data siswa tidak ditemukan.</p>
<?php endif; ?>
