<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>danh sách sv</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<style>
:root{
    font-size: .9rem;
}
table,th,td{
    border: 1px solid #333;
    border-collapse: collapse;
}
</style>

</head>

<body>
<?php

define("host","localhost");
define("user","root");
define("pass","");
define("dbname","tttn");


$conn = new mysqli(host,user,pass,dbname);

if($conn -> connect_error){
    die("cant connect to database");
}

?>

    <div class="container">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Họ tên sinh viên</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ thường trú</th>
                    <th>Địa chỉ tạm trú</th>
                    <th>Mã ngành</th>
                    <th>Người tạo</th>
                    <th>Ngày tạo</th>
                    <th><a href="../nhapdulieu/nhapthongtin.html">Thêm</a></th>
                    <th><a href="./display-main.html">Xem</a></th>
                </tr>
            </thead>
            <tbody>

            <?php

$sql = "SELECT * FROM sv ORDER BY hotenSv";
$rs = $conn -> query($sql);


if($rs -> num_rows > 0){
    while($row = $rs->fetch_assoc()){
        $masv = $row['maSv'];
        $hoten = $row['hotenSv'];
        $ngaysinh = $row['ngaySinh'];
        $diachiThuongTru = $row['diachiThuongTru'];
        $diachitamtru = $row['diachiTamTru'];
        $manganh = $row['maNganh'];
        $nguoitao = $row['nguoiTao'];
        $ngaytao = $row['ngayTao'];

        echo " <tr>
        <td>$masv</td>
        <td>$hoten</td>
        <td>$ngaysinh</td>
        <td>$diachiThuongTru</td>
        <td>$diachitamtru</td>
        <td>$manganh</td>
        <td>$nguoitao</td>
        <td>$ngaytao</td>
        <td><a href='../updatedulieu/updateSv.php?masv=".$masv."'>Sửa</a></td>
        <td><a href='../deldulieu/xoasinhvien.php?masv=".$masv."'>Xóa</a></td>
        </tr>";
    }
}


?>

            </tbody>
        </table>

    </div>






</body>

</html>