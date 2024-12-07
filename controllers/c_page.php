<?php
include_once './views/t_header.php';
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'contact':
            $title = 'Liên hệ';

            include_once './views/page_banner.php';
            include_once './views/v_page_contact.php';

            break;
        case 'about':
        default:
            echo "Không tìm thấy trang này.";
            break;
    }
} else {
    $pro_new = $prod->getProductsByCondition('new', "");
    $pro_hot = $prod->getProductsByCondition('hot', "");
    $pro_sale = $prod->getProductsByCondition('sale', "");
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
    include_once './views/slider.php';
    include_once './views/v_page_home.php';
}
include_once './views/t_footer.php';
