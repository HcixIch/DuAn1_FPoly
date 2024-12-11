<?php
session_start();
require_once 'Voucher.php'; // Đảm bảo bạn đã include lớp Voucher

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voucher_code = $_POST['voucher_code'] ?? '';
    $total_amount = $_POST['total_amount'] ?? 0;

    // Tạo đối tượng Voucher và gọi phương thức applyVoucher
    $voucherObj = new Voucher();
    $result = $voucherObj->applyVoucher($voucher_code, $total_amount);

    // Trả kết quả về cho client
    echo json_encode($result);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Yêu cầu không hợp lệ!'
    ]);
}
