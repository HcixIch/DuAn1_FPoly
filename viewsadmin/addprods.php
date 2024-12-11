<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="padding:20px;">
                    <div class="header">
                                <h4 class="title">Thêm sản phẩm</h4>
                                <div>
                            </div>
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
                                    <input type="file" name="image" id="image" class="form-control" style="width:210px;">


                                    <input type="submit" name="addprod" value="Thêm sản phẩm">

                                </form>
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
