<?php
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'home':
            include_once './views/t_header.php';
            break;
        default:
            echo "Không tìm thấy trang này.";
            break;
    }
} else {
    include_once './views/t_header.php';
    $title = "Đăng nhập và đăng ký";
    include_once './views/page_banner.php';
    include_once './views/v_user_login&register.php';
    include_once './views/t_footer.php';
}