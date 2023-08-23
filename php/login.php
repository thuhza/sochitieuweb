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
                                    <div class="auth-form__header">
                                        <h3 class="auth-form__heading">Đăng Nhập</h3>
                                        <span class="auth-form__switch-btn js-register">Đăng Ký</span>
                                    </div>
        
                                    <div class="auth-form__form" id="login">
                                        <div class="auth-form__group">
                                            <input name="username" type="email" id="emaillogin" class="auth-form__input" required >
                                            <div class="form-label">Tên đăng nhập</div>
                                        </div>
                                        <div class="auth-form__group">
                                            <input name="password"type="password" id="passlogin" class="auth-form__input" required>
                                            <div class="form-label">Mật khẩu</div>
                                        </div>
                                       
                                    </div>
                                    <p id="auth-form__input-error"></p>
                                    <!-- <div class="auth-form__aside">
                                        <p class="auth-form__policy-text">
                                            <a href="#" class="auth-form__text-link auth-form__text--right ">Quên mật khẩu?</a>
                                        </p>
                                    </div> -->
                                    <div><p id="auth-form__input-error"></p></div>
                                    <div class="auth-form__controls">
                                        <button  class="btn btn--normal btn--primary" id="btnlogin" value="Đăng Nhập">Đăng Nhập</button>
                                    </div>
        <?php 	
          session_start();
        if(isset($_POST['username']) && isset($_POST['password'])) {
		// Lấy dữ liệu từ form đăng nhập
		$user = $_POST['username'];
		$pass = $_POST['password'];

		// Xác thực thông tin đăng nhập
		$sql = "SELECT * FROM thongtindangnhap WHERE Email='$user' AND Password='$pass'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// Đăng nhập thành công
          

// Lưu thông tin người dùng vào biến phiên
            $_SESSION['username'] = $user;
			header('Location: index.php');
			exit();
		} else {
			// Đăng nhập thất bại
			echo "<script>
            var errorElement = document.getElementById('auth-form__input-error');
            if (errorElement) {
              errorElement.innerText = 'Sai email hoặc mật khẩu';
            }
            
			</script>";
           
		}
	} ?>
                                    <!-- <div class="auth-form__socials">
                                        <a href="#" class="auth-form__socials--facebook btn btn--size-s btn--with-icon">
                                            <i class="auth-form__socials-icon fab fa-facebook-square"></i>
                                            <span class="auth-form__socials-text">Kết nối Facebook</span>
                                        </a>
                                        <a href="#" class="auth-form__socials--google btn btn--size-s btn--with-icon">
                                            <i class="auth-form__socials-icon fab fa-google"></i>
                                            <span class="auth-form__socials-text">Kết nối Google</span>
                                        </a>
                                    </div> -->
                                </div>
        
                            </div>
                        </div>
                </div>
            </form>    
        </div>
    </body>
    <script>
        const btnsw=document.querySelector('.js-register')
        btnsw.addEventListener('click',function(){
            window.location.href='../php/register.php'})
    </script>
    <script src="https://kit.fontawesome.com/22b1ad7ec4.js" crossorigin="anonymous"></script>
</html>
