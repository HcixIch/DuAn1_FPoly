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
            $errors = [];

        // Xử lý đăng ký
        if (isset($_POST['register'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirm_password']);

            // Kiểm tra các trường thông tin
            if (empty($email) || empty($password) || empty($confirmPassword)) {
                $errors[] = "Vui lòng điền đầy đủ thông tin.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Địa chỉ email không hợp lệ.";
            }
            if ($password !== $confirmPassword) {
                $errors[] = "Mật khẩu và xác nhận mật khẩu không khớp.";
            }
            if (strlen($password) < 6) {
                $errors[] = "Mật khẩu phải có ít nhất 6 ký tự.";
            }

            // Kiểm tra email đã tồn tại
            if (empty($errors)) {
                $existingUser = $user->getAllByEmail($email);
                if ($existingUser) {
                    $errors[] = "Email này đã được đăng ký.";
                } else {
                    // Lưu người dùng mới
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $user->CreateUser($email, $hashedPassword);
                    $_SESSION['message'] = "Đăng ký thành công! Vui lòng đăng nhập.";
                    header("Location: ?ctrl=user&view=login");
                    exit();
                }
            }
        }

        // Xử lý đăng nhập
        if (isset($_POST['Login'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
    
            if (empty($email) || empty($password)) {
                $errors[] = "Vui lòng điền đầy đủ thông tin.";
            } else {
                $acc = $user->login($email, $password);
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
                } else {
                    $errors[] = "Email hoặc mật khẩu không chính xác.";
                }
            }
        }
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        }
        $title = "Đăng nhập và đăng ký";
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
    $errors = [];
    if (isset($_POST['register'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirm_password']);

        // Kiểm tra các trường thông tin
        if (empty($email) || empty($password) || empty($confirmPassword)) {
            $errors[] = "Vui lòng điền đầy đủ thông tin.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Địa chỉ email không hợp lệ.";
        }
        if ($password !== $confirmPassword) {
            $errors[] = "Mật khẩu và xác nhận mật khẩu không khớp.";
        }
        if (strlen($password) < 6) {
            $errors[] = "Mật khẩu phải có ít nhất 6 ký tự.";
        }

        // Kiểm tra email đã tồn tại
        if (empty($errors)) {
            $existingUser = $user->getAllByEmail($email);
            if ($existingUser) {
                $errors[] = "Email này đã được đăng ký.";
            } else {
                // Lưu người dùng mới
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $user->CreateUser($email, $hashedPassword);
                $_SESSION['message'] = "Đăng ký thành công! Vui lòng đăng nhập.";
                header("Location: ?ctrl=user&view=login");
                exit();
            }
        }
    }
    // Xử lí đăng nhập
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
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (empty($email) || empty($password)) {
            $errors[] = "Vui lòng điền đầy đủ thông tin.";
        } else {
            $acc = $user->login($email, $password);
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
            } else {
                $errors[] = "Email hoặc mật khẩu không chính xác.";
            }
        }
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    }
    $title = "Đăng nhập và đăng ký";
    include_once './views/v_user_login&register.php';
}

include_once './views/t_footer.php';
