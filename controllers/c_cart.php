<?php
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'checkout':
            $title = 'Thanh toán';
            include_once './views/t_header.php';
            include_once './views/page_banner.php';
            include_once './views/v_cart_checkout.php';
            include_once './views/t_footer.php';
            break;
        case 'cart':
            
            $title = 'Giỏ hàng';
            include_once './views/t_header.php';
            include_once './views/page_banner.php';
            include_once './views/v_cart_product.php';
            include_once './views/t_footer.php';
            break;
        case 'about':
        default:
            echo "Không tìm thấy trang này.";
            break;
    }
} else {
    $title = 'Giỏ hàng';
    include_once './views/t_header.php';
    include_once './views/slider.php';
    include_once './views/v_cart_product.php';
    include_once './views/t_footer.php';
}
