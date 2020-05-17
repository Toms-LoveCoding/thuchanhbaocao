<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật môn học</title>

                       <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<?php

    define("host","localhost");
    define("user","root");
    define("pass","");
    define("dbname","tttn");

    $conn = new mysqli(host,user,pass,dbname);

    if($conn->connect_error){
        die('cannot connect database');
    }

    $mamh = $_GET['mamh'];

    $sql = "SELECT * FROM monhoc WHERE maMh='$mamh'";
    $query = $conn->query($sql);

    if($query->num_rows > 0){
        $arrdt = $query->fetch_assoc();
    }

    if(isset($_POST['submit'])){
        $tenMh = $_POST['tenMh'];
        $sotinhchi = $_POST['sotinhchi'];
        $maN = $_POST['maN'];
        $nguoitao = $_POST['nguoitao'];
        $ngaytao = $_POST['ngaytao'];
        
        $update = "UPDATE monhoc SET tenMh='$tenMh', soTinhChi='$sotinhchi', maNganh='$maN', nguoiTao='$nguoitao',  ngayTao='$ngaytao'";
        if($conn->query($update) === TRUE){
            echo "Thành công";
        }else{
            echo "thất bại ".$conn->error;
        }

        $conn->close();
    }

    

?>


<div class="container">
    <div class="jumbotron">
        <h1>Cập nhật môn học</h1>
    </div>
    <form action="" method="POST">
        <div class="form-group">
            <label>tên môn học</label>
            <input type="text" class="form-control" name="tenMh" placeholder="Tên môn học">
        </div>

        <div class="form-group">
            <label>Số tính chỉ</label>
            <input type="text" class="form-control" name="sotinhchi" placeholder="số tính chỉ">
        </div>

        <div class="form-group">
            <label>Mã ngành</label>
            <input type="text" class="form-control" name="maN" placeholder="mã ngành">
        </div>

        <div class="form-group">
            <label>Người tạo</label>
            <input type="text" class="form-control" name="nguoitao" placeholder="người tạo">
        </div>

        <div class="form-group">
            <label>ngày tạo</label>
            <input type="date" class="form-control" name="ngaytao">
        </div>
        <input type="submit" name="submit" value="sửa" class="btn btn-success">
        <a href="../showdulieu/display-monhoc.php" class="btn btn-primary">Xem</a>


    </form>
</div>


</body>
</html>