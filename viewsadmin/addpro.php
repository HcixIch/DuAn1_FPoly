<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm sản phẩm</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form>
                                    <label for="">Sản phẩm</label>
                                    <select name="cate" id="cate" class="form-control"></select>
                                    <?php foreach(){?>
                                        <option value="$id">$name</option>
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
                                    <?php}?>
                                </form>

                            </div>
                            
                        </div>
                    </div>
                    