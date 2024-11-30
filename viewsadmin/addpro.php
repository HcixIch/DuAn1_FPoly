<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="header">
                        <h4 class="title">Danh sách sản phẩm</h4>
                        <p class="category">Quản lý tất cả sản phẩm</p>
                        <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Mô tả</th>
                                    <th>Sửa/Xóa</th>
                            <div class="header">
                                <h4 class="title">Thêm sản phẩm</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form>
                                    <label for="">Danh mục sản phẩm</label>
                                    <select name="cate" id="cate" class="form-control"></select>    
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" name="name" id="name" class="form-control"> 
                                    <label for="">Giá sản phẩm</label>
                                    <input type="number" name="price" id="price" class="form-control">
                                    <label for="">So luong sản phẩm</label>
                                    <input type="number" name="quantity" id="quantity" class="form-control">
                                    <label for="">Mo ta sản phẩm</label>
                                    <input type="text" name="description" id="description" class="form-control">
                                    <label for="">Hình ảnh</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    <input type="button" value="Thêm sản phẩm" onclick="">
                                </form>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($addpro_list as $ad) {
                                        extract($ad); ?>
                                        <td><?= $name_product?>"</td>
                                        <td> <?= $price_product?></td>
                                        <td><?= $quanlity_product?></td>
                                        <td><?= $description_product?></td>
                                        <td>
                                            <a href="?ctrl=admin&view=edituser&id=<?= $user['id_user'] ?>">Sửa</a> |
                                            <a href="?ctrl=user&action=deleteuser&id=<?= $user['id_user'] ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        </div>
                    
                    <!-- <div class="header">
                        <h4 class="title">Thêm sản phẩm</h4>
                        <p class="category"></p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <form>
                            <label for="">Sản phẩm</label>
                            <select name="cate" id="cate" class="form-control"></select>
                            <option value="$id">$name</option>
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="name" id="name" class="form-control" > 
                            <label for="">Giá sản phẩm</label>
                            <input type="number" name="price" id="price" class="form-control">
                            <label for="">So luong sản phẩm</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" >
                            <label for="">Mo ta sản phẩm</label>
                            <input type="text" name="description" id="description" class="form-control">
                            <label for="">Hình ảnh</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <input type="button" value="Thêm sản phẩm" onclick="">
                        </form>
                        
                    </div>
                     -->
                </div>
            </div>
                    </div>

                </div>
            </div>