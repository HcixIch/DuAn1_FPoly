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
        $cart->addToCart($data, $_SESSION['user'][0]['id_user']);
        header('location:index.php?ctrl=cart');
    }
    if (isset($_GET['id_dl'])) {
        $cart->deleteProductInCart($_GET['id_dl']);
        header('location:index.php?ctrl=cart');
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['quantity'])) {
        // Tạo đối tượng Database
        $db = new Database();

        foreach ($_POST['quantity'] as $id_cart => $quantity) {
            // Kiểm tra nếu số lượng hợp lệ (lớn hơn 0)
            if ($quantity > 0) {
                $sql = "SELECT price_product FROM cart INNER JOIN product ON cart.id_product = product.id_product WHERE cart.id_cart = ?";
                $result = $db->getOne($sql, [$id_cart]);

                // Kiểm tra nếu có sản phẩm
                if ($result) {
                    $price_product = $result['price_product'];

                    // Tính toán lại subtotal cho sản phẩm
                    $subtotal = $price_product * $quantity;

                    // Cập nhật lại số lượng và subtotal vào giỏ hàng
                    $update_sql = "UPDATE cart SET quantity = ?, subtotal = ? WHERE id_cart = ?";
                    $db->update($update_sql, [$quantity, $subtotal, $id_cart]);
                }
            }
        }

        // Sau khi cập nhật, chuyển hướng về trang giỏ hàng
        header("Location: ?ctrl=cart");
        exit();
    }
    $title = 'Giỏ hàng';

    include_once './views/page_banner.php';
    include_once './views/v_cart_product.php';
}

include_once './views/t_footer.php';
