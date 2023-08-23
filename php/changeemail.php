<?php
 session_start();
 
 $servername = "localhost";
 $username = "thuha";
 $password = "hanguyen1";
 $dbname = "qlct";
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    echo("Kết nối thất bại: " . mysqli_connect_error());
}


    // Lấy thông tin người dùng từ session
    $email = $_SESSION['username'];
$name=$_POST['email-moi'];
    // Cập nhật ảnh đại diện mới vào CSDL
    $sql = "SET FOREIGN_KEY_CHECKS=0";
    $conn->query($sql);
    $sql1 = "UPDATE thongtindangnhap SET Email='$name' WHERE Email='$email'";
$sql2 = "UPDATE thongtinthanhvien SET Email='$name' WHERE Email='$email'";
$sql3="UPDATE thu SET Email='$name' WHERE Email='$email'"
$sql3="UPDATE chi SET Email='$name' WHERE Email='$email'"
mysqli_query($conn, $sql1);
mysqli_query($conn, $sql2);
$sql = "SET FOREIGN_KEY_CHECKS=1";
$conn->query($sql);

    if (mysqli_query($conn, $sql1)&&mysqli_query($conn, $sql2)) {
        $_SESSION['username']=$name;
        header("Location: profile.php");
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
