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
                                <?php foreach ($user_list as $user) { ?>
                                    <form action="" method="post">
                                        <tr style="<?php if ($user['role'] == 2) echo "display:none" ?>">
                                            <td><?= $user['id_user'] ?></td>
                                            <td><?= ($user['full_name'] != "") ? $user['full_name'] : 'Chưa cập nhật' ?>
                                            </td>
                                            <td><?= ($user['phone_user'] != "") ? $user['phone_user'] : 'Chưa cập nhật' ?>
                                            </td>
                                            <td><?= ($user['email_user'] != "") ? $user['email_user'] : 'Chưa cập nhật' ?>
                                            </td>
                                            <td><?= ($user['address_user'] != "") ? $user['address_user'] : 'Chưa cập nhật' ?>
                                            </td>
                                            <td><?= ($user['role'] == 0) ? 'Khách hàng' : 'Nhân viên' ?></td>
                                            <?php if ($_SESSION['user'][0]['role'] == 2) { ?>
                                                <td>
                                                    <input type="hidden" name="id" value="<?= $user['id_user'] ?>">
                                                    <input type="hidden" name="role" value="<?= $user['role'] ?>">
                                                    <button name="submit"
                                                        class="btn btn-primary"><?= ($user['role'] == 0) ? 'Cấp quyền' : 'Thu hồi quyền' ?></button>
                                                </td>

                                            <?php } ?>
                                        </tr>
                                    </form>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <?php
        // // Thông tin kết nối database
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $database = "arsenal";


        // public function __construct()
        //     {
        //         try {
        //             $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
        //             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //         } catch (PDOException $e) {
        //             echo "Connection failed: " . $e->getMessage();
        //         }
        //     }

        //     // Phương thức để thực thi câu truy vấn SQL
        //     public function query($sql, $params = [])

        // try {
        //     // Kết nối cơ sở dữ liệu
        //     $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //     // Truy vấn dữ liệu từ bảng users
        //     $sql = "SELECT id_user, full_name, address_user, phone_user, email_user, password, role FROM users";
        //     $stmt = $conn->prepare($sql);
        //     $stmt->execute();

        //     // Lấy tất cả dữ liệu
        //     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //     // Hiển thị dữ liệu dạng bảng
        //     if (count($users) > 0) {
        //         echo "<table border='1' cellpadding='10'>";
        //         echo "<tr>
        //                 <th>ID</th>
        //                 <th>Full Name</th>
        //                 <th>Address</th>
        //                 <th>Phone</th>
        //                 <th>Email</th>
        //                 <th>Password</th>
        //                 <th>Role</th>
        //               </tr>";
        //         foreach ($users as $user) {
        //             echo "<tr>";
        //             echo "<td>" . htmlspecialchars($user['id_user']) . "</td>";
        //             echo "<td>" . htmlspecialchars($user['full_name']) . "</td>";
        //             echo "<td>" . htmlspecialchars($user['address_user']) . "</td>";
        //             echo "<td>" . htmlspecialchars($user['phone_user']) . "</td>";
        //             echo "<td>" . htmlspecialchars($user['email_user']) . "</td>";
        //             echo "<td>" . htmlspecialchars($user['password']) . "</td>";
        //             echo "<td>" . htmlspecialchars($user['role']) . "</td>";
        //             echo "</tr>";
        //         }
        //         echo "</table>";
        //     } else {
        //         echo "Không có dữ liệu trong bảng.";
        //     }
        // } catch (PDOException $e) {
        //     echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
        // }
        // 
        ?>

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
                                    </thead>
                                    <tbody>
                                    
                                       
                                        <tr>
                                            <td></td>
                                            <td id="id"><? ?></td>
                                            <td id="name"><? ?></td>
                                            <td id="address"><? ?></td>
                                            <td id="phone"><? ?></td>
                                            <td id="email"><? ?></td>
                                            <td id="pass"><? ?></td>
                                            <td id="role"><? ?></td>
                                        </tr>
                                  
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
                    </div> -->