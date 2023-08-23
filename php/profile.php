<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/profile.css">
        <link rel="stylesheet" href="../css/base.css">
        <link rel="stylesheet" href="../css/taskbar.css">
    </head>
    <body onload="load()">
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
    if(isset($_SESSION['username'])){
        $sql = "SELECT Avatar FROM thongtinthanhvien WHERE Email='" . $_SESSION['username'] . "'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $avatarData = $row['Avatar'];
        // Mã hóa dữ liệu ảnh bằng base64_encode
        $avatarBase64 = base64_encode($avatarData);
        $sql = "SELECT Name, Email, Birthday, Sex FROM thongtinthanhvien WHERE Email='" . $_SESSION['username'] . "'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        }else {
        // Nếu chưa đăng nhập, chuyển hướng người dùng đến trang đăng nhập
        header("Location: login.php");
        exit();
    }
    ?>
        <div id="header">
               
            <div id="headersub">
               
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
                                    <li class="li">Báo cáo theo danh mục</li>
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
                    </div>
                </ul>
            </div>
        </div>
        <div id="container">
            <div id="navigation">
                <li>
                    <img src="data:image/png;base64,<?php echo $avatarBase64; ?>" alt="">
                    <p><?php echo $row['Name']; ?></p>
                </li>
                <li class="item">
                    <i class="fa-solid fa-user"></i>
                    <p>Tài khoản của bạn</p>
                </li>
                <li class="item">
                    <i class="fa-solid fa-user-lock"></i>
                    <p>Đăng nhập và bảo mật</p>
                </li>
            </div>
            <div id="content">
                <div class="contentin">
                    <div id="title">
                        <p>Tài khoản của bạn</p>
                    </div>
                    <div id="anh" class="nd">
                        <p class="title">Ảnh hồ sơ</p>
                        <div class="cten">
                            <div ><img src="data:image/png;base64,<?php echo $avatarBase64; ?>" alt=""></div>
                            <div id="button">
                                <button id="btn-xoa">Xóa</button>
                                <button id="btn-thay-doi">Thay đổi</button>
                            </div>
                        </div>
                    </div>

                    <div id="form-xoa-anh" style="display: none;">
                        <form method="POST" action="xoa-anh.php">
                            <p>Bạn chắc chắn muốn xóa ảnh</p>
                        
                            <button type="submit">Xóa ảnh</button>
                        </form>
                    </div>

                    <div id="form-thay-doi-anh" style="display: none;">
                        <form method="POST" action="thay-doi-anh.php" enctype="multipart/form-data">
                            
                            <input type="file" name="avatar">
                            <button type="submit">Thay đổi ảnh</button>
                        </form>
                    </div>

                    <div  class="nd">
                        <p class="title"> Tên</p>
                        <div class="cten">
                            <p id="l"><?php echo $row['Name']; ?></p>
                            <div id="button"><button id='changename'>Sửa</button></div>
                            <form id="form-ten" class="hidden" action="changename.php" method="post">
                                <input type="text" name="ten-moi" placeholder="Nhập tên mới"  required>
                                <button type="submit">Lưu</button>
                            </form>
                        </div>
                    </div>
                    <div  class="nd">
                        <p class="title"> Ngày Sinh </p>
                        <div class="cten">
                            <p id="ns"><?php echo $row['Birthday']; ?></p>
                            <div id="button"><button id='changetuoi'>Sửa</button></div>
                            <form id="form-tuoi" class="hidden" action="changetuoi.php" method="post">
                                <input type="date" name="tuoi-moi" required>
                                <button type="submit">Lưu</button>
                            </form>
                        </div>
                    </div>
                    <div  class="nd">
                        <p class="title"> Giới tính </p>
                        <div class="cten">
                            <p id='sex'><?php echo $row['Sex']; ?></p>
                            <div id="button"><button id="changesex">Sửa</button></div>
                            <form id="form-sex" class="hidden" action="changesex.php" method="post">
                                <input type="radio" class="auth-form__input-radio" required placeholder=" "  name="gender" value="Male">Nam
                                <input type="radio" class="auth-form__input-radio" required placeholder=" " name="gender" value="Female" >Nữ
                                <button type="submit">Lưu</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="contentin">
                    <div id="title">
                        <p>Đăng nhập và bảo mật</p>
                    </div>
                    <div  class="nd">
                        <p class="title"> Emal</p>
                        <div class="cten">
                            <p id="email"><?php echo $row['Email']; ?></p>
                            <div id="button"><button id='eml'>Sửa</button></div>
                            <form id="form-email" class="hidden" action="changeemail.php" method="post">
                                <input type="email" name="email-moi" required>
                                <button type="submit">Lưu</button>
                            </form>
                        </div>
                    </div>
                    <div  class="nd">
                        <p class="title">Mật khẩu</p>
                        <div class="cten">
                            <p id='pass'>Đổi mật khẩu</p>
                            <div id="button"><button id='changepass'>Đổi</button></div>
                            <form id="form-mk" class="hidden" action="changepass.php" method="post">
                                <input type="password" name="pass-moi" required>
                                <button type="submit">Lưu</button>
                            </form>
                        </div>
                    </div>
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
</div>

    </body>
    <script src="../js/profile.js"></script>
    <script src="../js/taskbar.js"></script>
    <script src="https://kit.fontawesome.com/22b1ad7ec4.js" crossorigin="anonymous"></script>
</html>