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

                            <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i> Tải xuống</a>

                            <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Phương thức
                                thanh toán</a>

                            <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> Địa chỉ</a>

                            <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Chi tiết tài khoản</a>

                            <a href="login-register.html"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                        </div>
                    </div>
                    <!-- Kết thúc menu Tài khoản của tôi -->

                    <!-- Bắt đầu nội dung Tài khoản của tôi -->
                    <div class="col-lg-9 col-12">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Nội dung thẻ đơn lẻ Bảng điều khiển bắt đầu -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">

                                <form action="#" class="checkout-form">
                                    <div class="row row-40">

                                        <div class="col-lg-7">

                                            <!-- Địa chỉ thanh toán -->
                                            <div id="billing-form" class="mb-10">
                                                <div class="row">
                                                    <div class="col-md-12 col-12 mb-5">
                                                        <label>Họ và tên*</label>
                                                        <input type="text" placeholder="Họ và tên">
                                                    </div>
                                                    <div class="col-md-12 col-12 mb-5">
                                                        <label>Địa chỉ Email*</label>
                                                        <input type="email" placeholder="Email">
                                                    </div>
                                                    <div class="col-md-12 col-12 mb-5">
                                                        <label>Số điện thoại*</label>
                                                        <input type="text" placeholder="Số điện thoại">
                                                    </div>
                                                    <div class="col-12 mb-5">
                                                        <label>Địa chỉ*</label>
                                                        <input type="text" placeholder="Nhập địa chỉ">
                                                    </div>
                                                    <div class="col-12 mb-5">
                                                        <button class="btn btn-lg btn-round">Lưu</button>
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
                                                    <td>1</td>
                                                    <td>Dầu dưỡng ẩm</td>
                                                    <td>22 Tháng 8, 2018</td>
                                                    <td>Đang chờ</td>
                                                    <td>$45</td>
                                                    <td><a href="cart.html" class="btn">Xem</a></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Katopeno Altuni</td>
                                                    <td>22 Tháng 7, 2018</td>
                                                    <td>Đã duyệt</td>
                                                    <td>$100</td>
                                                    <td><a href="cart.html" class="btn">Xem</a></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Murikhete Paris</td>
                                                    <td>12 Tháng 6, 2017</td>
                                                    <td>Tạm giữ</td>
                                                    <td>$99</td>
                                                    <td><a href="cart.html" class="btn">Xem</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Nội dung thẻ đơn lẻ Đơn hàng kết thúc -->

                            <!-- Nội dung thẻ đơn lẻ Tải xuống bắt đầu -->
                            <div class="tab-pane fade" id="download" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Tải xuống</h3>

                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Sản phẩm</th>
                                                    <th>Ngày</th>
                                                    <th>Hết hạn</th>
                                                    <th>Tải xuống</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>Dầu dưỡng ẩm</td>
                                                    <td>22 Tháng 8, 2018</td>
                                                    <td>Có</td>
                                                    <td><a href="#" class="btn">Tải xuống tập tin</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Katopeno Altuni</td>
                                                    <td>12 Tháng 9, 2018</td>
                                                    <td>Không bao giờ</td>
                                                    <td><a href="#" class="btn">Tải xuống tập tin</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Nội dung thẻ đơn lẻ Tải xuống kết thúc -->

                            <!-- Nội dung thẻ đơn lẻ Phương thức thanh toán bắt đầu -->
                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Phương thức thanh toán</h3>

                                    <p class="saved-message">Bạn chưa thể lưu Phương thức thanh toán của mình.</p>
                                </div>
                            </div>
                            <!-- Nội dung thẻ đơn lẻ Phương thức thanh toán kết thúc -->

                            <!-- Nội dung thẻ đơn lẻ Địa chỉ bắt đầu -->
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Địa chỉ thanh toán</h3>

                                    <address>
                                        <p><strong>Alex Tuntuni</strong></p>
                                        <p>1355 Market St, Suite 900 <br>
                                            San Francisco, CA 94103</p>
                                        <p>Điện thoại: (123) 456-7890</p>
                                    </address>

                                    <a href="#" class="btn d-inline-block edit-address-btn"><i
                                            class="fa fa-edit"></i>Chỉnh sửa địa chỉ</a>
                                </div>
                            </div>
                            <!-- Nội dung thẻ đơn lẻ Địa chỉ kết thúc -->

                            <!-- Nội dung thẻ đơn lẻ Chi tiết tài khoản bắt đầu -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Chi tiết tài khoản</h3>

                                    <div class="account-details-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="first-name" placeholder="Tên" type="text">
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="last-name" placeholder="Họ" type="text">
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="display-name" placeholder="Tên hiển thị" type="text">
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="email" placeholder="Địa chỉ Email" type="email">
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <h4>Thay đổi mật khẩu</h4>
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="current-pwd" placeholder="Mật khẩu hiện tại"
                                                        type="password">
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="new-pwd" placeholder="Mật khẩu mới" type="password">
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="confirm-pwd" placeholder="Xác nhận mật khẩu"
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