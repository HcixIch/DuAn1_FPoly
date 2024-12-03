<!--Phần Tài khoản của tôi bắt đầu-->
<div
    class="my-account-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="row">
                    <!-- Bắt đầu menu Tài khoản của tôi -->
                    <div class="col-lg-3 col-12">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i> Bảng
                                điều khiển</a>

                            <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Đơn hàng</a>

                            <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Chi tiết tài khoản</a>

                            <a href="login-register.html"><i class="fa fa-sign-out"></i>Xóa tài khoản</a>
                        </div>
                    </div>
                    <!-- Kết thúc menu Tài khoản của tôi -->

                    <!-- Bắt đầu nội dung Tài khoản của tôi -->
                    <div class="col-lg-9 col-12">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Nội dung thẻ đơn lẻ Bảng điều khiển bắt đầu -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">

                                <form action="#" class="checkout-form" method="post">
                                    <div class="row row-40">

                                        <div class="col-lg-7">

                                            <!-- Địa chỉ thanh toán -->
                                            <div id="billing-form" class="mb-10">
                                                <div class="row">
                                                    <div class="col-md-12 col-12 mb-5">
                                                        <label>Họ và tên*</label>
                                                        <input type="text" name="fullname" value="<?=$_SESSION['user'][0]['full_name'] ?>" >
                                                    </div>
                                                    <div class="col-md-12 col-12 mb-5">
                                                        <label>Địa chỉ Email*</label>
                                                        <input type="email" name="email" value="
                                                        <?=$_SESSION['user'][0]['email_user']?>" >
                                                    </div>
                                                    <div class="col-md-12 col-12 mb-5">
                                                        <label>Số điện thoại*</label>
                                                        <input type="text" name="phone" value="
                                                        <?=$_SESSION['user'][0]['phone_user']?>" >
                                                    </div>
                                                    <div class="col-12 mb-5">
                                                        <label>Địa chỉ*</label>
                                                        <input type="text" name="address" value="
                                                        <?=$_SESSION['user'][0]['address_user']?>" >
                                                    </div>
                                                    <div class="col-12 mb-5">
                                                        <button class="btn btn-lg btn-round" name="changeuser">Lưu</button>
                                                    </div>

                                                </div>

                                            </div>

                                            <!-- Địa chỉ giao hàng -->

                                        </div>


                                    </div>
                                </form>
                            </div>
                            <!-- Nội dung thẻ đơn lẻ Bảng điều khiển kết thúc -->

                            <!-- Nội dung thẻ đơn lẻ Đơn hàng bắt đầu -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Đơn hàng</h3>

                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Ngày</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng cộng</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><a href="cart.html" class="btn">Xem</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Nội dung thẻ đơn lẻ Đơn hàng kết thúc -->


                            <!-- Nội dung thẻ đơn lẻ Chi tiết tài khoản bắt đầu -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Chi tiết tài khoản</h3>

                                    <div class="account-details-form">
                                        <form action="#"  method="post">
                                            <div class="row">
                                                <div class="col-12 mb-30">
                                                    <input id="first-name" name="fullname" placeholder="Họ vàTên" type="text" value="<?= $_SESSION['user'][0]['full_name']?>">
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="display-name" name="username" placeholder="Tên hiển thị" type="text" value="<?= $_SESSION['user'][0]['user_name']?>">
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="email" name="email" placeholder="Địa chỉ Email" type="email" value="<?= $_SESSION['user'][0]['email_user']?>">
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <h4>Thay đổi mật khẩu</h4>
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="current-pwd" name="password" placeholder="Mật khẩu hiện tại"
                                                        type="password">
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="new-pwd" name="newpassword" placeholder="Mật khẩu mới" type="password">
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="confirm-pwd" name="password-comfirm" placeholder="Xác nhận mật khẩu"
                                                        type="password">
                                                </div>

                                                <div class="col-12">
                                                    <button class="save-change-btn">Lưu thay đổi</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Nội dung thẻ đơn lẻ Chi tiết tài khoản kết thúc -->
                        </div>
                    </div>
                    <!-- Kết thúc nội dung Tài khoản của tôi -->
                </div>

            </div>

        </div>
    </div>
</div>
<!--Phần Tài khoản của tôi kết thúc-->