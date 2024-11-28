<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Sản Phẩm</h4>
                        <p class="category">Quản lý tất cả người dùng</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên đầy đủ</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Sửa/Xóa</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user_list as $user) { ?>
                                    <tr>
                                        <td><?= $user['id_user'] ?></td>
                                        <td><?= $user['full_name'] ?></td>
                                        <td><?= $user['phone_user'] ?></td>
                                        <td><?= $user['email_user'] ?></td>
                                        <td>
                                            <a href="?ctrl=admin&view=edituser&id=<?= $user['id_user'] ?>">Sửa</a> |
                                            <a href="?ctrl=user&action=deleteuser&id=<?= $user['id_user'] ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>