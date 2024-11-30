<div class="container">
    <h2>Sửa danh mục sản phẩm</h2>
    <form action="?ctrl=admin&view=editcate&id=<?= $category['id_category'] ?>" method="POST">
        <div class="form-group">
            <label for="name_category">Tên danh mục:</label>
            <input type="text" class="form-control" id="name_category" name="name_category" 
                   value="<?= $category['name_category'] ?>" required>
        </div>
        <button type="submit" name="update_category" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
