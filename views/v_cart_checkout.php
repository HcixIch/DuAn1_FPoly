<!--Checkout section start-->
<?php var_dump($_SESSION['user']); ?>
<div
    class="checkout-section section pt-30 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Checkout Form Start-->
                <form action="#" class="checkout-form">
                    <div class="row row-40">

                        <div class="col-lg-7">

                            <!-- Billing Address -->
                            <div id="billing-form" class="mb-10">
                                <h4 class="checkout-title">Địa chỉ thanh toán</h4>
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-5">
                                        <label>Họ và tên*</label>
                                        <input type="text" value="<?= $_SESSION['user'][0]['full_name'] ?>" disabled>
                                    </div>
                                    <div class="col-md-12 col-12 mb-5">
                                        <label>Địa chỉ Email*</label>
                                        <input type="email" value="<?= $_SESSION['user'][0]['email_user'] ?>" disabled>
                                    </div>
                                    <div class="col-md-12 col-12 mb-5">
                                        <label>Số điện thoại*</label>
                                        <input type="text" value="<?= $_SESSION['user'][0]['phone_user'] ?>" disabled>
                                    </div>
                                    <div class="col-12 mb-5">
                                        <label>Địa chỉ*</label>
                                        <input type="text" value="<?= $_SESSION['user'][0]['address_user'] ?>" disabled>
                                    </div>
                                    <div class="col-12 mb-5">
                                        <div class="check-box">
                                            <input type="checkbox" id="shiping_address" data-shipping>
                                            <label for="shiping_address">Giao đến địa chỉ khác</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Shipping Address -->
                            <div id="shipping-form">
                                <h4 class="checkout-title">Địa chỉ giao hàng</h4>
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-5">
                                        <label>Họ và tên*</label>
                                        <input type="text" placeholder="Nhập họ và tên">
                                    </div>
                                    <div class="col-md-12 col-12 mb-5">
                                        <label>Số điện thoại*</label>
                                        <input type="text" placeholder="Nhập số điện thoại">
                                    </div>
                                    <div class="col-12 mb-5">
                                        <label>Địa chỉ*</label>
                                        <input type="text" placeholder="Nhập địa chỉ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="row">

                                <!-- Cart Total -->
                                <div class="col-12 mb-60">
                                    <h4 class="checkout-title">Tổng giỏ hàng</h4>
                                    <div class="checkout-cart-total">
                                        <h4>Sản phẩm <span>Tổng</span></h4>
                                        <ul>
                                            <?php foreach ($_SESSION['cart'] as $ct) { ?>
                                                <li>
                                                    <p id="nico"><?= $ct['name_product'] ?></p> X
                                                    <?= $ct['quantity_product'] ?>
                                                    <span><?= number_format($ct['subtotal'], 0, ',', '.') ?> ₫</span>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <p>Tổng phụ
                                            <span><?= number_format(array_sum(array_column($_SESSION['cart'], 'subtotal')), 0, ',', '.') ?>₫</span>
                                        </p>
                                        <p>Phí vận chuyển <span><?= number_format(30000, 0, ',', '.') ?> ₫</span></p>
                                        <h4>Tổng cộng
                                            <span><?= number_format(array_sum(array_column($_SESSION['cart'], 'subtotal')) + 30000, 0, ',', '.') ?>₫</span>
                                        </h4>
                                    </div>
                                </div>

                                <!-- Payment Method -->
                                <div class="col-12 mb-30">
                                    <h4 class="checkout-title">Phương thức thanh toán</h4>
                                    <div class="checkout-payment-method">
                                        <div class="single-method">
                                            <input type="radio" id="payment_check" name="payment-method" value="check">
                                            <label for="payment_check">Thanh toán bằng séc</label>
                                            <p data-method="check">Vui lòng gửi séc đến Tên cửa hàng, Địa chỉ cửa hàng,
                                                Thành phố cửa hàng, Bang cửa hàng, Mã bưu điện cửa hàng, Quốc gia cửa
                                                hàng.</p>
                                        </div>
                                        <div class="single-method">
                                            <input type="radio" id="payment_bank" name="payment-method" value="bank">
                                            <label for="payment_bank">Chuyển khoản ngân hàng trực tiếp</label>
                                            <p data-method="bank">Vui lòng gửi séc đến Tên cửa hàng, Địa chỉ cửa hàng,
                                                Thành phố cửa hàng, Bang cửa hàng, Mã bưu điện cửa hàng, Quốc gia cửa
                                                hàng.</p>
                                        </div>
                                        <div class="single-method">
                                            <input type="radio" id="payment_cash" name="payment-method" value="cash">
                                            <label for="payment_cash">Thanh toán khi giao hàng</label>
                                            <p data-method="cash">Vui lòng gửi séc đến Tên cửa hàng, Địa chỉ cửa hàng,
                                                Thành phố cửa hàng, Bang cửa hàng, Mã bưu điện cửa hàng, Quốc gia cửa
                                                hàng.</p>
                                        </div>
                                        <div class="single-method">
                                            <input type="radio" id="payment_paypal" name="payment-method"
                                                value="paypal">
                                            <label for="payment_paypal">Thanh toán qua Paypal</label>
                                            <p data-method="paypal">Vui lòng gửi séc đến Tên cửa hàng, Địa chỉ cửa hàng,
                                                Thành phố cửa hàng, Bang cửa hàng, Mã bưu điện cửa hàng, Quốc gia cửa
                                                hàng.</p>
                                        </div>
                                        <div class="single-method">
                                            <input type="radio" id="payment_payoneer" name="payment-method"
                                                value="payoneer">
                                            <label for="payment_payoneer">Thanh toán qua Payoneer</label>
                                            <p data-method="payoneer">Vui lòng gửi séc đến Tên cửa hàng, Địa chỉ cửa
                                                hàng, Thành phố cửa hàng, Bang cửa hàng, Mã bưu điện cửa hàng, Quốc gia
                                                cửa hàng.</p>
                                        </div>
                                        <div class="single-method">
                                            <input type="checkbox" id="accept_terms">
                                            <label for="accept_terms">Tôi đã đọc và chấp nhận các điều khoản & điều
                                                kiện</label>
                                        </div>
                                    </div>
                                    <button class="place-order btn btn-lg btn-round">Đặt hàng</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!--Checkout section end-->