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
if(isset($_POST['xoa'])) {
    $email = $_POST['email'];
    $danhmuc = $_POST['danhmuc'];
    $date = $_POST['date'];
echo $email;
echo $danhmuc;
echo $date;
    $sql = "DELETE FROM thu WHERE Email='$email' AND DanhMuc='$danhmuc' AND Date='$date'";
    $result = mysqli_query($conn, $sql);

    // Kiểm tra xem có lỗi xảy ra hay không
    if(!$result) {
        echo "Lỗi: " . mysqli_error($conn);
    } else {
        // Chuyển người dùng về lại trang hiển thị dữ liệu hoặc làm mới trang để hiển thị dữ liệu mới
       
    }
}

