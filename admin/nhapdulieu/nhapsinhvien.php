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

        $masv = $_POST['masv'];
        $hoten = $_POST['hoten'];
        $hinhanh = $_POST['hinhanh'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachithuongtru = $_POST['diachithgt'];
        $diachitamtru = $_POST['diachitt'];
        $manganh = $_POST['manganh'];
        $nguoitao = $_POST['nguoitao'];
        $ngaytao = $_POST['ngaytao'];
    $sql = "INSERT INTO sv (maSv, hotenSv, hinhAnh, ngaySinh, diachiThuongTru, diachiTamTru, maNganh, nguoiTao, ngayTao) VALUES ('$masv','$hoten','$hinhanh','$ngaysinh','$diachithuongtru','$diachitamtru','$manganh','$nguoitao','$ngaytao')";
    
        if($conn -> query($sql)){
            echo "Thêm  thành công <br>";
            echo "<a href='./nhapsinhvien.html'>Quay lại</a>";
        }else{
            echo "Error " .$sql. "<br>". $conn->error;
        }

    }

        $conn ->close();
?>