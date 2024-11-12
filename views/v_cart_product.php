<!--Phần giỏ hàng bắt đầu-->
<div class="cart-section section pt-30 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <!-- Bảng giỏ hàng -->
                <div class="cart-table table-responsive mb-30">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Hình ảnh</th>
                                <th class="pro-title">Sản phẩm</th>
                                <th class="pro-price">Giá</th>
                                <th class="pro-quantity">Số lượng</th>
                                <th class="pro-subtotal">Tổng</th>
                                <th class="pro-remove">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Danh sách sản phẩm ở đây -->
                            <?php foreach ($cart_all as $ct) {
                                extract($ct);
                                $subtitle = $quanlity * $price_product ?>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img
                                                src="assets/images/product/<?= $img_product ?>" alt="Sản phẩm"></a></td>
                                    <td class="pro-title"><a href="#"><?= $name_product ?></a></td>
                                    <td class="pro-price"><span><?= number_format($price_product, 0, ',', '.') ?>₫</span>
                                    </td>
                                    <td class="pro-quantity">
                                        <div class="pro-qty"><input type="number" min="1" value="<?= $quanlity ?>">
                                        </div>
                                    </td>
                                    <td class="pro-subtotal">
                                        <span><?= number_format($subtitle, 0, ',', '.') ?>₫</span>
                                    </td>
                                    <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                            <?php
                            };
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right">
                                    <h4 style="line-height: 45px;">Tổng cộng:</h4>
                                </td>
                                <td class="text-center">
                                    <h4 style="line-height: 45px;">$200.000</h4>
                                </td>
                                <td class="text-center">
                                    <div class="cart-summary-button">
                                        <a style="color: #fff;" class="btn" href="?ctrl=cart&&view=checkout">Thanh
                                            toán</a>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>


            </div>

        </div>
    </div>
</div>
<!--Phần giỏ hàng kết thúc-->