<div class="cart-section section pt-30 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Bảng giỏ hàng -->
                <form action="?ctrl=cart" method="POST">
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
                                <?php foreach ($cart_all as $ct): ?>
                                    <tr data-id="<?= $ct['id_cart'] ?>">
                                        <td class="pro-thumbnail">
                                            <a href="#"><img src="assets/images/product/<?= $ct['img_product'] ?>"
                                                    alt="Sản phẩm"></a>
                                        </td>
                                        <td class="pro-title"><a href="#"><?= $ct['name_product'] ?></a></td>
                                        <td class="pro-price">
                                            <span><?= number_format($ct['price_product'], 0, ',', '.') ?>₫</span>
                                        </td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty">
                                                <input type="number" name="quantity[<?= $ct['id_cart'] ?>]"
                                                    class="quantity-input" min="1" value="<?= $ct['quantity'] ?>">
                                            </div>
                                        </td>
                                        <td class="pro-subtotal">
                                            <span><?= number_format($ct['subtotal'], 0, ',', '.') ?>₫</span>
                                        </td>
                                        <td class="pro-remove">
                                            <a href="remove_item.php?id_cart=<?= $ct['id_cart'] ?>" class="remove-item"><i
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
                                            <?= number_format(array_sum(array_column($cart_all, 'subtotal')), 0, ',', '.') ?>₫
                                        </h4>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Cập nhật và Thanh toán -->
                    <div class="d-flex justify-content-end mt-3">
                        <a href="checkout.php" class="btn btn-success cart-summary-button">Thanh toán</a>
                    </div>
                </form>
                <span class="mt-2 text-end">*Vui lòng kiểm tra cập nhật lại giỏ hàng trước khi thanh toán</span>
            </div>
        </div>
    </div>
</div>