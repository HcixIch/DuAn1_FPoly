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
                        <div class="panel-body no-padding">
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
                                    <?php foreach($order_list as $od) { ?>
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
                                <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i>24 giờ qua</span></div>
                                <div class="col-md-6 text-right"><a href="?ctrl=admin&view=order" class="btn btn-primary">Xem Tất Cả Đơn Hàng</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- KẾT THÚC MUA HÀNG GẦN ĐÂY -->
                </div>
                <div class="col-md-6">
</div>
</div>
<div class="row">
    <div class="col-md-7">
        <!-- DANH SÁCH CÔNG VIỆC CẦN LÀM -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Danh Sách Cần Làm</h3>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled todo-list">
                    <li>
                        <label class="control-inline fancy-checkbox">
                            <input type="checkbox"><span></span>
                        </label>
                        <p>
                            <span class="title">Khởi Động Lại Server</span>
                            <span class="short-description">Tích hợp linh động các công nghệ tập trung vào khách hàng mà không cần nguồn lực hợp tác.</span>
                            <span class="date">9 tháng 10, 2016</span>
                        </p>
                        <div class="controls">
                            <a href="#"><i class="icon-software icon-software-pencil"></i></a>
                            <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
                        </div>
                    </li>
                    <li>
                        <label class="control-inline fancy-checkbox">
                            <input type="checkbox"><span></span>
                        </label>
                        <p>
                            <span class="title">Kiểm Tra Tải Lên</span>
                            <span class="short-description">Thực hiện các mối quan hệ clicks-and-mortar mà không cần các chỉ số hiệu quả cao.</span>
                            <span class="date">23 tháng 10, 2016</span>
                        </p>
                        <div class="controls">
                            <a href="#"><i class="icon-software icon-software-pencil"></i></a>
                            <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
                        </div>
                    </li>
                    <li>
                        <label class="control-inline fancy-checkbox">
                            <input type="checkbox"><span></span>
                        </label>
                        <p>
                            <strong>Cuộc Họp Đặc Tả Chức Năng</strong>
                            <span class="short-description">Lập kế hoạch các năng lực cốt lõi tập trung vào khách hàng sau khi chuẩn bị sẵn sàng cho web.</span>
                            <span class="date">11 tháng 10, 2016</span>
                        </p>
                        <div class="controls">
                            <a href="#"><i class="icon-software icon-software-pencil"></i></a>
                            <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- KẾT THÚC DANH SÁCH CÔNG VIỆC CẦN LÀM -->
    </div>
    
</div>
<div class="row">
    <div class="col-md-4">
        <!-- NHIỆM VỤ CỦA TÔI -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Nhiệm Vụ Của Tôi</h3>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled task-list">
                    <li>
                        <p>Cập Nhật Cài Đặt Người Dùng <span class="label-percent">23%</span></p>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" role="progressbar"
                                aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width:23%">
                                <span class="sr-only">23% Hoàn Thành</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <p>Kiểm Tra &amp; Kiểm Tra Tải <span class="label-percent">80%</span></p>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                <span class="sr-only">80% Hoàn Thành</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <p>Kiểm Tra Sao Lưu Dữ Liệu <span class="label-percent">100%</span></p>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%">
                                <span class="sr-only">Hoàn Thành</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <p>Kiểm Tra Server <span class="label-percent">45%</span></p>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                <span class="sr-only">45% Hoàn Thành</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <p>Phát Triển Ứng Dụng Di Động <span class="label-percent">10%</span></p>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" role="progressbar"
                                aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                                <span class="sr-only">10% Hoàn Thành</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- KẾT THÚC NHIỆM VỤ CỦA TÔI -->
    </div>
    <div class="col-md-4">
        <!-- BIỂU ĐỒ LƯỢT TRUY CẬP -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Lượt Truy Cập Website</h3>
            </div>
            <div class="panel-body">
                <div id="visits-chart" class="ct-chart"></div>
            </div>
        </div>
        <!-- KẾT THÚC BIỂU ĐỒ LƯỢT TRUY CẬP -->
    </div>
    <div class="col-md-4">
        <!-- BIỂU ĐỒ TẢI HỆ THỐNG -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tải Hệ Thống</h3>
                <div class="right">
                </div>
            </div>
            <div class="panel-body">
                <div id="system-load" class="easy-pie-chart" data-percent="70">
                    <span class="percent">70</span>
                </div>
                <h4>Tải CPU</h4>
                <ul class="list-unstyled list-justify">
                    <li>Cao: <span>95%</span></li>
                    <li>Trung Bình: <span>87%</span></li>
                    <li>Thấp: <span>20%</span></li>
                    <li>Thread: <span>996</span></li>
                    <li>Process: <span>259</span></li>
                </ul>
            </div>
        </div>
        <!-- KẾT THÚC BIỂU ĐỒ TẢI HỆ THỐNG -->
    </div>
</div>
<script>
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