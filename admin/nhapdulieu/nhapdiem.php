<?php

$host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "tttn";

    $conn = new mysqli($host, $user, $pass, $dbname);

    if($conn -> connect_error){
        die("Connection Failed: " . $conn -> connect_error);
    }

    if(isset($_POST['submit'])){
        $madiem = $_POST['madiem'];
        $masv = $_POST['masv'];
        $mamh = $_POST['mamh'];
        $malop = $_POST['malop'];
        $quatrinh1 = $_POST['qt1'];
        $quatrinh2 = $_POST['qt2'];
        $lythuyet1 = $_POST['lt1'];
        $lythuyet2 = $_POST['lt2'];
        $tbm = $_POST['tbm'];
        $nguoitao = $_POST['nguoitao'];
        $ngaytao = $_POST['ngaytao'];

        $sql = "INSERT INTO diem (maDiem, maSv, maMh, maLop, diemQT1, diemQT2, diemLT1, diemLT2, tbMon, nguoiTao, ngayTao) VALUES ('$madiem','$masv','$mamh','$malop','$quatrinh1','$quatrinh2','$lythuyet1','$lythuyet2','$tbm','$nguoitao','$ngaytao')";

        if($conn -> query($sql) === TRUE){
            echo "Thêm thành công";
        }else{
            echo "Error: " . $sql. "<br>". $conn->error;
        }




    }

    $conn->close();



?>