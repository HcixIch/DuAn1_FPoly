<?php
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'home':
            include_once './views/t_header.php';
            break;
        case 'contact':
            $title = 'Liên hệ';
            include_once './views/t_header.php';
            include_once './views/page_banner.php';
            include_once './views/v_page_contact.php';
            include_once './views/t_footer.php';
            break;
        case 'about':
        default:
            echo "Không tìm thấy trang này.";
            break;
    }
} else {
    include_once './views/t_header.php';
    include_once './views/slider.php';
    include_once './views/v_page_home.php';
    include_once './views/t_footer.php';
}