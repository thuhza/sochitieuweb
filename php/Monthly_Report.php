<?php $servername = "localhost";
	$username = "thuha";
	$password = "hanguyen1";
	$dbname = "qlct";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Kết nối thất bại: " . $conn->connect_error);
		echo "Ket noi that bai";
	}
    session_start();

    if(isset($_SESSION['username'])){
        $sql = "SELECT Avatar FROM thongtinthanhvien WHERE Email='" . $_SESSION['username'] . "'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $avatarData = $row['Avatar'];
        // Mã hóa dữ liệu ảnh bằng base64_encode
        $avatarBase64 = base64_encode($avatarData);
        
        }else {
        // Nếu chưa đăng nhập, chuyển hướng người dùng đến trang đăng nhập
        header("Location: login.php");
        exit();
    }
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/base.css" />
  <link rel="stylesheet" href="../css/Mothly_Report.css">
<link rel="stylesheet" href="../css/taskbar.css">
<link rel="stylesheet" href="../css/grid.css">
<link rel="stylesheet" href="../css/main.css">   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" charset="UTF-8"></script>
</head>
<body onload=load()>
  <div id="header">
               
    <div class="header_item">
        <ul id="item">
            <li class="itemhd">
                <div id="home"><i class="fa-solid fa-house"></i></i></div>
                <div id="bcao">
                    Báo Cáo
                    <i class="fa-solid fa-caret-down"></i>
                    <ul id="listitem">
                        <li class="li">Báo cáo tháng</li>
                        <li class="li">Báo cáo năm</li>
                        
                    </ul>
                </div>
                <!-- <P>
                   Xuất dữ liệu
                </P> -->
                <p class="header-info js-info">
                    Về chúng tôi
                 </p>
                
            </li>
            <!-- <div  class="header__item-logo">
                <div class="header__search ">
                    <div class="header__search-input-wrap">
                        <input type="text" class="header__search-input" placeholder="Tìm kiếm khoản chi tiêu">

                            <div class="header__search-history">
                                <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                                <div class="header__search-history-list">
                                    <p class="header__search-history-item">
                                        <a href="#">Ăn trưa</a>
                                    </p>
                                    <p class="header__search-history-item">
                                        <a href="#">iphone 12</a>
                                    </p>
                                    <p class="header__search-history-item">
                                        <a href="#">iphone 13</a>
                                    </p>
                                    <p class="header__search-history-item">
                                        <a href="#">iphone 14</a>
                                    </p>
                                </div>
                            </div>

                    </div>
                    <button class="header__search-btn btn--bland js-noti">
                        <i class="header__search-btn-icon fas fa-search"></i>
                    </button>
                </div>
                
                
            </div> -->
            <div id="trangcanhan">
                <div id="avatar">
                    <img src="data:image/png;base64,<?php echo $avatarBase64; ?>" alt="avatar">
                   
                </div>
                <i class="fa-solid fa-caret-down"></i>
                <div id="list">
                    <ul>
                        <li id="tcnhan">
                            <i class="fa-solid fa-house-user"></i>
                            Trang cá nhân</li>
                        <li id="logout">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Log out</li>
                    </ul>
                </div>
            </div>
        </ul>
    </div>
</div>
<div class="modal js-show_info ">
  <div class="modal__body">
          <div class="auth-form js-auth-form auth-form-info ">  
              <div class="header-info">
                  <h1 class="tilte-info">THÀNH VIÊN NHÓM</h1>
                  <i class="fas fa-window-close js-info-close"></i>
              </div>
              <p>
                  1.
                  <a target="_blank" href="#" >Nguyễn Thị Thu Hà</a>
              </p>
              <p>
                  2.
                  <a target="_blank" href="#" >Trần Minh Đức</a>
              </p>
              <p>
                  3.
                  <a target="_blank" href="#" >Nguyễn Phương Đại</a>
              </p>
              <p>
                  4.
                  <a target="_blank" href="#" >Nguyễn Thành Nam</a>
              </p>
              <p>
                  5.
                  <a target="_blank" href="https://ximvhs.github.io/frofile/">Vũ Hồng Sơn</a>
              </p>
          </div>
  </div>
</div>
<div class="grid wide">
    <!--Button-->
    <div id='thang'>
    <select name="month" id='select'>
        <option class="op" value="01">Tháng 1</option>
        <option class="op" value="02">Tháng 2</option>
        <option class="op" value="03">Tháng 3</option>
        <option class="op" value="04">Tháng 4</option>
        <option class="op"  value="05">Tháng 5</option>
        <option class="op"  value="06">Tháng 6</option>
        <option class="op" value="07">Tháng 7</option>
        <option class="op" value="08">Tháng 8</option>
        <option class="op" value="09">Tháng 9</option>
        <option class="op" value="10">Tháng 10</option>
        <option class="op" value="11">Tháng 11</option>
        <option class="op" value="12">Tháng 12</option>
    </select>
    </div>
  <form id="thongke"></form>
</div>
</body>
<script src="../js/taskbar.js"></script>
<script src="../js/Mothly_Report.js"></script>
<script src="https://kit.fontawesome.com/22b1ad7ec4.js" crossorigin="anonymous"></script>
</html>
