<?php
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'home':
            $prod = new Product();
            $pro_new = $prod->getProductsByCondition('new', "");
            $pro_hot = $prod->getProductsByCondition('hot', "");
            $pro_sale = $prod->getProductsByCondition('sale', "");
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
    $pro_new = $prod->getProductsByCondition('new', "");
    $pro_hot = $prod->getProductsByCondition('hot', "");
    $pro_sale = $prod->getProductsByCondition('sale', "");
    include_once './views/t_header.php';
    include_once './views/slider.php';
    include_once './views/v_page_home.php';
    include_once './views/t_footer.php';
}
