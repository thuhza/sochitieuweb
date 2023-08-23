<?php
 session_start();
$servername = "localhost";
$username = "thuha";
$password = "hanguyen1";
$dbname = "qlct";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
    echo "Ket noi that bai";
}
    $note = $_POST['note'];
    $giatri = $_POST['giatri'];
    $danhmuc = $_POST['danhmuc'];
    $date = $_POST['date'];
    $email=$_SESSION['username'];
    // Thực hiện insert dữ liệu vào database
    $sql = "SELECT * FROM thu WHERE Email='$email' AND DanhMuc='$danhmuc' AND Date='$date'";
    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Nếu đã có bản ghi thì cập nhật lại GiaTri bằng tổng của GiaTri cũ và mới
  $row = mysqli_fetch_assoc($result);
 
  $giatri_cu = $row['GiaTri'];
  $giatri_moi = $giatri_cu + $giatri;
  
  $sql_update = "UPDATE thu SET GiaTri='$giatri_moi' WHERE Email='$email' AND DanhMuc='$danhmuc' AND Date='$date'" ;
  mysqli_query($conn, $sql_update);
  header("Location: index.php");
} else {
  // Nếu chưa có bản ghi thì thêm mới vào cơ sở dữ liệu
  $sql_insert = "INSERT INTO thu (Email, DanhMuc, Date, GiaTri, Note) VALUES ('$email', '$danhmuc', '$date', '$giatri', '$note')";
  mysqli_query($conn, $sql_insert);
  header("Location: index.php");
}
?> 