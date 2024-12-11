<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Danh sách người dùng</h4>
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
                                    <th>Địa chỉ</th>
                                    <th>Vai trò</th>
                                    <?php if ($_SESSION['user'][0]['role'] == 2) { ?>
                                        <th>Thao Tác</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($user_list as $user){ ?>
                                    <?php if($user['id_user'] != $_SESSION['user'][0]['id_user']){ ?>
                                    <form action="" method="post">
                                        <tr style="<?php if ($user['role'] == 2) echo "display:none" ?>">
                                            <td><?= $user['id_user'] ?></td>
                                            <td><?= $user['full_name'] ?></td>
                                            <td><?= $user['phone_user'] ?></td>
                                            <td><?= $user['email_user'] ?></td>
                                            <?php if($_SESSION['user'][0]['role'] == 2 ){ ?>
                                                <?php if($user['role'] == 1){ ?>
                                                    <td>
                                                        <input type="hidden" name="id" value="<?= $user['id_user'] ?>">
                                                        <button name="Del" class="btn btn-primary">Thu hồi quyền</button>
                                                    </td>
                                                <?php } else { ?>
                                                    <td>
                                                        <input type="hidden" name="id" value="<?= $user['id_user'] ?>">
                                                        <button name="submit" class="btn btn-primary">Cấp Quyền</button>
                                                    </td>
                                                <?php } ?>
                                        </tr>
                                    </form>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>