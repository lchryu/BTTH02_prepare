<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $masv = $_POST['masv'];
    $hoten = $_POST['hoten'];
    $lop = $_POST['lop'];

    // Cập nhật thông tin sinh viên trong cơ sở dữ liệu
    $sql = "UPDATE sinhvien SET masv = :masv, hoten = :hoten, lop = :lop WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['masv' => $masv, 'hoten' => $hoten, 'lop' => $lop, 'id' => $id]);

    // Chuyển hướng về trang chính
    header("Location: index.php");
    exit();
}
