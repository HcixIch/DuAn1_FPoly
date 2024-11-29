<div class="cart-section section pt-30 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Bảng giỏ hàng -->
                <form id="cart-form">
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
                                <?php foreach ($_SESSION['cart'] as $id_cart => $ct): ?>
                                <tr data-product-id="<?= $id_cart ?>">
                                    <td class="pro-thumbnail">
                                        <a href="#"><img src="assets/images/product/<?= $ct['img_product'] ?>"
                                                alt="Sản phẩm"></a>
                                    </td>
                                    <td class="pro-title"><a href="#"><?= $ct['name_product'] ?></a></td>
                                    <td class="pro-price">
                                        <span><?= number_format($ct['price'], 0, ',', '.') ?>₫</span>
                                    </td>
                                    <td class="pro-quantity">
                                        <div class="pro-qty">
                                            <button class="qtybtn dec" type="button">-</button>
                                            <input class="qty-input" type="number" name="quantity[<?= $id_cart ?>]"
                                                min="1" value="<?= $ct['quantity_product'] ?>" />
                                            <button class="qtybtn inc" type="button">+</button>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal">
                                        <span><?= number_format($ct['subtotal'], 0, ',', '.') ?>₫</span>
                                    </td>
                                    <td class="pro-remove">
                                        <a href="?ctrl=cart&id_dl=<?= $ct['id_product'] ?>" class="remove-item"><i
                                                class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right">
                                        <h4 style="line-height: 45px;">Tổng cộng:</h4>
                                    </td>
                                    <td class="text-center">
                                        <h4 id="total-amount" style="line-height: 45px;">
                                            <?= number_format(array_sum(array_column($_SESSION['cart'], 'subtotal')), 0, ',', '.') ?>₫
                                        </h4>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Cập nhật và Thanh toán -->
                    <div class="d-flex justify-content-end mt-3">
                        <a href="index.php?ctrl=cart&&delall" class="btn btn-success cart-summary-button mr-3">Xóa giỏ
                            hàng</a>
                        <a href="index.php?ctrl=cart&&view=checkout" class="btn btn-success cart-summary-button">Tiếp
                            tục</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>