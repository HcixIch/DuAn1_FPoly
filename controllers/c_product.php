<?php
include_once './views/t_header.php';

// Kiểm tra nếu có tham số view trong URL
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'detail':
            // Lấy chi tiết sản phẩm theo id
            $pro_detail = $prod->getProductsById($_GET['id']);
            $name_cate = $cates->getNameCategoryByProduct($_GET['id']);
            extract($pro_detail);

            // Lấy các sản phẩm liên quan theo danh mục
            $related_products = $prod->getProductsByCategory($id_category, $_GET['id']);

            // Lấy hình ảnh sản phẩm
            $img_pro = $prod->getProductImages($_GET['id']);
            $list_img = [$img_pro['hinh1'], $img_pro['hinh2'], $img_pro['hinh3'], $img_pro['hinh4']];

            // Xử lý thêm vào giỏ hàng
            if (isset($_POST['add_to_cart'])) {
                $idproduct = $_POST['id'];
                $quantity = $_POST['quantity'] ?? 1;
                $cart->addProductToCart($idproduct, $quantity);

                echo "<script>alert('Đã thêm sản phẩm vào giỏ hàng');</script>";
            }
            if (isset($_GET['id_dl'])) {
                $cart->deleteProductInCart($_GET['id_dl'], 1);
                header('location:index.php?view=detail&id=' . $_GET['id']);
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
    // Phân trang
    $title = 'Sản phẩm';
    // Xử lý POST hoặc GET cho các tham số lọc
    $min_price = $_POST['number_min'] ?? $_POST['min_price'] ?? 0;
    $max_price = $_POST['number_max'] ?? $_POST['max_price'] ?? $prod->getMinMaxPriceProduct('MAX')['max_price'];

    // Xử lý phân trang
    $ql_page = $_GET['ql_page'] ?? 1;
    $limit = 9;  // Số sản phẩm mỗi trang
    $offset = ($ql_page - 1) * $limit;

    // Lấy sản phẩm theo giá và phân trang
    if (isset($_GET['id_cate'])) {
        // Lọc theo danh mục và giá
        $list_page_product = $prod->getProductsByPage($ql_page, "cate", $limit, $min_price, $max_price);
        $count_product = count($prod->countProductsByCategory($_GET['id_cate']));
    } else {
        // Lọc tất cả sản phẩm theo giá
        $list_page_product = $prod->getProductsByPage($ql_page, "all", $limit, $min_price, $max_price);
        $count_product = count($prod->searchProductByPrice($min_price, $max_price));
    }

    // Tính số trang
    $quantity_page = ceil($count_product / $limit);
    include_once './views/page_banner.php';
    include_once './views/v_product_shop.php';
}
include_once './views/t_footer.php';
