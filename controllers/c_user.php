<?php
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'account':
            $title = "Tài khoản";
            include_once './views/t_header.php';
            include_once './views/page_banner.php';
            include_once './views/v_user_account.php';
            include_once './views/t_footer.php';
            break;
        case 'login':
            $title = "Đăng nhập và đăng ký";
            include_once './views/t_header.php';
            include_once './views/page_banner.php';
            include_once './views/v_user_login&register.php';
            include_once './views/t_footer.php';
            break;
        default:
            echo "Không tìm thấy trang này.";
            break;
    }
} else {
    $title = "Đăng nhập và đăng ký";
    include_once './views/t_header.php';
    include_once './views/page_banner.php';
    include_once './views/v_user_login&register.php';
    include_once './views/t_footer.php';
}
