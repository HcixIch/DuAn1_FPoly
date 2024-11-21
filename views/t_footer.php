<footer class="footer-section section bg-dark">

    <!--Footer Top start-->
    <div class="footer-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-45 pb-lg-25 pb-md-15 pb-sm-5 pb-xs-0">
        <div class="container">
            <div class="row row-25">

                <!--Footer Widget start-->
                <div class="footer-widget col-lg-3 col-md-6 col-sm-6 col-12 mb-40 mb-xs-35">
                    <h4 class="title"><span class="text">Về TheFace</span></h4>
                    <p>Arsenal Store – nơi cung cấp quần áo chính hãng, chất lượng cao, thể hiện niềm đam mê và phong
                        cách của fan hâm mộ Arsenal.</p>
                    <div class="footer-social">
                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="google"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#" class="vimeo"><i class="fab fa-vimeo-v"></i></a>

                    </div>
                </div>
                <!--Footer Widget end-->


                <!--Footer Widget start-->
                <div class="footer-widget col-lg-3 col-md-6 col-sm-6 col-12 mb-40 mb-xs-35">
                    <h4 class="title"><span class="text">Thông tin</span></h4>
                    <ul class="ft-menu">
                        <li><a href="#">Hoàn trả</a></li>
                        <li><a href="#">Giao hàng</a></li>
                        <li><a href="#">Dịch vụ</a></li>
                        <li><a href="#">Thẻ quà tặng</a></li>
                        <li><a href="#">Di động</a></li>
                        <li><a href="#">Thẻ quà tặng</a></li>
                        <li><a href="#">Hủy thông báo</a></li>
                    </ul>
                </div>
                <!--Footer Widget end-->


                <!--Footer Widget start-->
                <div class="footer-widget col-lg-3 col-md-6 col-sm-6 col-12 mb-40 mb-xs-35">
                    <h4 class="title"><span class="text">Ưu đãi của chúng tôi</span></h4>
                    <ul class="ft-menu">
                        <li><a href="#">Sản phẩm mới</a></li>
                        <li><a href="#">Bán chạy nhất</a></li>
                        <li><a href="#">Ưu đãi đặc biệt</a></li>
                        <li><a href="#">Nhà sản xuất</a></li>
                        <li><a href="#">Nhà cung cấp</a></li>
                        <li><a href="#">Ưu đãi đặc biệt</a></li>
                        <li><a href="#">Dịch vụ</a></li>
                    </ul>
                </div>
                <!--Footer Widget end-->

                <!--Footer Widget start-->
                <div class="footer-widget col-lg-3 col-md-6 col-sm-6 col-12 mb-40 mb-xs-35">
                    <h4 class="title"><span class="text">Liên hệ với chúng tôi</span></h4>
                    <ul class="address">
                        <li><i class="fa fa-home"></i><span>HH2 BacHa building, Tohuu Street Hanoi, Vietnam</span></li>
                        <li><i class="fa fa-phone"></i><span><a href="#">(08) 123 456 7890</a></span></li>
                        <li><i class="fa fa-envelope-o"></i><span><a href="#">yourmail@domain.com</a></span></li>
                    </ul>
                    <div class="payment-box mt-15 mb-15">
                        <a href="#"><img src="./assets/images/payment.png" alt=""></a>
                    </div>
                </div>
                <!--Footer Widget end-->
            </div>
        </div>
    </div>
    <!--Footer Top end-->

    <!--Footer bottom start-->
    <div class="footer-bottom section">
        <div class="container ft-border pt-40 pb-40 pt-xs-20 pb-xs-20">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-8">
                    <div class="copyright text-left">
                        <p>Bản quyền &copy;2019 <a href="#">Theface</a>. Tất cả các quyền được bảo lưu.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4">
                    <div class="footer-logo text-right">
                        <a href="index.php"><img src="./assets/images/arsenallogo2.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Footer bottom end-->
</footer>
</div>

<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
<script>
    $(document).ready(function() {
        // Lắng nghe sự kiện thay đổi của dropdown "Sort By"
        $('#sort-by').change(function() {
            var sortBy = $(this).val(); // Lấy giá trị của lựa chọn
            var showCount = $('#show-count').val();
            var page = getUrlParameter('ql_page') || 1;
            var minPrice = getUrlParameter('min_price') || <?= $min_price ?>;
            var maxPrice = getUrlParameter('max_price') || <?= $max_price ?>;
            var category = getUrlParameter('id_cate') || '';

            // Gửi yêu cầu AJAX để lấy dữ liệu theo thứ tự sắp xếp
            $.ajax({
                url: './controllers/c_product.php', // URL hiện tại hoặc nơi bạn muốn gửi yêu cầu
                method: 'POST',
                data: {
                    ctrl: 'product',
                    ql_page: page,
                    min_price: minPrice,
                    max_price: maxPrice,
                    id_cate: category,
                    sort_by: sortBy, // Truyền giá trị sắp xếp vào
                    show_count: showCount
                },
                success: function(response) {
                    // Cập nhật lại các sản phẩm và phân trang
                    var productsHtml = $(response).find('.product-grid-view').html();
                    $('.product-grid-view').html(productsHtml);
                    var paginationHtml = $(response).find('.page-pagination').html();
                    $('.page-pagination').html(paginationHtml);
                }
            });
        });

        // Hàm lấy tham số từ URL (để duy trì phân trang và bộ lọc)
        function getUrlParameter(name) {
            var url = window.location.href;
            var results = new RegExp('[?&]' + name + '=([^&#]*)').exec(url);
            if (results == null) {
                return '';
            } else {
                return decodeURIComponent(results[1]) || '';
            }
        }
    });
</script>
</body>

</html>