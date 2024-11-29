<?php
include_once './views/t_header.php';
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'checkout':
            // Kiểm tra nếu đã đăng nhập
            if (isset($_POST['buynow'])) {
                $user = $_POST['id_user'];
                $fullname = $_POST['fullname'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $voucher = isset($_POST['voucher']) && $_POST['voucher'] !== '' ? (int)$_POST['voucher'] : NULL;

                $payment_method = $_POST['payment_method'];
                $shipping_cost = 30000;
                $provisional_price = $_POST['provisional'];
                $total_price = $provisional_price + $shipping_cost;
                $data = [
                    'id_user' => $user,
                    'provisional_price' => $provisional_price,
                    'total_price' => $total_price,
                    'shipping_cost' => $shipping_cost,
                    'fullname' => $fullname,
                    'phone' => $phone,
                    'address' => $address,
                    'voucher' => $voucher,
                    'payment_method' => $payment_method
                ];
                $checkout->insertCheckout($data);
            }

            $title = 'Thanh toán';

            include_once './views/page_banner.php';
            include_once './views/v_cart_checkout.php';

            break;
        default:
            echo "Không tìm thấy trang này.";
            break;
    }
} else {
    // if (isset($_POST['add'])) {
    //     // Add product to cart
    //     $id_pro = $_POST['id_product'];
    //     $quantity = $_POST['quantity'] ?? 1;
    //     $price = $_POST['price'];
    //     $data = ['product_id' => $id_pro, 'quantity' => $quantity, 'price' => $price];
    //     $cart->addToCart($data, $_SESSION['user'][0]['id_user']);
    //     header('location:index.php?ctrl=cart');
    // }
    // if (isset($_GET['id_dl'])) {
    //     $cart->deleteProductInCart($_GET['id_dl']);
    //     header('location:index.php?ctrl=cart');
    // }
    // if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['quantity'])) {
    //     // Tạo đối tượng Database
    //     $db = new Database();

    //     foreach ($_POST['quantity'] as $id_cart => $quantity) {
    //         // Kiểm tra nếu số lượng hợp lệ (lớn hơn 0)
    //         if ($quantity > 0) {
    //             $sql = "SELECT price_product FROM cart INNER JOIN product ON cart.id_product = product.id_product WHERE cart.id_cart = ?";
    //             $result = $db->getOne($sql, [$id_cart]);

    //             // Kiểm tra nếu có sản phẩm
    //             if ($result) {
    //                 $price_product = $result['price_product'];

    //                 // Tính toán lại subtotal cho sản phẩm
    //                 $subtotal = $price_product * $quantity;

    //                 // Cập nhật lại số lượng và subtotal vào giỏ hàng
    //                 $update_sql = "UPDATE cart SET quantity = ?, subtotal = ? WHERE id_cart = ?";
    //                 $db->update($update_sql, [$quantity, $subtotal, $id_cart]);
    //             }
    //         }
    //     }

    //     // Sau khi cập nhật, chuyển hướng về trang giỏ hàng
    //     header("Location: ?ctrl=cart");
    //     exit();
    // }
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_POST['add'])) {
        $id_pro = $_POST['id_product'];
        $name_product = $_POST['name_product'];
        $quantity = $_POST['quantity'] ?? 1;
        $price = $_POST['price'];
        $img_product = $_POST['img_product'];
        $subtotal = $quantity * $price;

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $isFound = false;
        foreach ($_SESSION['cart'] as &$item) { // Dùng tham chiếu để cập nhật trực tiếp
            if ($item['id_product'] == $id_pro) {
                $item['quantity_product'] += $quantity; // Tăng số lượng
                $item['subtotal'] = $item['quantity_product'] * $price; // Cập nhật tổng tiền
                $isFound = true;
                break;
            }
        }

        // Nếu sản phẩm chưa tồn tại, thêm mới
        if (!$isFound) {
            $data = [
                'id_product' => $id_pro,
                'quantity_product' => $quantity,
                'name_product' => $name_product,
                'price' => $price,
                'img_product' => $img_product,
                'subtotal' => $subtotal
            ];
            $_SESSION['cart'][] = $data;
        }

        // Điều hướng về trang giỏ hàng
        header('location:index.php?ctrl=cart');
        exit(); // Ngăn chặn xử lý thêm sau header
    }

    // Xóa sản phẩm khỏi giỏ hàng
    if (isset($_GET['id_dl'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id_product'] == $_GET['id_dl']) {
                unset($_SESSION['cart'][$key]); // Xóa sản phẩm
            }
        }
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Đặt lại chỉ số mảng
        header('location:index.php?ctrl=cart');
        exit();
    }
    if (isset($_GET['delall'])) {
        unset($_SESSION['cart']);
        header('location:index.php?ctrl=cart');
        exit();
    }
    // Kiểm tra nếu có dữ liệu POST từ form



    // Kiểm tra nếu có yêu cầu AJAX để cập nhật giỏ hàng
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_product']) && isset($_POST['quantity'])) {
        $productId = $_POST['id_product']; // Lấy ID sản phẩm
        $quantity = $_POST['quantity']; // Lấy số lượng sản phẩm mới

        // Kiểm tra nếu giỏ hàng đã tồn tại trong session
        if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$productId])) {
            // Cập nhật số lượng và tính toán lại subtotal
            $_SESSION['cart'][$productId]['quantity_product'] = $quantity;
            $_SESSION['cart'][$productId]['subtotal'] = $_SESSION['cart'][$productId]['price'] * $quantity; // Cập nhật subtotal mới
        }

        // Tính toán lại tổng giỏ hàng
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['subtotal']; // Tính tổng giỏ hàng
        }

        // Trả về kết quả dưới dạng JSON (subtotal của sản phẩm và tổng giỏ hàng)
        echo json_encode([
            'subtotal' => number_format($_SESSION['cart'][$productId]['subtotal'], 0, ',', '.') . '₫',
            'total' => number_format($total, 0, ',', '.') . '₫'
        ]);
        exit();
    }





    // Debug giỏ hàng (xóa khi hoàn thiện)
    var_dump($_SESSION['cart']);

    // Tiêu đề trang
    $title = 'Giỏ hàng';


    include_once './views/page_banner.php';
    include_once './views/v_cart_product.php';
}
include_once './views/t_footer.php';
