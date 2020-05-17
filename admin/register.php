<?php

if(isset($_POST['submit'])){
    $u=$p="";
if($_POST['user'] == NULL){
    echo "please type your user name";
}else{
    $u = $_POST['user'];
}

if($_POST['password'] == NULL){
    echo "please type your pass word";
}else{
    $p = $_POST['password'];
}

if($u && $p){
    $host = "localhost";
 $user = "root";
 $pass = "";
 $dbname = "tttn";

 $conn = new mysqli($host,$user,$pass,$dbname)or die("Failed to connect to MYSQL: " .connect_error());


    $sql = "select * from registeredadmin where username = '".$u."'and password ='".$p."' ";
    $query = $conn->query($sql);

    if($query->num_rows == 0){
        echo "Tên hoặc mật khẩu không đúng, vui lòng nhập lại";
    }else{
        echo "thanh cong";
        header("location: ./nhapdulieu/nhapthongtin.html");
        
    }
    exit();
    }
}
