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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($addpro_list as $ad) {
                                        extract($ad); ?>
                                        <tr>
                                            <td><?= $name_product ?>"</td>
                                            <td> <?= $price_product ?></td>
                                            <td><?= $quantity_product ?></td>
                                            <td><?= $description_product ?></td>
                                            <td>
                                                <a href="?ctrl=admin&view=editprod&id=<?= $id_product ?>"> <button
                                                        type="submit" name="Change" class="btn btn-danger">Sửa</button></a>
                                                <form action="?ctrl=admin&view=addpro" method="post">
                                                    <input type="hidden" name="idprod" value="<?= $id_product ?>">
                                                    <button type="submit" name="Del" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="header">
                            <h4 class="title">Thêm sản phẩm</h4>
                            <p class="category"></p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <form action="?ctrl=admin&view=addpro" method="post">
                                <label for="">Danh mục sản phẩm</label>


                                <select name="cate" id="cate" class="form-control">
                                    <?php foreach ($getcate as $cate) {
                                        extract($cate); ?>
                                        <option value="<?= $id_category ?>"><?= $name_category ?></option>
                                    <?php } ?>
                                </select>

                                <label for="">Tên sản phẩm</label>
                                <input type="text" name="name" id="name" class="form-control">

                                <label for="">Giá sản phẩm</label>
                                <input type="number" name="price" id="price" required min="1" class="form-control">

                                <label for="">So luong sản phẩm</label>
                                <input type="number" name="quantity" id="quantity" class="form-control">

                                <label for="">Mo ta sản phẩm</label>
                                <textarea name="description" id="description" rows="8" class="form-control"> </textarea>

                                <label for="">Hình ảnh</label>
                                <input type="file" name="image" id="image" class="form-control">


                                <input type="submit" name="addprod" value="Thêm sản phẩm">

                            </form>
                        </div>
                    </div>
                </div>
                </table>
                </tbody>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    function validateForm() {
        // Lấy giá trị 
        const cate = document.getElementById("cate").value;
        const name = document.getElementById("name").value.trim();
        const price = document.getElementById("price").value;
        const quantity = document.getElementById("quantity").value;
        const description = document.getElementById("description").value.trim();
        const image = document.getElementById("image").value;

        // Kiểm tra danh mục sản phẩm
        if (!cate) {
            alert("Vui lòng chọn danh mục sản phẩm.");
            return false;
        }

        // Kiểm tra tên sản phẩm
        if (!name) {
            alert("Vui lòng nhập tên sản phẩm.");
            return false;
        }

        // Kiểm tra giá sản phẩm
        if (!price || price <= 0) {
            alert("Vui lòng nhập giá sản phẩm hợp lệ.");
            return false;
        }

        // Kiểm tra số lượng sản phẩm
        if (!quantity || quantity <= 0) {
            alert("Vui lòng nhập số lượng sản phẩm hợp lệ.");
            return false;
        }

        // Kiểm tra mô tả sản phẩm
        if (!description) {
            alert("Vui lòng nhập mô tả sản phẩm.");
            return false;
        }

        // Kiểm tra hình ảnh
        if (!image) {
            alert("Vui lòng chọn hình ảnh sản phẩm.");
            return false;
        }

        return true; // Form hợp lệ
    }
</script>