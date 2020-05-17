<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa sinh viên</title>
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
<div class="container mb-3">
<?php

if(isset($_POST['submit'])){
    define("host","localhost");
    define("user","root");
    define("pass","");
    define("dbname","tttn");

    $conn = new mysqli(host,user,pass,dbname);

    if($conn->connect_error){
        die('cannot connect database'.$conn->connect_error);
    }

    $masv = $_GET['masv'];
    $sql = "DELETE FROM sv WHERE maSv='$masv'";

    if($conn->query($sql) === TRUE){
        echo "Thành công" . "<br>";
        echo "<a href='../showdulieu/display-sv.php' class='btn btn-success'>Quay lại</a>";
    }else{
        echo "Thất bại ". $conn->error;
    }
    $conn->close();
}

?>
</div>

    <div class="container">
        <div class="jumbotron">
            <h1>Xóa thông tin sinh viên</h1>
            <p><span style="color:red">- Lưu ý: nếu bấm <b>xóa</b> sẽ <b>xóa hết cột</b> của mã sinh viên này</span></p>
            <p><span style="color:red">-Vui lòng bấm vào nút quay lại khi xóa thành công</span></p>
            
        </div>
    </div>

    <div class="container">
    <form action="" method="POST">
        <div class="input-group">
            <input type="text" name="masv" class="form-control" id="nameTag" value="<?php echo htmlspecialchars($_GET['masv']); ?>" disabled>
            <div class="input-group-append">
                <button type="submit" name="submit" class="btn btn-outline-danger">Xóa</button>
            </div>
        </div>
    </form>
    

    <div class="container mt-5">
        <div class="row">
            <a href="../nhapdulieu/nhapthongtin.html" class="btn btn-outline-success col mr-5">Tạo mới thông tin</a>
            <a href="../showdulieu/display-main.html" class="btn btn-outline-primary col mr-5">Xem thông tin</a>
        </div>
    </div>
    </div>

<script>




</body>
</html>