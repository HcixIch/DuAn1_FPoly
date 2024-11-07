<?php
include_once 'models/m_product.php';
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'home':
            $prod = new Product();
            $products = $prod->getAllProduct();
            include_once './views/t_header.php';
            include_once './views/slider.php';
            include_once './views/v_page_home.php';
            include_once './views/t_footer.php';
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
    $prod = new Product();
    $products = $prod->getAllProduct();
    include_once './views/t_header.php';
    include_once './views/slider.php';
    include_once './views/v_page_home.php';
    include_once './views/t_footer.php';
}
