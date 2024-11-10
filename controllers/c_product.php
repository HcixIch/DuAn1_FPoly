<?php
$prod = new Product();
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'shop':
            $title = 'Sản phẩm';
            include_once './views/t_header.php';
            include_once './views/page_banner.php';
            include_once './views/v_product_shop.php';
            include_once './views/t_footer.php';
            break;
        case 'detail':
            $title = 'Sản phẩm chi tiết';
            include_once './views/t_header.php';
            include_once './views/page_banner.php';
            include_once './views/v_product_detail.php';
            include_once './views/t_footer.php';
            break;
        case 'about':
        default:
            echo "Không tìm thấy trang này.";
            break;
    }
} else {
    $title = 'Sản phẩm';
    include_once './views/t_header.php';
    include_once './views/page_banner.php';
    include_once './views/v_product_shop.php';
    include_once './views/t_footer.php';
}
