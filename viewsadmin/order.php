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

                            </thead>
                            <tbody>
                                <?php 
                                        $order_list = $order->GetDetailOrder();
                                        foreach($order_list as $od){
                                        $i =0;?>
                                <tr>
                                    <td><?= $i + 1?></td>
                                    <td><?= $od['full_name']?></td>
                                    <td><?= $od['phone']?></td>
                                    <td><?= $od['address']?></td>
                                    <td><?= $od['name_product']?></td>
                                    <td><?= $od['total_all']?>đ</td>
                                    <td><?= $od['quantity']?></td>
                                    <td><?= $od['date_order']?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>