<!-- Shop Section Start -->
<div class="shop-section section pt-30 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <!-- Single Sidebar Start  -->
                <div class="common-sidebar-widget">
                    <h3 class="sidebar-title">Danh mục</h3>
                    <ul class="sidebar-list">
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
                <!-- Single Sidebar End  -->
                <!-- Single Sidebar Start  -->
                <div class="common-sidebar-widget">
                    <h3 class="sidebar-title">Price</h3>
                    <ul class="sidebar-list">
                        <li>
                            <!-- Liên kết kích hoạt collapse -->
                            <a href="#" class="d-block" data-bs-toggle="collapse" data-bs-target="#priceInput"
                                aria-expanded="false" aria-controls="priceInput">
                                <i class="fa fa-angle-right"></i>
                                <span class="price">
                                    <?php
                                    $minmax = $prod->getMinMaxPriceProduct("MIN");
                                    echo number_format($minmax['min_price'], 0, ',', '.'); ?>₫
                                </span> -
                                <span class="price"><?= number_format($minmax['max_price'], 0, ',', '.') ?>₫</span>
                            </a>

                            <!-- Nội dung collapse -->
                            <div class="collapse mt-2" id="priceInput">
                                <form action="?ctrl=product&&minmax=search" method="post">
                                    <label for="min-price" class="form-label">Giá tối thiểu:</label>
                                    <input type="number" name="number_min" id="min-price" class="form-control mb-2"
                                        placeholder="Nhập giá tối thiểu">
                                    <label for="max-price" class="form-label">Giá tối đa:</label>
                                    <input type="number" name="number_max" id="max-price" class="form-control mb-3"
                                        placeholder="Nhập giá tối đa">
                                    <button type="submit" name="search_price" class="btn btn-primary w-100">Áp
                                        dụng</button>
                                </form>
                            </div>
                        </li>


                        <li><a href="#"><i class="fa fa-angle-right"></i><span class="price">€100.00</span> and
                                above <span class="count">(14)</span></a></li>
                    </ul>
                </div>
                <!-- Single Sidebar End  -->
                <!-- Single Sidebar Start  -->
                <div class="common-sidebar-widget">
                    <div class="single-banner">
                        <a href="#">
                            <img src="assets/images/banner/h4-banner-2.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- Single Sidebar End  -->
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
                <!-- <div class="row">
                            <div class="col-12">
                                <div class="shop-banner mb-35 mb-xs-20">
                                    <img src="./assets/images/banner/category-image.webp" alt="">
                                </div>
                                <div class="shop-banner-title">
                                    <h2>Shop</h2>
                                </div>
                            </div>
                        </div> -->
                <div class="row">
                    <div class="col-12">
                        <!-- Grid & List View Start -->
                        <div class="shop-topbar-wrapper d-md-flex justify-content-md-between align-items-center">
                            <div class="grid-list-option">
                                <!-- <ul class="nav">
                                            <li>
                                                <a class="active show" data-toggle="tab" href="#grid"><i
                                                        class="fa fa-th"></i></a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#list" class=""><i
                                                        class="fa fa-th-list"></i></a>
                                            </li>
                                        </ul> -->
                            </div>
                            <!--Toolbar Short Area Start-->
                            <div class="toolbar-short-area d-md-flex align-items-center">
                                <div class="toolbar-shorter ">
                                    <label>Sort By:</label>
                                    <select class="wide">
                                        <option data-display="Select">Nothing</option>
                                        <option value="Relevance">Relevance</option>
                                        <option value="Name, A to Z">Name, A to Z</option>
                                        <option value="Name, Z to A">Name, Z to A</option>
                                        <option value="Price, low to high">Price, low to high</option>
                                        <option value="Price, high to low">Price, high to low</option>
                                    </select>
                                </div>
                                <div class="toolbar-shorter ">
                                    <label>Show</label>
                                    <select class="small">
                                        <option data-display="Select">9</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                    </select>
                                    <span>per page</span>
                                </div>

                            </div>
                            <!--Toolbar Short Area End-->
                        </div>
                        <!-- Grid & List View End -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="shop-product">
                            <div id="myTabContent-2" class="tab-content">
                                <div id="grid" class="tab-pane fade active show">
                                    <div class="product-grid-view">
                                        <div class="row">
                                            <?php foreach ($list_page_product as $pd) {
                                                extract($pd); ?>
                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <!-- Single Product Start -->
                                                    <div class="single-product mb-30">
                                                        <div class="product-img">
                                                            <a href="?ctrl=product&&view=detail&&id=<?= $id_product ?>">
                                                                <img src="./assets/images/product/<?= $img_product ?>"
                                                                    alt="">
                                                            </a>
                                                            <?php if ($sale > 0) { ?>
                                                                <span class="descount-sticker">-<?= $sale ?>%</span>
                                                            <?php } ?>
                                                            <?php if ($hot == 1) { ?>
                                                                <span class="sticker">Mới</span>
                                                            <?php } ?>
                                                            <div class="product-action d-flex justify-content-between">
                                                                <a class="product-btn" href="#">Đặt hàng</a>
                                                                <ul class="d-flex">
                                                                    <li><a href="#quick-view-modal-container"
                                                                            data-toggle="modal" title="Quick View"><i
                                                                                class="fa fa-eye"></i></a></li>
                                                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3><a
                                                                    href="?ctrl=product&&view=detail&&id=<?= $id_product ?>?>"><?= $name_product ?></a>
                                                            </h3>
                                                            <h4 class=" price"><span
                                                                    class="new"><?= number_format($price_product, 0, ',', '.') ?>₫</span>
                                                                <?php if ($sale > 0) { ?>
                                                                    <del class="text-decoration-line-through"><span
                                                                            class="old"><?= number_format($price_product * ($sale + 100) / 100, 0, ',', '.') ?>₫</span></del>
                                                                <?php } ?>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <!-- Single Product End -->
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-30 mb-sm-40 mb-xs-30">
                    <div class="col">
                        <ul class="page-pagination">
                            <!-- Previous Button -->
                            <li>
                                <?php if ($ql_page > 1) { ?>
                                    <a href="?ctrl=product&&ql_page=<?= $ql_page - 1 ?>"><i
                                            class="fa fa-angle-left"></i></a>
                                <?php } else { ?>
                                    <a href="javascript:void(0);" class="disabled"><i class="fa fa-angle-left"></i></a>
                                <?php } ?>
                            </li>

                            <!-- Calculate Total Pages -->
                            <?php
                            $quantity_page = ceil($count_product / 9); // Round up to ensure all products are covered
                            ?>

                            <!-- Page Numbers -->
                            <?php for ($i = 1; $i <= $quantity_page; $i++) {
                                $link = "?";
                                foreach ($_GET as $key => $val) {
                                    if ($key != 'ql_page') {
                                        $link .= $key . "=" . $val . "&";
                                    }
                                }
                                $link .= "ql_page=" . $i;
                            ?>
                                <li class="<?= ($i == $ql_page) ? 'active' : '' ?>">
                                    <a class="page-link <?= ($i == $ql_page) ? 'bg-dark text-white' : '' ?>"
                                        href="<?= $link ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php } ?>

                            <!-- Next Button -->
                            <li>
                                <?php if ($ql_page < $quantity_page) { ?>
                                    <a href="?ctrl=product&&ql_page=<?= $ql_page + 1 ?>"><i
                                            class="fa fa-angle-right"></i></a>
                                <?php } else { ?>
                                    <a href="javascript:void(0);" class="disabled"><i class="fa fa-angle-right"></i></a>
                                <?php } ?>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Section End -->