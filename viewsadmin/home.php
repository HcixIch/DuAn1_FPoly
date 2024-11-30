<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Danh mục các sản phẩm</h4>
                        <div>
                            <a href="?ctrl=admin&view=addcate"><button type="button" class="btn btn-primary">
                                    Thêm danh mục
                                </button></a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Id danh mục</th>
                                <th>Tên</th>
                                <th>Tổng sản phẩm</th>
                                <th>Chức năng</th>
                            </thead>
                            <tbody>
                                <form action="?ctrl=admin&view=home" method="post">
                                    <?php foreach ($Allcates as $cate) {
                                        $i = 0;
                                        extract($cate);
                                        $countpro = $prod->countProductsByCategory($id_category); ?>

                                        <tr>
                                            <td><?= $id_category ?></td>
                                            <td><?= $name_category ?></td>
                                            <td><?= $countpro[$i]["total_product"] ?></td>
                                            <td>
                                                <a href="?ctrl=admin&view=editcate&id=<?= $id_category ?>" class="btn btn-warning">Sửa</a>
                                            </td>


                                        </tr>

                                    <?php $i++;
                                    } ?>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>