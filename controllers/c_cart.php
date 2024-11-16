<?php
include_once './views/t_header.php';
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'checkout':
            $title = 'Thanh toán';

            include_once './views/page_banner.php';
            include_once './views/v_cart_checkout.php';

            break;
        default:
            echo "Không tìm thấy trang này.";
            break;
    }
} else {
    if (isset($_POST['add'])) {
        // Add product to cart
        $id_pro = $_POST['id_product'];
        $quantity = $_POST['quantity'] ?? 1;
        $price = $_POST['price'];
        $data = ['product_id' => $id_pro, 'quantity' => $quantity, 'price' => $price];
        $cart->addToCart($data, 1);
    }
    $title = 'Giỏ hàng';

    include_once './views/page_banner.php';
    include_once './views/v_cart_product.php';
}

include_once './views/t_footer.php';
