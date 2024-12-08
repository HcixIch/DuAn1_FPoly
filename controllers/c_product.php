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
            if (isset($_GET['id_addcart'])) {

                // Lấy thông tin sản phẩm từ cơ sở dữ liệu
                $product = $prod->getProductsById($_GET['id_addcart']); // Đảm bảo phương thức này trả về đúng thông tin sản phẩm
                if ($product) {
                    // Khởi tạo giỏ hàng nếu chưa tồn tại
                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    }

                    // Kiểm tra sản phẩm có trùng trong giỏ hàng hay không
                    $isFound = false;
                    foreach ($_SESSION['cart'] as &$item) {
                        if ($item['id_product'] == $_GET['id_addcart']) { // So sánh chính xác ID sản phẩm
                            $item['quantity_product'] += 1; // Tăng số lượng sản phẩm lên 1
                            $item['subtotal'] = $item['quantity_product'] * $item['price']; // Cập nhật tổng tiền
                            $isFound = true; // Đánh dấu là đã tìm thấy sản phẩm
                            break;
                        }
                    }

                    // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
                    if (!$isFound) {
                        $data = [
                            'id_product' => $product['id_product'], // ID sản phẩm
                            'quantity_product' => 1, // Số lượng mặc định
                            'name_product' => $product['name_product'], // Tên sản phẩm
                            'price' => $product['price_product'], // Giá sản phẩm
                            'img_product' => $product['img_product'], // Hình ảnh sản phẩm
                            'subtotal' => $product['price_product'] // Tổng tiền ban đầu
                        ];
                        $_SESSION['cart'][] = $data; // Thêm sản phẩm mới vào giỏ hàng
                    }

                    // Chuyển hướng về trang giỏ hàng
                    header('location:index.php?ctrl=cart');
                }
            }
            if (isset($_GET['id_wishlist'])) {
                $id_user = $_SESSION['user'][0]['id_user'] ?? 0;

                if ($id_user > 0) {
                    // Kiểm tra trạng thái sản phẩm trong wishlist
                    if ($wish->checkProductInWishlist($_GET['id_wishlist'], $id_user)) {
                        // Nếu đã thích -> Xóa khỏi danh sách yêu thích
                        $wish->removeProductFromWishlist($_GET['id_wishlist'], $id_user);
                    } else {
                        // Nếu chưa thích -> Thêm vào danh sách yêu thích
                        $wish->addProductToWishlist($_GET['id_wishlist'], $id_user);
                    }

                    // Redirect lại trang hiện tại sau khi xử lý
                    header("Location: ?ctrl=product&view=detail&id=" . $_GET['id']);
                }
                exit;
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
    if (isset($_GET['id_wishlist'])) {
        $id_user = $_SESSION['user'][0]['id_user'] ?? 0;

        if ($id_user > 0) {
            // Kiểm tra trạng thái sản phẩm trong wishlist
            if ($wish->checkProductInWishlist($_GET['id_wishlist'], $id_user)) {
                // Nếu đã thích -> Xóa khỏi danh sách yêu thích
                $wish->removeProductFromWishlist($_GET['id_wishlist'], $id_user);
            } else {
                // Nếu chưa thích -> Thêm vào danh sách yêu thích
                $wish->addProductToWishlist($_GET['id_wishlist'], $id_user);
            }

            // Redirect lại trang hiện tại sau khi   xử lý
            header("Location: ?ctrl=product");
        }
        exit;
    }
    // Xử lý phân trang
    $ql_page = $_GET['ql_page'] ?? 1;
    $limit = 9; // Số sản phẩm mỗi trang
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

    if (isset($_GET['id_addcart'])) {

        // Lấy thông tin sản phẩm từ cơ sở dữ liệu
        $product = $prod->getProductsById($_GET['id_addcart']); // Đảm bảo phương thức này trả về đúng thông tin sản phẩm
        if ($product) {
            // Khởi tạo giỏ hàng nếu chưa tồn tại
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // Kiểm tra sản phẩm có trùng trong giỏ hàng hay không
            $isFound = false;
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id_product'] == $_GET['id_addcart']) { // So sánh chính xác ID sản phẩm
                    $item['quantity_product'] += 1; // Tăng số lượng sản phẩm lên 1
                    $item['subtotal'] = $item['quantity_product'] * $item['price']; // Cập nhật tổng tiền
                    $isFound = true; // Đánh dấu là đã tìm thấy sản phẩm
                    break;
                }
            }

            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
            if (!$isFound) {
                $data = [
                    'id_product' => $product['id_product'], // ID sản phẩm
                    'quantity_product' => 1, // Số lượng mặc định
                    'name_product' => $product['name_product'], // Tên sản phẩm
                    'price' => $product['price_product'], // Giá sản phẩm
                    'img_product' => $product['img_product'], // Hình ảnh sản phẩm
                    'subtotal' => $product['price_product'] // Tổng tiền ban đầu
                ];
                $_SESSION['cart'][] = $data; // Thêm sản phẩm mới vào giỏ hàng
            }

            // Chuyển hướng về trang giỏ hàng
            header('location:index.php?ctrl=cart');
        }
    }

    // Tính số trang
    $quantity_page = ceil($count_product / $limit);
    include_once './views/page_banner.php';
    include_once './views/v_product_shop.php';
}
include_once './views/t_footer.php';
