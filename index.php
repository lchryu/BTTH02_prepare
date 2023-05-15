<?php
require_once 'db_connect.php';

// Xử lý thêm sinh viên
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

// Xử lý tìm kiếm
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Truy vấn dữ liệu từ bảng sinh viên với điều kiện LIKE
    $sql = "SELECT * FROM sinhvien WHERE hoten LIKE :search";
    $statement = $pdo->prepare($sql);
    $statement->execute(['search' => "%$search%"]);
    $students = $statement->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Truy vấn dữ liệu từ bảng sinh viên (không tìm kiếm)
    $sql = "SELECT * FROM sinhvien";
    $result = $pdo->query($sql);
    $students = $result->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dữ liệu sinh viên</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Dữ liệu sinh viên</h2>

    <!-- Form tìm kiếm -->
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Nhập từ khóa tìm kiếm">
        <input type="submit" value="Tìm kiếm">
    </form>

    <!-- Form thêm sinh viên -->
    <h3>Thêm sinh viên</h3>
    <form method="POST" action="add_student.php">
        <label>Mã SV:</label>
        <input type="text" name="masv" required><br>

        <label>Họ tên:</label>
        <input type="text" name="hoten" required><br>

        <label>Lớp:</label>
        <input type="text" name="lop" required><br>

        <input type="submit" value="Thêm">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Lớp</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach ($students as $student) { ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['masv'] ?></td>
                <td><?= $student['hoten'] ?></td>
                <td><?= $student['lop'] ?></td>
                <td>
                    <a href="edit_student.php?id=<?= $student['id'] ?>">Sửa</a>
                    <a href="delete_student.php?id=<?= $student['id'] ?>">Xoá</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>