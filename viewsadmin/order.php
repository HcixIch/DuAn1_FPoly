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
                                        <th>hình ảnh</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                    	<th>Ngày đặt</th>
                                    	
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $order_list = $order->getProductNameByIdProductOrder();
                                        foreach($order_list as $od){
                                        $i =0;?>
                                        <tr>
                                            <td><?= $i + 1?></td>
                                            <td id="name"><?= $od['id_cart_detail']?></td>
                                            <td><?= $od['name_product'] ?></td>
                                            <td id="price"><img src="./assets/images/product/<?= $od['img_product']?>" alt="" id="image" height="80px"></td>
                                            <td><?=number_format( $od['price'], 0,',', '.')?>đ</td>
                                            <td><?=$od['quantity']?></td>   
                                            <td><?=$od['date_order']?></td> 
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>