<?php
// Thông tin kết nối database
$servername = "localhost";
$username = "root";
$password = "";
$database = "arsenal";


public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Phương thức để thực thi câu truy vấn SQL
    public function query($sql, $params = [])
    
try {
    // Kết nối cơ sở dữ liệu
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn dữ liệu từ bảng users
    $sql = "SELECT id_user, full_name, address_user, phone_user, email_user, password, role FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Lấy tất cả dữ liệu
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Hiển thị dữ liệu dạng bảng
    if (count($users) > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
              </tr>";
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user['id_user']) . "</td>";
            echo "<td>" . htmlspecialchars($user['full_name']) . "</td>";
            echo "<td>" . htmlspecialchars($user['address_user']) . "</td>";
            echo "<td>" . htmlspecialchars($user['phone_user']) . "</td>";
            echo "<td>" . htmlspecialchars($user['email_user']) . "</td>";
            echo "<td>" . htmlspecialchars($user['password']) . "</td>";
            echo "<td>" . htmlspecialchars($user['role']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không có dữ liệu trong bảng.";
    }
} catch (PDOException $e) {
    echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
}
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
                                            <td id="name"><??></td>
                                            <td id="address"><??></td>
                                            <td id="phone"><??></td>
                                            <td id="email"><??></td>
                                            <td id="pass"><??></td>
                                            <td id="role"><??></td>
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
                    </div>