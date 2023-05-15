<?php
require_once 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa sinh viên từ cơ sở dữ liệu
    $sql = "DELETE FROM sinhvien WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id]);

    // Chuyển hướng về trang chính
    header("Location: index.php");
    exit();
}
