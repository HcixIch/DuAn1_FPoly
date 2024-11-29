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
                $errors = [];
                // Kiểm tra dữ liệu
                if (!$fullname) $errors[] = 'Họ và tên không được để trống.';
                if (!$phone || !preg_match('/^\d{10,11}$/', $phone)) $errors[] = 'Số điện thoại không hợp lệ.';
                if (!$address) $errors[] = 'Địa chỉ không được để trống.';
                if ($voucher && strlen($voucher) < 5) $errors[] = 'Mã giảm giá phải có ít nhất 5 ký tự.';
                if (!in_array($payment_method, ['momo', 'bank', 'cod'])) $errors[] = 'Phương thức thanh toán không hợp lệ.';

                // Kiểm tra lỗi và xử lý
                if ($errors) {
                    foreach ($errors as $error) {
                        echo "<p style='color: red;'>$error</p>";
                    }
                } else {
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
                    if ($data['payment_method'] == 'momo') {
                        $pay = 'Thanh toán qua Momo';
                        $img = '<img src="assets/images/pay/bank.png" alt="Momo" />';
                    } else if ($data['payment_method'] == 'bank') {
                        $pay = 'Thanh toán qua Ngân hàng';
                        $img = '<img src="assets/images/pay/bank.png" alt="Bank" />';
                    } else {
                        $pay = 'Thanh toán khi nhận hàng';
                    }
                    $checkout_new = $checkout->getCheckoutNewMost();
                    $content = '<div style="max-width: 600px; margin: 20px auto; background: #ffffff; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">
    <div style="text-align: center; padding-bottom: 20px; border-bottom: 1px solid #ddd;">
      <h1 style="color: #333; font-size: 24px; margin: 0;">Thông Báo Đơn Hàng</h1>
    </div>
    <div style="margin: 20px 0;">
      <p style="margin: 0 0 10px;">Xin chào ' . $fullname . ',</p>
      <p style="margin: 0 0 10px;">Chúng tôi xin thông báo rằng đơn hàng của bạn tại PhaoThuShop.VN đã được ghi nhận và đang trong quá trình xử lý. Cảm ơn bạn đã tin tưởng chọn mua sản phẩm của chúng tôi. Dưới đây là thông tin chi tiết về đơn hàng của bạn:</p>
      <p style="margin: 0 0 10px;">
        <strong>Mã đơn hàng:</strong> DA00' . $checkout_new[0]['id_checkout'] . '<br>
        <strong>Ngày đặt hàng:</strong> ' . date("Y-m-d H:i:s") . '<br>
        <strong>Tổng tiền:</strong> ' . number_format($total_price, 0, ',', '.') . ' VNĐ<br>
        <strong>Phương thức thanh toán:</strong> ' . $pay . '<br>';
                    if ($data['payment_method'] == 'momo' || $data['payment_method'] == 'bank') {
                        $content .= ' <strong>Quý khách vui long thanh toán</strong><br>' . $img . '<br>';
                    }
                    $content .= '
        <strong>Địa chỉ giao hàng:</strong> ' . $address . '
      </p>
      <p style="margin: 0 0 10px;">Chúng tôi sẽ tiếp tục xử lý đơn hàng và thông báo khi sản phẩm được vận chuyển. Thông tin vận chuyển sẽ được cập nhật trong email tiếp theo của bạn.</p>
      <p style="margin: 0 0 10px;">Nếu bạn có bất kỳ câu hỏi hoặc yêu cầu thay đổi nào về đơn hàng, đừng ngần ngại liên hệ với chúng tôi qua email <a href="mailto:support@company.com" style="color: #007BFF; text-decoration: none;">support@company.com</a> hoặc gọi vào số điện thoại 0373196508.</p>
      <p style="margin: 0 0 10px;">Chúng tôi rất mong muốn mang đến cho bạn trải nghiệm mua sắm tuyệt vời và sẽ luôn hỗ trợ bạn trong suốt quá trình đặt hàng.</p>
      <p style="margin: 0 0 10px;">Trân trọng,</p>
      <p style="margin: 0;">Đội ngũ hỗ trợ khách hàng của PhaoThuShop</p>
    </div>
    <div style="text-align: center; font-size: 14px; color: #777; border-top: 1px solid #ddd; padding-top: 10px;">
      <p style="margin: 0;">&copy; 2024 PhaoThuCompany. Tất cả quyền lợi được bảo vệ.</p>
    </div>
  </div>';
                    $subject = 'Chúng Tôi Đã Nhận Được Đơn Hàng Của Bạn – Cập Nhật Thông Tin Đơn Hàng DA00' . $checkout_new[0]['id_checkout'] . '';
                    sendMail($_POST['emailsend'], $subject, $content);
                }
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
