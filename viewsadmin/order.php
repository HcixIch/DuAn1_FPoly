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
                                    <th>Đơn hàng</th>
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
                                foreach ($order_list as $od) {
                                    $i++; ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $od['full_name'] ?></td>
                                        <td><?= $od['phone'] ?></td>
                                        <td><?= $od['address'] ?></td>
                                        <td><?= $od['name_product'] ?></td>
                                        <td><?= $od['total_all'] ?>đ</td>
                                        <td><?= $od['quantity'] ?></td>
                                        <td><?= $od['date_order'] ?></td>
                                        <td>
                                            <?php if ($od['status'] == 0) { ?>
                                                <span class="badge badge-danger">Chưa xử lý</span>
                                            <?php } elseif ($od['status'] == 1) { ?>
                                                <span class="badge badge-warning">Đang xử lý</span>
                                            <?php } elseif ($od['status'] == 2) { ?>
                                                <span class="badge badge-success">Đã giao hàng</span>
                                            <?php } elseif ($od['status'] == 3) { ?>
                                                <span class="badge badge-info">Đã hủy</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($od['status'] < 2) { ?>
                                                <button type="button" class="update-status btn btn-primary" data-id="<?= $od['id_checkout'] ?>">
                                                    <?= $od['status'] == 0 ? 'Xử lý' : 'Hoàn tất' ?>
                                                </button>
                                            <?php } ?>
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
