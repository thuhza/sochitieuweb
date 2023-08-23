<!DOCTYPE html>
<?php 
$servername = "localhost";
$username = "thuha";
$password = "hanguyen1";
$dbname = "qlct";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
    echo "Ket noi that bai";
}
session_start();
$date = $_POST['date'] ?? date('m');?>

<html><form id="thongke">
                        <div id="tk">
                            <div id="tthu">
                                <div class="tde" id="tde -thu">
                                    <h3>Tổng thu</h3>
                                    <?php 
                                    $query = "SELECT SUM(GiaTri) AS TongThu
                                            FROM thu
                                            WHERE Email = '{$_SESSION['username']}' AND MONTH(Date)='$date'";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $tongThu = $row['TongThu'];
                                    ?>
                                    <h3 class="gtri"><?php echo number_format($tongThu) ?> đ</h3>
                                </div>
                                <div class="chitiet" id="chitiet-thu">
                                    <?php 
                                    $query = "SELECT thu.GiaTri, dmthu.TenDanhMuc,thu.DanhMuc
                                            FROM thu
                                            JOIN dmthu ON thu.DanhMuc = dmthu.MaDanhMuc
                                            WHERE thu.Email = '{$_SESSION['username']}' AND MONTH(Date)='$date'";
                                    $result = mysqli_query($conn, $query);

                                    // Kiểm tra nếu có dữ liệu
                                    if(mysqli_num_rows($result) > 0) {
                                    // Xuất tiêu đề
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<div class='ndg'>
                                        <h4 class='dmuc'>". $row["TenDanhMuc"] ."</h4>
                                        <h4 class='gia'>". number_format($row["GiaTri"]) ." đ</h4>
                                        </div>";
                                    }
                                    } else {
                                    echo "Không có khoản thu nào";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div id="tchi">
                                <div class="tde" id="tde-chi">
                                    <h3>Tổng chi</h3>
                                        <?php 
                                        $query = "SELECT SUM(GiaTri) AS TongChi
                                                FROM chi
                                                WHERE Email = '{$_SESSION['username']}' AND MONTH(Date)='$date'";
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_assoc($result);
                                        $tongChi = $row['TongChi'];
                                        ?>
                                    <h3 class="gtri"><?php echo number_format($tongChi) ?> đ</h3>
                                </div>
                                <div class="chitiet" id="chitiet-chi">
                                    <?php 
                                
                                    $query = "SELECT chi.GiaTri, dmchi.TenDanhMuc,chi.DanhMuc
                                            FROM chi
                                            JOIN dmchi ON chi.DanhMuc = dmchi.MaDanhMuc
                                            WHERE chi.Email = '{$_SESSION['username']}' AND MONTH(Date)='$date'";
                                    $result = mysqli_query($conn, $query);

                                    // Kiểm tra nếu có dữ liệu
                                    if(mysqli_num_rows($result) > 0) {
                                    // Xuất danh mục và giá trị của từng dòng dữ liệu
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<div class='ndg'>
                                        <h4 class='dmuc'>". $row["TenDanhMuc"] ."</h4>
                                        <h4 class='gia'>". number_format($row["GiaTri"]) ." đ</h4>
                                        </div>";
                                    }
                                    } else {
                                    echo "Không có khoản thu nào";
                                    }
                                ?>
                                </div>
                            </div>
                            <div id="tong">
                                <div class="tde" id="tde-tong">
                                    <h3>Tổng</h3>
                                    <h3 class="gtri"><?php echo number_format($tongChi+ $tongThu)?> đ</h3>
                                </div>
                            </div>
                        </div>
                        <script>
                          // Lấy danh sách các button



                        </script>
                        </html>