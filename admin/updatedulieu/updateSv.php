<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update sinh viên</title>
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


// create the connection to the mysql database
define("host","localhost");
define("user","root");
define("pass","");
define("dbname","tttn");


$conn = new mysqli(host,user,pass,dbname);


    if($conn->connect_error){
        die("cannot connect database");
    }

    $masv = $_GET['masv'];
    
    $sql = "SELECT * FROM sv WHERE maSv='$masv'";
    $query1 = $conn->query($sql);

    if($query1->num_rows > 0){
        $arrdt = $query1->fetch_assoc();
    }
    
    if(isset($_POST['submit'])){
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachitgt = $_POST['diachithuongtru'];
        $diachitt = $_POST['diachitamtru'];
        $maN = $_POST['manganh'];

        $update = "UPDATE sv SET hotenSv='$hoten', ngaySinh='$ngaysinh', diachiThuongTru='$diachitgt', diachiTamTru='$diachitt', maNganh='$maN' WHERE maSv='$masv'";

        if($conn->query($update) === TRUE){
            echo "thành công";
        }else{
            echo "Thất bại. " .$conn->error;
        }
    }
    
    $conn->close();


?>

    <div class="container mb-5">
        <div class="jumbotron">
            <h1>Cập nhật thông tin sinh viên</h1>
        </div>

        <form action="" method="POST">
            <div class="form-group">
                <label>Mã sinh viên</label>
                <input type="text" value="<?php echo htmlspecialchars($_GET['masv']);?>" disabled class="form-control">
            </div>

            <div class="form-group">
                <label for="ht">họ tên</label>
                <input type="text" id="ht" class="form-control" name="hoten" placeholder="Sửa họ tên">
            </div>
            <div class="form-group mt-3">
                <label for="id2">ngày sinh</label>
                <input type="date" id="id2" class="form-control" name="ngaysinh">
            </div>
            <div class="form-group mt-3" >
                <label for="id3">địa chỉ thường trú</label>
                <input type="text" id="id3" class="form-control" name="diachithuongtru" placeholder="địa chỉ thường trú">
            </div>
            <div class="form-group mt-3">
                <label for="id4">địa chỉ tạm trú</label>
                <input type="text" id="id4" class="form-control" name="diachitamtru" placeholder="địa chỉ tạm trú">
            </div>
            <div class="form-group mt-3">
                <label for="id5">ngành học</label>
                <input type="text" id="id5" class="form-control" name="manganh" placeholder="mã ngành">
            </div>
            <input type="submit" name="submit" value="sửa" class="btn btn-success">
            <a href="../showdulieu/display-sv.php" class="btn btn-primary">Xem</a>
        </form>
                
    </div>





</body>
</html>