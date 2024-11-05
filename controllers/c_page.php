<?php
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'home':
            include_once './views/t_header.php';
            break;
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