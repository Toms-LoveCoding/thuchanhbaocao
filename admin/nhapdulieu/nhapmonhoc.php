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
        $mamonhoc = $_POST['mamonhoc'];
        $tenmonhoc = $_POST['tenmonhoc'];
        $stc = $_POST['stc'];
        $manganh =$_POST['manganh'];
        $nguoitao = $_POST['nguoitao'];
        $ngaytao = $_POST['ngaytao'];

        $sql = "INSERT INTO monhoc (maMh, tenMh, soTinhChi, maNganh, nguoiTao, ngayTao) VALUES ('$mamonhoc', '$tenmonhoc', '$stc', '$manganh', '$nguoitao', '$ngaytao')";

        if($conn -> query($sql) === TRUE){
            echo "Thêm thành công". "<br>";
            echo "<a href='./nhapsinhvien.html'>Quay lại</a>";
        }else{
            echo "Error " .$sql. "<br>" . $conn->error;
        }

        $conn->close();

    }








?>