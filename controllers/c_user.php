<?php
include_once './views/t_header.php';
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'account':
            $title = "Tài khoản";

            include_once './views/page_banner.php';
            include_once './views/v_user_account.php';
            break;
        case 'login':
            $kt = 0;
            if (isset($_POST['register'])) {
                if ($_POST['password'] != $_POST['confirm_password']) {
                    echo "<script>alert('Mật khẩu không trùng khớp.')</script>";
                    $kt = 1;
                }
                if (($kt == 0)) {
                    if ($_POST['password'] === "") {
                        echo "<script>alert('Vui lòng nhập mật khẩu')</script>";
                        $kt = 1;
                    }
                }
                if (($kt == 0)) {
                    $email = $user->getAllbyEmail($_POST['email']);
                    if (count($email) != 0) {
                        echo "<script>alert('email đã đăng kí rồi')</script>";
                        $kt = 1;
                    }
                }
                if ($kt == 0) {
                    $user->CreateUser($_POST['email'], $_POST['password']);
                    echo "Đăng kí thành công.";
                }
            }
            if (isset($_POST['Login'])) {
                $acc = $user->login($_POST['email'], $_POST['password']);
                if (count($acc) > 0) {
                    if (isset($_SESSION['user'])) {
                        unset($_SESSION['user']);
                    }
                    $_SESSION['user'] = $acc;
                    if ($acc[0]['role'] == 0) {
                        header("location:index.php");
                    } else {
                        header("location:admin.php");
                    }
                }
            }
            $title = "Đăng nhập và đăng ký";

            include_once './views/page_banner.php';
            include_once './views/v_user_login&register.php';
            break;
            case 'logout':
                unset($_SESSION['user']);
                header("location:index.php");
                break;
        default:
            echo "Không tìm thấy trang này.";
    }
} else {
    $title = "Đăng nhập và đăng ký";
    include_once './views/page_banner.php';
    include_once './views/v_user_login&register.php';
}
include_once './views/t_footer.php';
