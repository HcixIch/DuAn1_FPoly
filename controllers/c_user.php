<?php
include_once './views/t_header.php';
if (isset($_GET['action']) && $_GET['action'] === 'deleteuser') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $result = $user->DeleteUser($id);
        if ($result) {
            echo "alert('Xóa người dùng thành công!');</script>";
        } else {
            echo "alert('Không thể xóa người dùng!');</script>";
        }
        header("Location: ?ctrl=admin&view=user");
        exit;
    }
}
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'account':
            $title = "Tài khoản";
            $kt = 0;
            if (isset($_POST['changeuser'])) {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $user->UpdateUser(($_SESSION['user'][0]['id_user']), $fullname, $address, $email, $phone);
            }
            if (isset($_POST['change'])) {
                if ($_POST['newpassword'] != $_POST['password-comfirm']) {
                    echo "Mật khẩu mới không trùng khớp.";
                    $kt = 1;
                }
                if ($_POST['password'] != ($_SESSION['user'][0]['password'])) {
                    echo "Mật khẩu hiện tại không đúng.";
                    $kt = 1;
                }
                if($kt ==0){
                    $changepass = $user->UpdatePassword(($_SESSION['user'][0]['id_user']),$_POST['password']);

                }
            }
            include_once './views/page_banner.php';
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
