<?php
class Databa
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "arsenal";
    private $conn;

    // Khởi tạo: Kết nối với CSDL
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
    {
        try {
            $statement = $this->conn->prepare($sql);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            return false;
        }
    }

    // Hiển thị tất cả mẫu tin, trả về mảng
    public function getAll($sql, $params = [])
    {
        $statement = $this->query($sql, $params);
        if ($statement) {
            // Đảm bảo trả về mảng dữ liệu
            return $statement->fetchAll(PDO::FETCH_ASSOC); // Trả về mảng
        }
        return []; // Nếu có lỗi, trả về mảng rỗng
    }

    // Hiển thị một mẫu tin
    public function getOne($sql, $params = [])
    {
        $statement = $this->query($sql, $params);
        if ($statement) {
            return $statement->fetch(PDO::FETCH_ASSOC); // Trả về một mảng hoặc null nếu không có kết quả
        }
        return null;
    }

    // Thêm dữ liệu vào CSDL
    public function insert($sql, $params = [])
    {
        $statement = $this->query($sql, $params);
        if ($statement) {
            return $this->conn->lastInsertId(); // Lấy ID của bản ghi vừa thêm
        }
        return false;
    }

    // Cập nhật dữ liệu
    public function update($sql, $params = [])
    {
        $statement = $this->query($sql, $params);
        return $statement ? $statement->rowCount() : 0; // Trả về số dòng bị ảnh hưởng
    }

    // Xóa dữ liệu
    public function delete($sql, $params = [])
    {
        $statement = $this->query($sql, $params);
        return $statement ? $statement->rowCount() : 0; // Trả về số dòng bị ảnh hưởng
    }

    // Phương thức đóng kết nối
    public function __destruct()
    {
        $this->conn = null;
    }

    public function getConnection() {
        return $this->conn;
    }
}