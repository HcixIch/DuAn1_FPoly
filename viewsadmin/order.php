<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Chi tiết đơn hàng</h4>
                        <p class="category"></p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên người nhận hàng</th>
                                    <th>Số điện thoại người nhận hàng</th>
                                    <th>Địa chỉ nhận hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Số lượng</th>
                                    <th>Ngày đặt</th>
                                    <th>Trạng thái đơn hàng</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($checkoutall as $od) {
                                    $i++; ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $od['full_name'] ?></td>
                                        <td><?= $od['phone'] ?></td>
                                        <td><?= $od['address'] ?></td>
                                        <td><?= $od['total_all'] ?>đ</td>
                                        <td><?= array_sum(array_column($order->GetOrderById($od['id_checkout']),'quantity')) ?></td>
                                        <td><?= $od['date_order'] ?></td>
                                        <td>
                                            <span class="badge" id="order_status_<?= $od['id_checkout'] ?>">
                                                <?php 
                                                    switch ($od['status']) {
                                                        case 1:
                                                            echo 'Chưa xử lý';
                                                            break;
                                                        case 2:
                                                            echo 'Đã xử lý';
                                                            break;
                                                        case 3:
                                                            echo 'Đang giao hàng';
                                                            break;
                                                        case 4:
                                                            echo 'Đã giao hàng';
                                                            break;
                                                        case 5:
                                                            echo 'Đã hủy';
                                                            break;
                                                    }
                                                ?>
                                            </span>
                                        </td>
                                        <td>
                                            <button type="button" class="update-status btn btn-primary" data-id_checkout="<?= $od['id_checkout'] ?>" data-status="<?= $od['status'] ?>"> 
                                                <?php 
                                                    switch ($od['status']) {
                                                        case 1:
                                                            echo 'Xử lý';
                                                            break;
                                                        case 2:
                                                            echo 'Giao Hàng';
                                                            break;
                                                        case 3:
                                                            echo 'Xác nhận đã giao';
                                                            break;
                                                        case 4:
                                                            echo 'Hủy';
                                                            break;
                                                    }
                                                ?>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.update-status').on('click', function() {
        var id_checkout = $(this).data('id_checkout');
        var newStatus = parseInt($(this).data('status'), 10);

        $.ajax({
            url: '?ctrl=admin&view=order', // Replace with the actual PHP file
            type: 'POST',
            data: {
                checkout_id: id_checkout,
                new_status: newStatus
            },
            success: function(response) {
                if (response= 'success') {
                    // Cập nhật trạng thái mới
                    var nextStatusText = '';
                    switch (newStatus) {
                        case 1:
                            nextStatusText = 'Xử lý';
                            break;
                        case 2:
                            nextStatusText = 'Giao Hàng';
                            break;
                        case 3:
                            nextStatusText = 'Xác nhận đã giao';
                            break;
                        case 4:
                            nextStatusText = 'Hủy';
                            break;
                    }

                    // Cập nhật trạng thái trong nút
                    $('#order_status_' + id_checkout).html(nextStatusText);
                    $(this).data('status', newStatus);
                    $(this).text(nextStatusText);

                    alert('Cập nhật trạng thái đơn hàng thành công!');
                } else {
                    alert('Có lỗi xảy ra. Vui lòng thử lại.');
                }
            }
        });
    });
});
</script>