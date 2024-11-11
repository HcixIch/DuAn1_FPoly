<?php
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'shop':
            //Phân trang
            $title = 'Sản phẩm';
            if (isset($_GET['ql_page'])) {
                $ql_page = $_GET['ql_page']; //ql là viết tắt của quantity
            } else {
                $ql_page = 1;
            }
            $list_page_product = $prod->getProductsByPage($ql_page, 9);
            // Kết thúc phân trang
            include_once './views/t_header.php';
            include_once './views/page_banner.php';
            include_once './views/v_product_shop.php';
            include_once './views/t_footer.php';
            break;
        case 'detail':
            $pro_detail = $prod->getProductsById($_GET['id']);           
            $name_cate =  $cates->getNameCategoryByProduct($_GET['id']);
            var_dump($name_cate);
            extract($pro_detail);
            $title = 'Sản phẩm chi tiết';
            include_once './views/t_header.php';
            include_once './views/page_banner.php';
            include_once './views/v_product_detail.php';
            include_once './views/t_footer.php';
            break;
        case 'about':
        default:
            echo "Không tìm thấy ql_page này.";
            break;
    }
} else {
    //Phân trang
    $title = 'Sản phẩm';
    if (isset($_GET['ql_page'])) {
        $ql_page = $_GET['ql_page'];
    } else {
        $ql_page = 1;
    }
    $list_page_product = $prod->getProductsByPage($ql_page, 9);
    // Kết thúc phân tra
    include_once './views/t_header.php';
    include_once './views/page_banner.php';
    include_once './views/v_product_shop.php';
    include_once './views/t_footer.php';
}
