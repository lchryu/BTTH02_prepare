<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $masv = $_POST['masv'];
    $hoten = $_POST['hoten'];
    $lop = $_POST['lop'];

    // Thêm sinh viên vào cơ sở dữ liệu
    $sql = "INSERT INTO sinhvien (masv, hoten, lop) VALUES (:masv, :hoten, :lop)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['masv' => $masv, 'hoten' => $hoten, 'lop' => $lop]);

    // Chuyển hướng về trang chính
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
</head>

<body>
    <h2>Thêm sinh viên</h2>

    <form method="POST" action="add_student.php">
        <label>Mã SV:</label>
        <input type="text" name="masv" required><br>

        <label>Họ tên:</label>
        <input type="text" name="hoten" required><br>

        <label>Lớp:</label>
        <input type="text" name="lop" required><br>

        <input type="submit" value="Thêm">
    </form>
</body>

</html>
