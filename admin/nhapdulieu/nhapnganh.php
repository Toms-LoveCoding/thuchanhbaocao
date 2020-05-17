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
    
    $maN = $_POST['manganh'];
    $tenN = $_POST['tennganh'];
    $nguoitao = $_POST['nguoitao'];
    $ngaytao = $_POST['ngaytao'];


    $sql = "INSERT INTO nganh (maNganh, tenNganh, nguoiTao, ngayTao) VALUES ('$maN','$tenN','$nguoitao','$ngaytao')";

    if($conn->query($sql) === TRUE){
        echo "Thêm thành công";
    }else{
        echo "Error: " .$sql. "<br>". $conn->error;
    }

    $conn->close();




}





?>