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


    // Lấy thông tin file ảnh
    $avatar = $_FILES['avatar']['tmp_name'];
    $avatarType = $_FILES['avatar']['type'];
    $avatarSize = $_FILES['avatar']['size'];

    // Kiểm tra nếu file không phải ảnh
    if (($avatarType != "image/gif")
        && ($avatarType != "image/jpeg")
        && ($avatarType != "image/png")
        && ($avatarType != "image/jpg")
    ) {
        echo("Lỗi: File không phải ảnh");
    }

    // Chuyển đổi file ảnh sang dạng binary để lưu vào CSDL
    

    // Lấy thông tin người dùng từ session
    $email = $_SESSION['username'];
$name=$_POST['ten-moi']
    // Cập nhật ảnh đại diện mới vào CSDL
    $sql = "UPDATE thongtinthanhvien SET Name='$name' WHERE Email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Thay đổi ảnh đại diện thành công";
        header("Location: profile.php");
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
