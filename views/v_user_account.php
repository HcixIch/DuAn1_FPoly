<!-- Phần Tài khoản của tôi bắt đầu -->
<div
    class="my-account-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- Bắt đầu menu Tài khoản của tôi -->
                    <div class="col-lg-3 col-12">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#dashboad" class="<?= !isset($_GET['id_checkout']) ? 'active' : '' ?>"
                                data-toggle="tab"><i class="fa fa-dashboard"></i> Bảng điều khiển</a>

                            <a href="#orders" class="<?= isset($_GET['id_checkout']) ? 'active' : '' ?>"
                                data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Đơn hàng</a>
                            <a href="#wishlist" data-toggle="tab"><i class="fa fa-heart"></i> Sản phẩm yêu thích</a>
                            <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Chi tiết tài khoản</a>

                            <a href="login-register.html"><i class="fa fa-sign-out"></i> Xóa tài khoản</a>
                        </div>
                    </div>
                    <!-- Kết thúc menu Tài khoản của tôi -->

                    <!-- Bắt đầu nội dung Tài khoản của tôi -->
                    <div class="col-lg-9 col-12">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Nội dung thẻ Bảng điều khiển -->
                            <div class="tab-pane fade <?= !isset($_GET['id_checkout']) ? 'show active' : '' ?>"
                                id="dashboad" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Bảng điều khiển</h3>
                                    <p>Chào mừng đến với tài khoản của bạn.</p>
                                </div>
                            </div>

                            <!-- Nội dung thẻ Đơn hàng -->
                            <?php if (isset($_GET['id_checkout'])) { ?>
                                <!-- Chi tiết đơn hàng -->
                                <div class="tab-pane fade show active" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Chi tiết đơn hàng</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Sản phẩm</th>
                                                        <th>Đơn giá</th>
                                                        <th>Số lượng</th>
                                                        <th>Tổng tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $orderDetails = $order->GetOrderById($_GET['id_checkout']);
                                                    $i = 1;
                                                    foreach ($orderDetails as $co) {
                                                        extract($co);
                                                    ?>
                                                        <tr>
                                                            <td><?= $i++ ?></td>
                                                            <td><?= $name_product ?></td>
                                                            <td><?= number_format($price_product, 0, '', '.') ?> đ</td>
                                                            <td><?= $quantity ?></td>
                                                            <td><?= number_format($price, 0, '', '.') ?> đ</td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="4" class="text-right font-weight-bold">Tổng tiền</td>
                                                        <td class="text-right font-weight-bold">
                                                            <?= number_format($unit_price, 0, '', '.') ?> đ
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <!-- Danh sách đơn hàng -->
                                <div class="tab-pane fade show active" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Đơn hàng</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Mã đơn hàng</th>
                                                        <th>Ngày</th>
                                                        <th>Số sản phẩm</th>
                                                        <th>Tổng tiền</th>
                                                        <th>Trạng thái</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($checkoutall as $co) {
                                                        extract($co);
                                                    ?>
                                                        <tr>
                                                            <td><?= $id_checkout ?></td>
                                                            <td>DA00<?= $id_checkout ?></td>
                                                            <td><?= $date_order ?></td>
                                                            <td>
                                                                <!-- Số lượng sản phẩm -->
                                                            </td>
                                                            <td><?= number_format($provisional_total, 0, '', '.') ?> đ</td>
                                                            <td>
                                                                <?php
                                                                if ($status == 1) echo "Chờ xử lý";
                                                                elseif ($status == 2) echo "Đã xử lý";
                                                                elseif ($status == 3) echo "Đã giao hàng";
                                                                elseif ($status == 4) echo "Đã nhận hàng";
                                                                elseif ($status == 5) echo "Đã hủy";
                                                                ?>
                                                            </td>
                                                            <td><a href="?ctrl=user&view=account&id_checkout=<?= $id_checkout ?>"
                                                                    class="btn">Xem</a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- Nội dung thẻ Chi tiết tài khoản -->
                            <div class="tab-pane fade" id="wishlist" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Sản phẩm yêu thích</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Giá</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>22</td>
                                                    <td>111</td>
                                                    <td>111111111</td>
                                                    <td>
                                                        <a href="?ctrl=product&view=detail&id=<?= $id_product ?>"
                                                            class="btn btn-sm btn-info">Xem</a>
                                                        <a href="?ctrl=user&action=removeFromWishlist&id_product=<?= $id_product ?>"
                                                            class="btn btn-sm btn-danger">Xóa</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Kết thúc Chi tiết tài khoản -->
                            <!-- Nội dung thẻ Chi tiết tài khoản -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Chi tiết tài khoản</h3>
                                    <div class="account-details-form">
                                        <form action="?ctrl=user&view=account" method="post">
                                            <div class="row">
                                                <div class="col-12 mb-30">
                                                    <input id="first-name" name="fullname" placeholder="Họ và Tên"
                                                        type="text" value="<?= $_SESSION['user'][0]['full_name'] ?>">
                                                </div>
                                                <div class="col-12 mb-30">
                                                    <input id="email" name="email" placeholder="Địa chỉ Email"
                                                        type="email" value="<?= $_SESSION['user'][0]['email_user'] ?>">
                                                </div>
                                                <div class="col-12 mb-30">
                                                    <input id="address" name="address" placeholder="Địa chỉ" type="text"
                                                        value="<?= $_SESSION['user'][0]['address_user'] ?>">
                                                </div>
                                                <div class="col-12 mb-30">
                                                    <input id="phone" name="phone" placeholder="Số điện thoại"
                                                        type="number" value="<?= $_SESSION['user'][0]['phone_user'] ?>">
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" name="changeuser" class="save-change-btn">Lưu
                                                        thay đổi</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Kết thúc Chi tiết tài khoản -->

                        </div>
                    </div>
                    <!-- Kết thúc nội dung Tài khoản của tôi -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Phần Tài khoản của tôi kết thúc -->