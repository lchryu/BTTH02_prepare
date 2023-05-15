<?php
require_once 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lấy thông tin sinh viên từ cơ sở dữ liệu
    $sql = "SELECT * FROM sinhvien WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id]);
    $student = $statement->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra xem sinh viên có tồn tại không
    if (!$student) {
        die("Sinh viên không tồn tại");
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin sinh viên</title>
</head>

<body>
    <h2>Sửa thông tin sinh viên</h2>

    <form method="POST" action="update_student.php?id=<?= $id ?>">
        <label>Mã SV:</label>
        <input type="text" name="masv" value="<?= $student['masv'] ?>"><br>

        <label>Họ tên:</label>
        <input type="text" name="hoten" value="<?= $student['hoten'] ?>"><br>

        <label>Lớp:</label>
        <input type="text" name="lop" value="<?= $student['lop'] ?>"><br>

        <input type="submit" value="Lưu">
    </form>
</body>

</html>