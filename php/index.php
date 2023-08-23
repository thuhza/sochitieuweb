
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
<html>

    <head>
        <title>sochitieu</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/base.css">
        <link rel="stylesheet" href="../css/grid.css">
        <link rel="stylesheet" href="../css/main.css">   
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,400&display=swap"
        rel="stylesheet">
       <link rel="stylesheet" href="../css/taskbar.css">
    </head>
    <body>

        <div id="app">
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
                                </div>*/
                                
                                
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
            
            <div id="content">
                <div class="grid wide">
                    <div id="lich">
                        <div id="nhap">
                            <div id="option">
                                <p id="thu" class="thu">THU</p>
                                <p id="chi" class="chi">CHI</p>
                            </div>
                            <div id="ctent">
                            <form action="addthu.php" id="ctentthu" class="ctenthu" method="post" >
                                <p class="datenw">
                                    <t>Ngày</t>
                                    <span class="nwdate"><input  required class="date" type="date" name="date" value="<?php echo date('Y-m-d'); ?>"></span>
                                </p>
                                <p class="note">
                                    <t>Ghi chú</t>
                                    <input type="text" name="note">
                                </p>
                                <p class="giatri">
                                    <t>Giá trị</t>
                                    <input  required type="number" min="0" name="giatri">
                                </p>
                                <div class="danhmuc">
                                    <t>Danh mục</t>
                                    <div class="dsitem">
                                    <div class="item ">
                                        <i class="fa-solid fa-money-bill-1-wave"></i>
                                        <p>Tiền Lương</p>
                                        <input  required type="radio" name="danhmuc" value="0">
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-piggy-bank"></i>
                                        <p>Phụ Cấp</p>
                                        <input  required type="radio" name="danhmuc" value="1">
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-gift"></i>
                                        <p>Tiền Thưởng</p>
                                        <input  required type="radio" name="danhmuc" value="2">
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-sack-dollar"></i>
                                        <p>Thu nhập phụ
                                        </p>
                                        <input  required type="radio" name="danhmuc" value="3">
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-coins"></i>
                                        <p>Đầu tư</p>
                                        <input  required type="radio" name="danhmuc" value="4">
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-dollar-sign"></i>
                                        <p>Khác</p>
                                        <input  required type="radio" name="danhmuc" value="5">
                                    </div>
                                </div>
                                </div>
                                <div class="btnAdd"><button type="submit">Thêm</button></div>

                            </form>
     

                            <form id="ctentchi" class="ctenchi" method="post" action="addchi.php"> 
                                <p class="datenw">
                                    <t>Ngày</t>
                                    <span class="nwdate"><input required id="date" class="date" type="date" name="date" value="<?php echo date('Y-m-d'); ?>"></span>
                                </p>
                            <p class="note">
                                <t>Ghi chú</t>
                                <input type="text" name="note">
                            </p>
                            <p class="giatri">
                                <t>Giá trị</t>
                                <input  required type="number" min="0" name="giatri">
                            </p>
                            <div class="danhmuc">
                            <t>Danh mục</t>
                            <div class="dsitem">
                                <div class="item">
                                <input required type="radio" name="danhmuc" value="0">
                                <i class="fa-solid fa-utensils"></i>
                                <p>Ăn uống</p>
                                </div>
                                <div class="item">
                                <input required type="radio" name="danhmuc" value="1">
                                <i class="fa-solid fa-car-side"></i>
                                <p>Đi lại</p>
                                </div>
                                <div class="item">
                                <input  required type="radio" name="danhmuc" value="2">
                                <i class="fa-solid fa-kit-medical"></i>
                                <p>Y tế</p>
                                </div>
                                <div class="item">
                                <input  required type="radio" name="danhmuc" value="3">
                                <i class="fa-solid fa-school"></i>
                                <p>Tiền học</p>
                                </div>
                                <div class="item">
                                <input  required type="radio" name="danhmuc" value="4">
                                <i class="fa-solid fa-phone-volume"></i>
                                <p>Phí liên lạc</p>
                                </div>
                                <div class="item">
                                <input required type="radio" name="danhmuc" value="5">
                                <i class="fa-solid fa-bolt-lightning"></i>
                                <p>Tiền điện</p>
                                </div>
                                <div class="item">
                                <input required type="radio" name="danhmuc" value="6">
                                <i class="fa-solid fa-faucet-drip"></i>
                                <p>Tiền nước</p>
                                </div>
                                <div class="item">
                                <input  required type="radio" name="danhmuc" value="7">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <p>Mua sắm</p>
                                </div>
                                <div class="item">
                                <input  required type="radio" name="danhmuc" value="8">
                                <i class="fa-solid fa-dollar-sign"></i>
                                <p>Khác</p>
                                </div>
                            </div>
                            </div>


                                <div class="btnAdd"><button >Thêm</button></div>
                       
                            </form>
                            
                        </div>
                        
                    </div> 
                    <div class="container">
                            
                        <div class="calendar">
                                <div id="nepre">
                                    <div><button class="btn btn-prev">
                                        <span><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                                    </button>
                                </div>
                                    <div id="btnleft"><button class="btn btn-next">
                                        <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                    </button>
                                </div>
                                </div>
                                <h1>Calendar</h1>
                                <div class="info">
                                    <p class="month">September</p>
                                    <p class="year">2023</p>
                                </div>
                                <div class="date">
                                    <div class="day-name">Sun</div>
                                    <div class="day-name">Mon</div>
                                    <div class="day-name">Tue</div>
                                    <div class="day-name">Wen</div>
                                    <div class="day-name">Thu</div>
                                    <div class="day-name">Fri</div>
                                    <div class="day-name">Sat</div>
                                </div>
                                <div class="date date-container" style="
                                border-bottom-width: 0;
                                ">
                                    <div class="day"></div>
                                    <div class="day"></div>
                                    <div class="day">1</div>
                                    <div class="day">2</div>
                                    <div class="day">3</div>
                                    <div class="day">4</div>
                                    <div class="day">5</div>
                                    <div class="day">6</div>
                                    <div class="day">7</div>
                                    <div class="day">8</div>
                                    <div class="day">9</div>
                                    <div class="day active">10</div>
                                    <div class="day">11</div>
                                    <div class="day">12</div>
                                    <div class="day">13</div>
                                    <div class="day">14</div>
                                    <div class="day">15</div>
                                    <div class="day">16</div>
                                    <div class="day">17</div>
                                    <div class="day">18</div>
                                    <div class="day">19</div>
                                    <div class="day">20</div>
                                    <div class="day">21</div>
                                    <div class="day">22</div>
                                    <div class="day">23</div>
                                    <div class="day">24</div>
                                    <div class="day">25</div>
                                    <div class="day">26</div>
                                    <div class="day">27</div>
                                    <div class="day">28</div>
                                    <div class="day">29</div>
                                    <div class="day">30</div>
                                    <div class="day">31</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="thongke"></form>
                </div>
            </div>
            <!-- modal -->
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
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </body>
    <script src="../js/main.js"></script>
    <script src="../js/taskbar.js"></script>
    <script src="https://kit.fontawesome.com/22b1ad7ec4.js" crossorigin="anonymous"></script>
</html>

