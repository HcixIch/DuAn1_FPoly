<!--Checkout section start-->
<div
    class="checkout-section section pt-30 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Checkout Form Start-->
                <form action="?ctrl=cart&view=checkout" method="post" id="checkout-form" class="checkout-form">
                    <div class="row row-40">

                        <div class="col-lg-7">

                            <!-- Billing Address -->
                            <div id="billing-form" class="mb-10">
                                <h4 class="checkout-title">Địa chỉ thanh toán</h4>
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-5">
                                        <label>Họ và tên*</label>
                                        <input type="text" name="fullname"
                                            value="<?= $_SESSION['user'][0]['full_name'] ?>">
                                    </div>
                                    <div class="col-md-12 col-12 mb-5">
                                        <label>Số điện thoại*</label>
                                        <input type="text" name="phone"
                                            value="<?= $_SESSION['user'][0]['phone_user'] ?>">
                                    </div>
                                    <div class="col-12 mb-5">
                                        <label>Địa chỉ*</label>
                                        <input type="text" name="address"
                                            value="<?= $_SESSION['user'][0]['address_user'] ?>">
                                    </div>
                                    <span class="mb-5 col-12 col-md-12">* Có thể thay đổi địa chỉ nhận hàng</span>
                                    <div class="col-12 mb-5">
                                        <div class="check-box">
                                            <input type="checkbox" id="shiping_address" data-shipping>
                                            <label for="shiping_address">Áp dụng mã giảm giá</label>
                                        </div>
                                        <p>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Shipping Address -->
                            <div id="shipping-form">
                                <h4 class="checkout-title">Mã giảm giá</h4>
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-5">
                                        <label>Mã giảm giá</label>
                                        <input type="text" id="voucher" name="voucher" placeholder="Nhập mã">
                                        <button type="button" id="apply-voucher" class="btn btn-primary">Áp
                                            dụng</button>
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
                                            <input type="radio" id="payment_momo" name="payment_method" value="momo">
                                            <label for="payment_momo">Thanh toán qua Momo</label>
                                        </div>
                                        <div class="single-method">
                                            <input type="radio" id="payment_bank" name="payment_method" value="bank">
                                            <label for="payment_bank">Thanh toán qua ngân hàng</label>
                                        </div>
                                        <div class="single-method">
                                            <input type="radio" id="payment_cod" name="payment_method" value="cod">
                                            <label for="payment_cod">Thanh toán khi nhận hàng</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="provisional"
                                        value="<?= array_sum(array_column($_SESSION['cart'], 'subtotal')) ?>">
                                    <input type="hidden" name="id_user" value="<?= $_SESSION['user'][0]['id_user'] ?>">
                                    <input type="hidden" name="emailsend"
                                        value="<?= $_SESSION['user'][0]['email_user'] ?>">
                                    <button type="submit" name="buynow" class="place-order btn btn-lg btn-round">Đặt
                                        hàng</button>
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