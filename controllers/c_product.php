<?php
include_once './views/t_header.php';
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'detail':
            $pro_detail = $prod->getProductsById($_GET['id']);
            $name_cate =  $cates->getNameCategoryByProduct($_GET['id']);
            extract($pro_detail);
            $related_products = $prod->getProductsByCategory($id_category, $_GET['id']);
            $img_pro = $prod->getProductImages($_GET['id']);
            $list_img = [$img_pro['hinh1'], $img_pro['hinh2'], $img_pro['hinh3'], $img_pro['hinh4']];
            if (isset($_POST['add_to_cart'])) {
                $idproduct = $_POST['id'];
                $quantity = $_POST['quantity'] ?? 1;
                $cart->addProductToCart($idproduct, $quantity);

                echo "<script>alert('Đã thêm sản phẩm vào giỏ hàng');</script>";
            }


            $title = 'Sản phẩm chi tiết';
            include_once './views/page_banner.php';
            include_once './views/v_product_detail.php';
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
        $ql_page = $_GET['ql_page']; //ql là viết tắt của quantity
    } else {
        $ql_page = 1;
    }
    if (isset($_GET['id_cate'])) {
        $list_page_product = $prod->getProductsByPage($ql_page, "cate", 9);
        $count_product = count($prod->getProductsByCategory($_GET['id_cate'], ""));
    } else {
        $list_page_product = $prod->getProductsByPage($ql_page, "all", 9);
        $count_product = count($pro_all);
    }
    if (isset($_POST['search_price'])) {
        $list_page_product = $prod->getProductsByPage($ql_page, "min_max", 9);
        $count_product = count($prod->searchProductByPrice($_POST['number_min'], $_POST['number_max']));
    }
    // Kết thúc phân trang
    include_once './views/page_banner.php';
    include_once './views/v_product_shop.php';
}
include_once './views/t_footer.php';
