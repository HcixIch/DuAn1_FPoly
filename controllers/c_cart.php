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
        $date = date('Y-m-d H:i:s');
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
            $img = '<img style="display: block;width:50%; margin: 0 auto;"  src="https://i.imgur.com/saqO23m.png" alt="Momo" />';
          } else if ($data['payment_method'] == 'bank') {
            $pay = 'Thanh toán qua Ngân hàng';
            $img = '<img style="display: block;width:50%; margin: 0 auto;" src="https://i.imgur.com/saqO23m.png" alt="Bank" />';
          } else {
            $pay = 'Thanh toán khi nhận hàng';
          }
          $checkout_new = $checkout->getCheckoutNewMost();
          $content = '<table style="max-width: 600px; margin: 20px auto; background-color: #fff; border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
                    <thead style="background-color: #673ab7; color: #fff; text-align: center;">
                      <tr>
                        <th style="padding: 15px; font-size: 18px;">Cảm ơn đã mua hàng của chúng tôi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="padding: 20px;">
                          <p>Xin chào,</p>
                          <p>Chúng tôi đã xử lý xong đơn hàng của bạn.</p>
                          <p><strong>[Đơn hàng #' . $checkout_new[0]['id_checkout'] . '] ' . date("Y-m-d H:i:s") . '</strong></p>
                          <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                            <thead>
                              <tr>
                                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Sản phẩm</th>
                                <th style="border: 1px solid #ddd; padding: 10px; text-align: center;">Số lượng</th>
                                <th style="border: 1px solid #ddd; padding: 10px; text-align: right;">Giá</th>
                              </tr>
                            </thead>
                            <tbody>';
          foreach ($_SESSION['cart'] as $cart) {
            extract($cart);
            $content .= '
                              <tr>
                                <td style="border: 1px solid #ddd; padding: 10px;">' . $name_product . '</td>
                                <td style="border: 1px solid #ddd; padding: 10px; text-align: center;">' . $quantity_product . '</td>
                                <td style="border: 1px solid #ddd; padding: 10px; text-align: right;">' .  number_format($subtotal, 0, ',', '.') . 'đ</td>
                              </tr>';
          };
          $content .= '
                            </tbody>
                          </table>
                          <p style="margin-top: 10px;"><strong>Tổng cộng trước giảm giá:</strong></p>
                          <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                              <tr>
                                <td colspan="2" style="border: 1px solid #ddd; padding: 10px; text-align: right;"><strong>Tổng số phụ:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 10px; text-align: right;"> ' . number_format(array_sum(array_column($_SESSION['cart'], 'subtotal')), 0, ',', '.') . 'đ</td>
                              </tr>
                              <tr>
                                <td colspan="2" style="border: 1px solid #ddd; padding: 10px; text-align: right;"><strong>Giảm giá:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 10px; text-align: right;">-50.000đ</td>
                              </tr>
                              <tr>
                                <td colspan="2" style="border: 1px solid #ddd; padding: 10px; text-align: right;"><strong>Phương thức thanh toán:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 10px; text-align: right;">';
          if ($payment_method == 'bank') {
            $content .= 'Chuyển khoản ngân hàng';
          } elseif ($payment_method == 'momo') {
            $content .= 'Thanh toán qua Momo';
          } elseif ($payment_method == 'cod') {
            $content .= 'Thanh toán khi nhận hàng';
          }
          $content .= '</td>
                              </tr>
                              <tr>
                                <td colspan="2" style="border: 1px solid #ddd; padding: 10px; text-align: right;"><strong>Tổng cộng:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 10px; text-align: right;">' . number_format(array_sum(array_column($_SESSION['cart'], 'subtotal')), 0, ',', '.') . 'đ</td>
                              </tr>
                            </tbody>
                          </table>
                          <p style="margin-top: 20px;"><strong>Địa chỉ thanh toán</strong></p>
                          <p>' . $fullname . '<br>
                          ' . $address . '<br>
                          ' . $phone . '<br>
                          ' . $_SESSION['user'][0]['email_user'] . '</p>
                          <p style="margin-top: 20px;">Cảm ơn đã mua hàng của chúng tôi.</p>
                        </td>
                      </tr>
                    </tbody>
                    <tfoot style="  background-color: #f1f1f1; text-align: center;">
                      <tr>
                        <td style="padding: 15px; font-size: 12px; color: #888;">Pháo Thủ Shop</td>
                      </tr>
                    </tfoot>
                  </table>';
          $subject = 'Chúng Tôi Đã Nhận Được Đơn Hàng Của Bạn – Cập Nhật Thông Tin Đơn Hàng DA00' . $checkout_new[0]['id_checkout'] . '';
          sendMail($_POST['emailsend'], $subject, $content);
          $data_order = [];
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
