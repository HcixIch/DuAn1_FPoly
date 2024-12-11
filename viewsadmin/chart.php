<div class="main">
    <!-- NỘI DUNG CHÍNH -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- TỔNG QUAN -->
            <div class="panel panel-headline">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                                <p>
                                    <span class="number"><?= count($checkoutall) ?></span>
                                    <span class="title">Đơn hàng</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa-solid fa-coins"></i></span>
                                <p>
                                    <span
                                        class="number"><?= number_format(array_sum(array_column($checkoutall, 'total_all')), 0, ',', '.') ?></span>
                                    <span class="title">VNĐ</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa-solid fa-users"></i></span>
                                <p>
                                    <span class="number"><?= count($user->getAllUser()) ?></span>
                                    <span class="title">Người dùng</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa-solid fa-comments"></i></span>
                                <p>
                                    <span class="number">35%</span>
                                    <span class="title">Chuyển đổi</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div id="headline-chart" class="ct-chart">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="weekly-summary text-right">
                                <span class="number">2,315</span> <span class="percentage"><i
                                        class="fa fa-caret-up text-success"></i> 12%</span>
                                <span class="info-label">Tổng doanh số</span>
                            </div>
                            <div class="weekly-summary text-right">
                                <span class="number">$5,758</span> <span class="percentage"><i
                                        class="fa fa-caret-up text-success"></i> 23%</span>
                                <span class="info-label">Thu nhập tháng</span>
                            </div>
                            <div class="weekly-summary text-right">
                                <span class="number">$65,938</span> <span class="percentage"><i
                                        class="fa fa-caret-down text-danger"></i> 8%</span>
                                <span class="info-label">Tổng thu nhập</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- KẾT THÚC TỔNG QUAN -->
            <div class="row">
                <div class="col-md-6">
                    <!-- MUA HÀNG GẦN ĐÂY -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Mua Hàng Gần Đây</h3>
                        </div>
                        <div class="panel-body no-padding" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Đơn hàng</th>
                                        <th>Họ tên</th>
                                        <th>Tổng tiền</th>
                                        <th>Ngày &amp; Giờ</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($order_list as $od) { ?>
                                        <tr>
                                            <td><a href="#"><?= $od['id_order'] ?></a></td>
                                            <td><?= $od['full_name'] ?></td>
                                            <td><?= $od['price'] ?></td>
                                            <td><?= $od['date_order'] ?></td>
                                            <td>
                                                <?php if ($od['status'] == 0) { ?>
                                                    <span class="badge badge-danger">Chưa xử lý</span>
                                                <?php } elseif ($od['status'] == 1) { ?>
                                                    <span class="badge badge-warning">Đang xử lý</span>
                                                <?php } elseif ($od['status'] == 2) { ?>
                                                    <span class="badge badge-success">Đã giao hàng</span>
                                                <?php } elseif ($od['status'] == 3) { ?>
                                                    <span class="badge badge-info">Đã hủy</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i>24 giờ
                                        qua</span></div>
                                <div class="col-md-6 text-right"><a href="?ctrl=admin&view=order"
                                        class="btn btn-primary">Xem Tất Cả Đơn Hàng</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- KẾT THÚC MUA HÀNG GẦN ĐÂY -->
                </div>
                <div class="col-md-6">
                    <!-- BIỂU ĐỒ NHIỀU CHI TIẾT -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">5 Sản Phẩm Được Yêu Thích Nhất</h3>
                        </div>
                        <?php foreach ($topwishlist as $wishlist) {
                            $count = $wish->countWishlist($wishlist['id_product']); ?>
                            <div class="panel-body">
                                <div class="media">
                                    <div class="media-left">
                                        <img class="media-object"
                                            src="assets/images/product/<?= $wishlist['img_product'] ?>" alt="Product Image"
                                            style="width: 100px">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading" style="font-size:15px"><?= $wishlist['name_product'] ?>
                                        </h4>
                                        <p>Số lượt yêu thích: <?= $count[0]['count'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- KẾT THÚC BIỂU ĐỒ NHIỀU CHI TIẾT -->
                    </div>
                </div>
            </div>

        </div>


        <script>
            // Lấy ngữ cảnh từ canvas để vẽ biểu đồ
            var ctx = document.getElementById('myChart').getContext('2d');
            // Tạo dữ liệu cho biểu đồ
            var chart = new Chart(ctx, {
                type: 'bar', // Loại biểu đồ (line, bar, etc.)
                data: {
                    labels: <?php echo json_encode($labels); ?>, // Các ngày trong tuần
                    datasets: [{
                        label: 'Total Sales', // Tên dữ liệu
                        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Màu nền cho đồ thị
                        borderColor: 'rgba(54, 162, 235, 1)', // Màu viền cho đồ thị
                        data: <?php echo json_encode($data); ?>, // Dữ liệu các giá trị
                        fill: true, // Làm đồ thị có nền
                    }]
                },
                options: {
                    responsive: true, // Biểu đồ sẽ thay đổi kích thước khi thay đổi kích thước màn hình
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>