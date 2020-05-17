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
                   <th>Mã Ngành</th>
                   <th>Tên Ngành</th>
                   <th>người Tạo</th>
                   <th>ngày Tạo</th>
                </tr>
            </thead>
            <tbody>

            <?php

$sql = "SELECT * FROM nganh ORDER BY maNganh";
$rs = $conn -> query($sql);

if($rs -> num_rows > 0){
    while($row = $rs->fetch_assoc()){
        $maNganh= $row['maNganh'];
        $tenNganh = $row['tenNganh'];
        $nguoiTao= $row['nguoiTao'];
        $ngayTao = $row['ngayTao'];

        echo " <tr>
        <td>$maNganh</td>
        <td>$tenNganh</td>
        <td>$nguoiTao</td>
        <td>$ngayTao</td>
        <td><a href='#'>Sửa</a></td>
        <td><a href='#'>Xóa</a></td>
        </tr>";
    }
}


?>

            </tbody>
        </table>

    </div>






</body>

</html>