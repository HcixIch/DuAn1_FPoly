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
                                <th>STT</th>
                                <th>Tên người nhận hàng</th>
                                <th>Số điện thoại người nhận hàng</th>
                                <th>Địa chỉ nhận hàng</th>
                                <th>Đơn hàng</th>
                                <th>Tổng tiền</th>
                                <th>Số lượng</th>
                                <th>Ngày đặt</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($order_list as $od) {
                                    $i++ ?>
                                    <form action="" method="post">
                                    <tr>
                                        <td><input type="hidden" name="id_checkout" value="<?= $od['id_checkout']?>"><?= $i ?></td>
                                        <td><?= $od['full_name'] ?></td>
                                        <td><?= $od['phone'] ?></td>
                                        <td><?= $od['address'] ?></td>
                                        <td><?= $od['name_product'] ?></td>
                                        <td><?= $od['total_all'] ?>đ</td>
                                        <td><?= $od['quantity'] ?></td>
                                        <td><?= $od['date_order'] ?></td>
                                        <td>
                                            <select name="status" id="status">
                                            <option value="1" <?php if($od['status'] == 1) echo'selected';?> >Đang xử lí</option>
                                            <option value="2" <?php if($od['status'] == 2) echo'selected';?> >Đã xử lí</option>
                                            <option value="3" <?php if($od['status'] == 3) echo'selected';?> >Đã giao hàng</option>
                                            <option value="4" <?php if($od['status'] == 4) echo'selected';?> >Đã nhận hàng</option>
                                            <option value="5" <?php if($od['status'] == 5) echo'selected';?> >Đã hủy</option>
                                            </select>
                                        </td>
                                        <td><button type="submit">Lưu</button></td>
                                    </tr>
                                </form>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>