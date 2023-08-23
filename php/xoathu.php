<?php 
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "thuha";
$password = "hanguyen1";
$dbname = "qlct";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
    echo "Ket noi that bai";
}

// Xử lý khi người dùng nhấn nút Xóa
i$sql = "DELETE FROM khoanthu WHERE Email='$email' AND DanhMuc='$danhmuc' AND NgayThu='$date'";
if (mysqli_query($conn, $sql)) {
    echo "Xóa khoản thu thành công.";
} else {
    echo "Lỗi: " . mysqli_error($conn);
}

// Đóng kết nối
mysqli_close($conn);


