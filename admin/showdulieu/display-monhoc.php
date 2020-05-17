<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>danh sách môn học</title>

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
        <table class="table table-striped">
            <thead>
                <tr>
                   <th>Mã môn</th>
                   <th>tên môn học</th>
                   <th>số tính chỉ</th>
                   <th>mã ngành</th>
                   <th>người tạo</th>
                   <th>ngày tạo</th>
                   <th><a href="../nhapdulieu/nhapmonhoc.html">Thêm</a></th>
                   <th><a href="../showdulieu/display-main.html">Xem</a></th>
                </tr>
            </thead>
            <tbody>

            <?php

$sql = "SELECT * FROM monhoc ORDER BY maMh";
$rs = $conn -> query($sql);

if($rs -> num_rows > 0){
    while($row = $rs->fetch_assoc()){
        $maMh = $row['maMh'];
        $tenMh = $row['tenMh'];
        $soTinhChi = $row['soTinhChi'];
        $manganh = $row['maNganh'];
        $nguoiTao= $row['nguoiTao'];
        $ngaytao = $row['ngayTao'];

        echo " <tr>
        <td>$maMh</td>
        <td>$tenMh</td>
        <td>$soTinhChi</td>
        <td>$manganh</td>
        <td>$nguoiTao</td>
        <td>$ngaytao</td>
        <td><a href='../updatedulieu/updateMH.php?mamh=".$maMh."'>Sửa</a></td>
        <td><a href='../deldulieu/xoamonhoc.php?mamh=".$maMh."'>Xóa</a></td>
        </tr>";
    }
}


?>

            </tbody>
        </table>

    </div>






</body>

</html>