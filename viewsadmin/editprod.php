<div class="container">
    <h2>Sửa sản phẩm</h2>
    <form action="?ctrl=admin&view=editprod&id=<?= $product['id_product']?>" method="post">
        <div class="form-group">
            <label for="">Danh mục sản phẩm:</label>
                <select name="cate" id="cate" class="form-control">
                    <?php foreach($getcate as $cate){
                        extract($cate);?>
                    <option value="<?= $id_category?>"><?= $name_category?></option>
                    <?php } ?>
                </select>
            <label for="">Tên sản phẩm:</label><?= $product['name_product']?>
            <input type="text" class="form-control" id="name" name="name"  required>

            <label for="">Giá Sản phẩm:</label><?= $product['price_product']?>
            <input type="number" class="form-control" id="price" name="price"  required>

            <label for="">Số Lượng:</label><?= $product['quantity_product']?>
            <input type="number" class="form-control" id="quantity" name="quantity"  required> 

            <label for="">Mô tả:</label><?= $product['description_product']?>
            <textarea  class="form-control" id="description" rows="8" name="description"  required>  </textarea>

            <label for="">Hình ảnh</label>
            <input type="file" name="image" id="image" class="form-control">                     
        </div>
        <button type="submit" name="updateprod" class="btn btn-primary">Cập nhật</button>
    </form>
</div>