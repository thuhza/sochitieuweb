<?php
	// Kết nối MySQL
	$servername = "localhost";
	$username = "thuha";
	$password = "hanguyen1";
	$dbname = "qlct";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Kết nối thất bại: " . $conn->connect_error);
		echo "Ket noi that bai";
	}



	// Đóng kết nối MySQL
?>
<html lang="vi">
    <head>
        <title>sochitieu</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/grid.css">
        <link rel="stylesheet" href="../css/resets.css">
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/base.css">
        <link rel="stylesheet" href="../css/login.css">
    </head>
    <body>
        <div class="container_start">
            <form method="post" >
                <div class="modal js-show_login grid wide">
                        <div class="modal__body row">
                            <div class="auth-form--left col l-6 m-0 c-0 ">
                                <H1>QUẢN LÝ CHI TIÊU CÁ NHÂN</H1>
                                <p>Giúp bạn theo dõi chi tiêu hằng ngày một cách thông minh!</p>
                                <img src="../image/logo-login.png" alt="">
                            </div>
                            <div class="auth-form--right js-auth-form col l-6 m-12 c-12">  
                                <div class="auth-form__container">
                                <?php
                                // Kiểm tra nếu form đăng ký được submit
                                if($_SERVER["REQUEST_METHOD"] == "POST") {
                                    // Lấy dữ liệu từ form đăng ký
                                    $fullname = $_POST['fullname'];
                                    $dob = $_POST['dob'];
                                    $gender = $_POST['gender'];
                                    $email = $_POST['email'];
                                    $password = $_POST['password'];
                                    $confirm_password = $_POST['confirm_password'];
                                    
                                    // Kiểm tra xem mật khẩu nhập lại có đúng không
                                    if($password != $confirm_password) {
                                        echo "Mật khẩu nhập lại không đúng!";
                                    
                                    } else {
                                        // Kiểm tra xem email đã tồn tại trong CSDL hay chưa
                                        $sql = "SELECT * FROM thongtinthanhvien WHERE Email = '$email'";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        if(mysqli_num_rows($result) > 0) {
                                            echo "Email đã tồn tại!";
                                        } else {
                                            // Thêm tài khoản vào CSDL
                                            $avatarData = addslashes(file_get_contents("../image/defautavatar.png"));
                                            $sql = "INSERT INTO thongtinthanhvien (Name, Birthday, Sex, Email, Avatar) VALUES ('$fullname', '$dob', '$gender', '$email', '$avatarData')";
                                            $sql1 = "INSERT INTO thongtindangnhap (Email, Password) VALUES ('$email', '$password')";

                                            if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {
                                                header('Location: login.php');
                                            }

                                        }
                                    }
                                }
                                ?>
                                <div class="auth-form__header">
                                        <h3 class="auth-form__heading">Đăng ký</h3>
                                        <span class="auth-form__switch-btn js-login">Đăng Nhập</span>
                                    </div>
        
                                    <div class="auth-form__form" id="register">
                                        <div class="auth-form__group">
                                            <input type="text" class="auth-form__input" required placeholder=" " name="fullname">
                                            <div class="form-label">Họ và tên</div>
                                        </div>
                                        <div class="auth-form__group">
                                            <input type="date" class="auth-form__input" required placeholder=" " name="dob">
                                            <div class="form-label">Ngày sinh nhật</div>
                                        </div>
                                        <div class="auth-form__group_sex">
                                            <div class="list__sex">
                                                <div class="form-label">Nam</div>
                                                <input type="radio" class="auth-form__input-radio" required placeholder=" "  name="gender" value="Male">
                                            </div>
                                            <div class="list__sex">
                                                <div class="form-label">Nữ</div>
                                                <input type="radio" class="auth-form__input-radio" required placeholder=" " name="gender" value="Female" >
                                            </div>
                                        </div>
                                        <div class="auth-form__group">
                                            <input type="email" name="email"class="auth-form__input" required placeholder=" ">
                                            <div class="form-label">Email</div>
                                        </div>
                                        <div class="auth-form__group">
                                            <input type="password" name="password"class="auth-form__input" required placeholder=" ">
                                            <div class="form-label">Mật khẩu</div>
                                        </div>
                                        <div class="auth-form__group">
                                            <input type="password" name="confirm_password"class="auth-form__input" required placeholder=" ">
                                            <div class="form-label">Nhập lại mật khẩu</div>
                                        </div>
                                    </div>
                                    <div><p id="input-error"></p></div>
                                 
                                    <div class="auth-form__aside">
                                        <p class="auth-form__policy-text">
                                            Bằng việc đăng ký, bạn đã đồng ý với chúng tôi về
                                            <a href="#" class="auth-form__text-link">Điều khoản dịch vụ</a> & 
                                            <a href="#" class="auth-form__text-link">Chính sách bảo mật</a>
                                        </p>
                                    </div>
                                    <div class="auth-form__controls">
                                    <button  class="btn btn--normal btn--primary"  value="Đăng Ký" name="register">Đăng Ký</button>
                                    </div>
        
                            </div>
                        </div>
                </div>
            </form>
    
        </div>
    </body>
    <script>
        const btnlg=document.querySelector(".js-login")
        btnlg.addEventListener('click',function(){
        window.location.href='../php/login.php'})
    </script>
    <script src="https://kit.fontawesome.com/22b1ad7ec4.js" crossorigin="anonymous"></script>
</html>
