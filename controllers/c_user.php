<?php
include_once './views/t_header.php';
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'account':
            $title = "Tài khoản";
            $kt = 0;
            if (isset($_POST['changeuser'])) {
                $fullname = trim($_POST['fullname']);
                $email = trim($_POST['email']);
                $phone = trim($_POST['phone']);
                $address = trim($_POST['address']);

                // Kiểm tra các trường không được để trống
                if (empty($fullname) || empty($email) || empty($phone) || empty($address)) {
                    $_SESSION['message'] = "Vui lòng điền đầy đủ thông tin.";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Kiểm tra định dạng email
                    $_SESSION['message'] = "Địa chỉ email không hợp lệ.";
                } elseif (!is_numeric($phone)) { // Kiểm tra số điện thoại
                    $_SESSION['message'] = "Số điện thoại không hợp lệ.";
                } else {
                    // Nếu hợp lệ, gọi model để cập nhật thông tin
                    $user->UpdateUser($_SESSION['user'][0]['id_user'], $fullname, $address, $email, $phone);
                    $_SESSION['message'] = "Cập nhật thông tin thành công!";
                }
            }
            // Xử lý thay đổi mật khẩu
            if (isset($_POST['changepass'])) {
                $currentPassword = $_POST['password'];
                $newPassword = $_POST['newpassword'];
                $confirmPassword = $_POST['password_comfirm'];

                // Kiểm tra mật khẩu mới và xác nhận
                if ($newPassword != $confirmPassword) {
                    $kt = 1;
                    $_SESSION['message'] = "Mật khẩu mới và xác nhận mật khẩu không khớp.";
                }

                // Kiểm tra mật khẩu hiện tại
                if ($currentPassword != $_SESSION['user'][0]['password']) {
                    $kt = 1;
                    $_SESSION['message'] = "Mật khẩu hiện tại không đúng.";
                }

                // Nếu không có lỗi, cập nhật mật khẩu
                if ($kt == 0) {
                    $user->UpdatePassword($_SESSION['user'][0]['id_user'], $newPassword);
                    $_SESSION['message'] = "Thay đổi mật khẩu thành công!";
                    header("Location: index.php?ctrl=user&view=account");
                    exit();
                }
            }
            // Render lại view với thông báo
            include_once './views/v_user_account.php';
            break;
        case 'login':
            $kt = 0;
            if (isset($_POST['register'])) {
                if ($_POST['password'] != $_POST['confirm_password']) {
                    echo "Mật khẩu không trùng khớp.";
                    $kt = 1;
                }
                if (($kt == 0)) {
                    if ($_POST['password'] === "") {
                        echo "Vui lòng nhập mật khẩu";
                        $kt = 1;
                    }
                }
                if (($kt == 0)) {
                    $email = $user->getAllbyEmail($_POST['email']);
                    if (count($email) != 0) {
                        echo "email đã đăng kí rồi";
                        $kt = 1;
                    }
                }
                if ($kt == 0) {
                    $user->CreateUser($_POST['email'], $_POST['password']);
                    echo "<script>alert('Đăng kí thành công.')</script>";
                    header("location:?ctrl=user&view=account");
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
    $kt = 0;
    if (isset($_POST['register'])) {
        if ($_POST['password'] != $_POST['confirm_password']) {
            echo "Mật khẩu không trùng khớp.";
            $kt = 1;
        }
        if (($kt == 0)) {
            if ($_POST['password'] === "") {
                echo "Vui lòng nhập mật khẩu";
                $kt = 1;
            }
        }
        if (($kt == 0)) {
            $email = $user->getAllbyEmail($_POST['email']);
            if (count($email) != 0) {
                echo "email đã đăng kí rồi";
                $kt = 1;
            }
        }
        if ($kt == 0) {
            $user->CreateUser($_POST['email'], $_POST['password']);
            echo "<script>alert('Đăng kí thành công.')</script>";
            header("location:?ctrl=user&view=account");
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
}

include_once './views/t_footer.php';
