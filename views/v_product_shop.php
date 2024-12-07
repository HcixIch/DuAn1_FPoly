<!-- Shop Section Start -->
<div class="shop-section section pt-30 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <!-- Single Sidebar Start -->
                <div class="common-sidebar-widget">
                    <h3 class="sidebar-title">Danh mục</h3>
                    <ul class="sidebar-list">
                        <li>
                            <a href="?ctrl=product">
                                <i class="fa fa-angle-right"></i>
                                Tất cả sản phẩm
                                <span class="count">(<?= count($pro_all) ?>)</span>
                            </a>
                        </li>
                        <?php foreach ($cate_all as $cate) {
                            extract($cate);
                            $i = 0;
                            // Call the countProductsByCategory function to get the count of products
                            $product_count = $prod->countProductsByCategory($id_category);
                        ?>
                            <li>
                                <a href="?ctrl=product&&id_cate=<?= $id_category ?>">
                                    <i class="fa fa-angle-right"></i>
                                    <?= $name_category ?>
                                    <span class="count">(<?= $product_count[0]['total_product'] ?>)</span>
                                </a>
                            </li>
                        <?php $i++;
                        } ?>
                    </ul>
                </div>
                <!-- Single Sidebar End -->

                <!-- Price Filter Sidebar -->
                <div class="common-sidebar-widget">
                    <h3 class="sidebar-title">Price</h3>
                    <ul class="sidebar-list">
                        <li>
                            <a href="#" class="d-block" data-bs-toggle="collapse" data-bs-target="#priceInput"
                                aria-expanded="false" aria-controls="priceInput">
                                <i class="fa fa-angle-right"></i>
                                <span class="price">
                                    <?= number_format($prod->getMinMaxPriceProduct("MIN")['min_price'], 0, ',', '.') ?>₫
                                </span> -
                                <span
                                    class="price"><?= number_format($prod->getMinMaxPriceProduct("MAX")['max_price'], 0, ',', '.') ?>₫</span>
                            </a>
                            <div class="collapse mt-2 <?= isset($_POST['search_price']) ? 'd-block' : '' ?>"
                                id="priceInput">
                                <form action="" method="post">
                                    <label for="min-price" class="form-label">Giá tối thiểu:</label>
                                    <input type="number" name="number_min" id="min-price" class="form-control mb-2"
                                        placeholder="Nhập giá tối thiểu"
                                        value="<?= isset($_POST['number_min']) ? $_POST['number_min'] : $prod->getMinMaxPriceProduct("MIN")['min_price'] ?>">
                                    <label for="max-price" class="form-label">Giá tối đa:</label>
                                    <input type="number" name="number_max" id="max-price" class="form-control mb-3"
                                        placeholder="Nhập giá tối đa"
                                        value="<?= isset($_POST['number_max']) ? $_POST['number_max'] : $prod->getMinMaxPriceProduct("MAX")['max_price'] ?>">
                                    <button type="submit" name="search_price" class="btn btn-primary w-100">Áp
                                        dụng</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Single Sidebar End -->
            </div>

            <!-- Product Display -->
            <div class="col-lg-9 order-lg-2 order-1">
                <div class="shop-product">
                    <div id="myTabContent-2" class="tab-content">
                        <div id="grid" class="tab-pane fade active show">
                            <div class="product-grid-view">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Grid & List View Start -->
                                        <div
                                            class="shop-topbar-wrapper d-md-flex justify-content-md-between align-items-center">
                                            <div class="grid-list-option">
                                            </div>
                                            <!--Toolbar Short Area Start-->
                                            <div class="toolbar-short-area d-md-flex align-items-center">
                                                <div class="toolbar-shorter ">
                                                    <label>Sort By:</label>
                                                    <select id="sort-by" class="form-select">
                                                        <option value="default" selected>Không có</option>
                                                        <option value="name-asc">Tên: A đến Z</option>
                                                        <option value="name-desc">Tên: Z đến A</option>
                                                        <option value="price-asc">Giá: Thấp đến Cao</option>
                                                        <option value="price-desc">Giá: Cao đến Thấp</option>
                                                    </select>

                                                </div>
                                                <div class="toolbar-shorter ">
                                                    <label>Show</label>
                                                    <select id="show-count" class="form-select">
                                                        <option value="9" selected>9</option>
                                                        <option value="15">15</option>
                                                        <option value="30">30</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <!--Toolbar Short Area End-->
                                        </div>
                                        <!-- Grid & List View End -->
                                    </div>
                                </div>
                                <div class="row">
                                    <?php if (!empty($list_page_product)) { ?>
                                        <?php foreach ($list_page_product as $pd) {
                                            extract($pd); ?>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <!-- Single Product Start -->
                                                <div class="single-product mb-30">
                                                    <div class="product-img">
                                                        <a href="?ctrl=product&view=detail&id=<?= $id_product ?>">
                                                            <img src="./assets/images/product/<?= $img_product ?>"
                                                                alt="<?= $name_product ?>">
                                                        </a>
                                                        <?php if ($sale > 0) { ?>
                                                            <span class="descount-sticker">-<?= $sale ?>%</span>
                                                        <?php } ?>
                                                        <?php if ($hot == 1) { ?>
                                                            <span class="sticker">Mới</span>
                                                        <?php } ?>
                                                        <div class="product-action d-flex justify-content-between">
                                                            <a class="product-btn"
                                                                href="?ctrl=product&&id_addcart=<?= $id_product ?>">Đặt hàng</a>
                                                            <ul class="d-flex">
                                                                <li><a href="?ctrl=product&&view=detail&&id=<?= $id_product ?>"
                                                                        title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                                <li><a href="#" title="Yêu thích"><i
                                                                            class="fa fa-heart-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3><a
                                                                href="?ctrl=product&view=detail&id=<?= $id_product ?>"><?= $name_product ?></a>
                                                        </h3>
                                                        <h4 class="price">
                                                            <span
                                                                class="new"><?= number_format($price_product, 0, ',', '.') ?>₫</span>
                                                            <?php if ($sale > 0) { ?>
                                                                <del
                                                                    class="old"><?= number_format($price_product * (100 + $sale) / 100, 0, ',', '.') ?>₫</del>
                                                            <?php } ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <!-- Single Product End -->
                                            </div>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <div class="prod-null text-center">
                                            <i class="fa-solid fa-face-frown" style="font-size: 40px; color: #f00;"></i>
                                            <p>Không có sản phẩm phù hợp với tiêu chí bạn tìm</p>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <!-- Pagination -->
                <div class="row mb-30 mb-sm-40 mb-xs-30">
                    <div class="col">
                        <ul class="page-pagination">
                            <!-- Previous Page Button -->
                            <li>
                                <a href="?ctrl=product&ql_page=<?= $ql_page - 1 ?>&min_price=<?= $min_price ?>&max_price=<?= $max_price ?><?= isset($_GET['id_cate']) ? '&id_cate=' . $_GET['id_cate'] : '' ?>"
                                    class="<?= ($ql_page <= 1) ? 'disabled-link' : '' ?>">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>

                            <!-- Page Numbers -->
                            <?php for ($i = 1; $i <= $quantity_page; $i++) { ?>
                                <li class="<?= ($i == $ql_page) ? 'active' : '' ?>">
                                    <a
                                        href="?ctrl=product&ql_page=<?= $i ?>&min_price=<?= $min_price ?>&max_price=<?= $max_price ?><?= isset($_GET['id_cate']) ? '&id_cate=' . $_GET['id_cate'] : '' ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php } ?>

                            <!-- Next Page Button -->
                            <li>
                                <a href="?ctrl=product&ql_page=<?= $ql_page + 1 ?>&min_price=<?= $min_price ?>&max_price=<?= $max_price ?><?= isset($_GET['id_cate']) ? '&id_cate=' . $_GET['id_cate'] : '' ?>"
                                    class="<?= ($ql_page >= $quantity_page) ? 'disabled-link' : '' ?>">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Shop Section End -->