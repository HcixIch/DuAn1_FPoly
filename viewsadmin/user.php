<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Quản lý người dùng</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>STT</th>
                                    	<th>Tên</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                    	<th>Vai trò</th>
                                    	<th></th>
                                    </thead>
                                    <tbody>
                                    <?php foreach($user_list as $id_userl){
                                        extract($us);?>
                                        <tr>
                                            <td></td>
                                            <td id="id"><?= $id_userl?></td>
                                            <td id="name"><?=$full_name?></td>
                                            <td id="address"><?=$address_user?></td>
                                            <td id="phone"><?$phone_user?></td>
                                            <td id="email"><?$email_user?></td>
                                            <td id="pass"><?$password_user?></td>
                                            <td id="role"><?$role?></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>

                            </div>
                            <ul class="pagination-list">
                                <li class="pagination-item">
                                    <a href="" class="pagination-link">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-link">1</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-link">2</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-link">3</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-link">...</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-link">10</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-link">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>