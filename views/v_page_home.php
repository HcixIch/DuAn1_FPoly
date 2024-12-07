<!--Product section start-->
<div class="product-section section pt-70 pt-lg-45 pt-md-40 pt-sm-30 pt-xs-15">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product-tab-menu mb-40 mb-xs-20">
                    <ul class="nav">
                        <li><a class="active" data-toggle="tab" href="#products"> Sản Phẩm mới</a></li>
                        <li><a data-toggle="tab" href="#onsale"> Đang giảm giá</a></li>
                        <li><a data-toggle="tab" href="#hots"> Sản phẩm bán chạy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="products">
                        <div class="row tf-element-carousel" data-slick-options='{
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "rows": 2,
                                "arrows": true,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }' data-slick-responsive='[
                                {"breakpoint":1199, "settings": {
                                "slidesToShow": 3
                                }},
                                {"breakpoint":992, "settings": {
                                "slidesToShow": 2
                                }},
                                {"breakpoint":768, "settings": {
                                "slidesToShow": 2,
                                "arrows": false,
                                "autoplay": true
                                }},
                                {"breakpoint":576, "settings": {
                                "slidesToShow": 1,
                                "arrows": false,
                                "autoplay": true
                                }}
                                ]'>
                            <?php foreach ($pro_new as $pd) {
                                extract($pd); ?>
                                <div class="col-12">
                                    <!-- Single Product Start -->
                                    <div class="single-product mb-30">
                                        <div class="product-img">
                                            <a href="?ctrl=product&&view=detail&&id=<?= $id_product ?>">
                                                <img src="./assets/images/product/<?= $img_product ?>" alt="">
                                            </a>
                                            <?php if ($sale > 0) { ?>
                                                <span class="descount-sticker">-<?= $sale ?>%</span>
                                            <?php } ?>
                                            <?php if ($hot == 1) { ?>
                                                <span class="sticker">Mới</span>
                                            <?php } ?>
                                            <div class="product-action d-flex justify-content-between">
                                                <a class="product-btn" href="?id_addcart=<?= $id_product ?>">Đặt
                                                    hàng</a>
                                                <ul class="d-flex">
                                                    <li><a href="?ctrl=product&&view=detail&&id=<?= $id_product ?>"
                                                            title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3><a
                                                    href="?ctrl=product&&view=detail&&id=<?= $id_product ?>"><?= $name_product ?></a>
                                            </h3>
                                            <h4 class="price"><span
                                                    class="new"><?= number_format($price_product, 0, ',', '.') ?>₫</span>
                                                <?php if ($sale == 1) { ?>
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
                    <div class="tab-pane fade" id="onsale">
                        <div class="row tf-element-carousel" data-slick-options='{
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "rows": 2,
                                "arrows": true,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }' data-slick-responsive='[
                                {"breakpoint":1199, "settings": {
                                "slidesToShow": 3
                                }},
                                {"breakpoint":992, "settings": {
                                "slidesToShow": 2
                                }},
                                {"breakpoint":768, "settings": {
                                "slidesToShow": 2,
                                "arrows": false,
                                "autoplay": true
                                }},
                                {"breakpoint":576, "settings": {
                                "slidesToShow": 1,
                                "arrows": false,
                                "autoplay": true
                                }}
                                ]'>
                            <?php foreach ($pro_sale as $pd) {
                                extract($pd); ?>
                                <div class="col-12">
                                    <!-- Single Product Start -->
                                    <div class="single-product mb-30">
                                        <div class="product-img">
                                            <a href="?ctrl=product&&view=detail&&id=<?= $id_product ?>">
                                                <img src="./assets/images/product/<?= $img_product ?>" alt="">
                                            </a>
                                            <?php if ($sale > 0) { ?>
                                                <span class="descount-sticker">-<?= $sale ?>%</span>
                                            <?php } ?>
                                            <?php if ($hot == 1) { ?>
                                                <span class="sticker">Mới</span>
                                            <?php } ?>
                                            <div class="product-action d-flex justify-content-between">
                                                <a class="product-btn" href="?id_addcart=<?= $id_product ?>">Đặt
                                                    hàng</a>
                                                <ul class="d-flex">
                                                    <li><a href="?ctrl=product&&view=detail&&id=<?= $id_product ?>"
                                                            title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3><a
                                                    href="?ctrl=product&&view=detail&&id=<?= $id_product ?>"><?= $name_product ?></a>
                                            </h3>
                                            <h4 class="price"><span
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
                    <div class="tab-pane fade" id="hots">
                        <div class="row tf-element-carousel" data-slick-options='{
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "rows": 2,
                                "arrows": true,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }' data-slick-responsive='[
                                {"breakpoint":1199, "settings": {
                                "slidesToShow": 3
                                }},
                                {"breakpoint":992, "settings": {
                                "slidesToShow": 2
                                }},
                                {"breakpoint":768, "settings": {
                                "slidesToShow": 2,
                                "arrows": false,
                                "autoplay": true
                                }},
                                {"breakpoint":576, "settings": {
                                "slidesToShow": 1,
                                "arrows": false,
                                "autoplay": true
                                }}
                                ]'>
                            <?php foreach ($pro_hot as $pd) {
                                extract($pd); ?>
                                <div class="col-12">
                                    <!-- Single Product Start -->
                                    <div class="single-product mb-30">
                                        <div class="product-img">
                                            <a href="?ctrl=product&&view=detail&&id=<?= $id_product ?>">
                                                <img src="./assets/images/product/<?= $img_product ?>" alt="">
                                            </a>
                                            <?php if ($sale > 0) { ?>
                                                <span class="descount-sticker">-10%</span>
                                            <?php } ?>
                                            <?php if ($hot == 1) { ?>
                                                <span class="sticker">Mới</span>
                                            <?php } ?>
                                            <div class="product-action d-flex justify-content-between">
                                                <a class="product-btn" href="?id_addcart=<?= $id_product ?>">Đặt
                                                    hàng</a>
                                                <ul class="d-flex">
                                                    <li><a href="?ctrl=product&&view=detail&&id=<?= $id_product ?>"
                                                            title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3><a
                                                    href="?ctrl=product&&view=detail&&id=<?= $id_product ?>"><?= $name_product ?></a>
                                            </h3>
                                            <h4 class="price"><span
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
<!--Product section end-->

<!--Banner section start-->
<div class="banner-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
    <div class="container">
        <div class="row row-">
            <div class="col-lg-4 col-md-4">
                <!-- Single Banner Start -->
                <div class="single-banner mb-30">
                    <a href="#">
                        <img src="assets/images/banner/men-banner.png" alt="">
                    </a>
                </div>
                <!-- Single Banner End -->
            </div>
            <div class="col-lg-4 col-md-4">
                <!-- Single Banner Start -->
                <div class="single-banner mb-30">
                    <a href="#">
                        <img src="assets/images/banner/women-banner.png" alt="">
                    </a>
                </div>
                <!-- Single Banner End -->
            </div>
            <div class="col-lg-4 col-md-4">
                <!-- Single Banner Start -->
                <div class="single-banner mb-30">
                    <a href="#">
                        <img src="assets/images/banner/legend-banner.png" alt="">
                    </a>
                </div>
                <!-- Single Banner End -->
            </div>
        </div>
    </div>
</div>
<!--Banner section end-->
<!--Product category start-->
<!-- <div class="product-category section">
    <div class="container">
        <div class="row-md-4 row-lg-4 row-sm-12">
            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>
            <br>
            <div class="row">
                <div class="col col-sm-4 text-center">
                    <h2>Áo Arsenal</h2>
                </div>
                <div class="col col-sm-4 text-center">
                    <h2>Quần Arsenal</h2>
                </div>
                <div class="col col-sm-4 text-center">
                    <h2>Áo Khoác Arsenal</h2>
                </div>
            </div>
            <div class="row text">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <!-- Single Product Start -->
<!-- <?php
        $pro_cates = $prod->getProductsByCategory(1, 2);
        foreach ($pro_cates as $prod) {
            extract($prod); ?>
                        <div class="single-product-category mb-30">
                            <div class="product-category-img">
                                <a href="?ctrl=product&&view=detail&&id=<?= $id_product ?>">
                                    <img src="assets/images/product/<?= $img_product ?>" alt="">
                                </a>
                            </div>
                            <div class="product-category-content">
                                <h3><a href="?ctrl=product&&view=detail&&id=<?= $id_product ?>"><?= $name_product ?></a></h3>
                                <h4 class="price"><span class="new"><?= $price_product ?></span></h4>
                                <div class="buynow">
                                    <a class="product-category-btn" href="#">Đặt hàng</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div> --> -->



<!-- Feature Section Start -->
<div class="feature-section section pt-100 pt-md-75 pt-sm-60 pt-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <!-- Single Faeture Start -->
                <div class="single-feature feature-style-2 mb-30">
                    <div class="icon">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="content">
                        <h2>Được khách hàng đánh giá 4.9/5<br>(6,200+ người xem)</h2>
                    </div>
                </div>
                <!-- Single Faeture End -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <!-- Single Faeture Start -->
                <div class="single-feature feature-style-2 mb-30">
                    <div class="icon">
                        <i class="fa-solid fa-box"></i>
                    </div>
                    <div class="content">
                        <h2>Mua trực tiếp và hỗ trợ CLB của bạn<br>(Arsenal team)</h2>
                    </div>
                </div>
                <!-- Single Faeture End -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <!-- Single Faeture Start -->
                <div class="single-feature feature-style-2 mb-30 br-0">
                    <div class="icon">
                        <i class="fa-solid fa-percent"></i>
                    </div>
                    <div class="content">
                        <h2>Thành viên được giảm 10%<br>tiết kiệm cho bạn</h2>
                    </div>
                </div>
                <!-- Single Faeture End -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- Feature Section End -->
<!-- Feature Section End -->