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
    // Chuyển đổi file ảnh sang dạng binary để lưu vào CSDL
    $avatarData = addslashes(file_get_contents('../image/defautavatar.png'));

    // Lấy thông tin người dùng từ session
    $email = $_SESSION['username'];

    // Cập nhật ảnh đại diện mới vào CSDL
    $sql = "UPDATE thongtinthanhvien SET Avatar='$avatarData' WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: profile.php");
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
