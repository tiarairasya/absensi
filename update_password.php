<?php
include 'koneksi.php';

$username = 'tiara'; 
$password = '1804';   

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("UPDATE users SET password = :password WHERE username = :username");
$stmt->execute(['password' => $hashedPassword, 'username' => $username]);

echo "Password berhasil diubah.";
?>
