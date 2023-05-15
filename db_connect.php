<?php
$host = 'localhost';        // Hostname
$db   = 'qlsv';    // Tên cơ sở dữ liệu
$user = 'root';    // Tên người dùng cơ sở dữ liệu
$pass = '';    // Mật khẩu cơ sở dữ liệu

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Kết nối thành công<br>";
} catch (PDOException $e) {
    die("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
}
