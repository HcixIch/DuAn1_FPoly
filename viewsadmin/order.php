<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Chi tiết đơn hàng</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>STT</th>
                                    	<th>Tên</th>
                                        <th>Đơn hàng</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                    	<th>Ngày đặt</th>
                                    	<th></th>
                                    </thead>
                                    <tbody>
                                    <?php foreach($order_list as $od){
                                        extract($od);?>
                                        <tr>
                                            <td></td>
                                            <td id="name"><?= $id_cart_detail?></td>
                                            <td id="price"><?=$price?></td>
                                            <td><img src="" alt="" id="image" height="80px"></td>
                                            <td></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>

                            </div>
                            <ul class="pagination-list">
                                <li class="pagination-item">
                                    <a href="" class="pagination-link">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-link">1</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-link">2</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-link">3</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-link">...</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-link">10</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-link">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>