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
$name=$_POST['tuoi-moi'];
    // Cập nhật ảnh đại diện mới vào CSDL
    $sql = "UPDATE thongtinthanhvien SET Birthday='$name' WHERE Email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Thay đổi ảnh đại diện thành công";
        header("Location: profile.php");
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
