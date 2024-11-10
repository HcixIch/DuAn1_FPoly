<?php
class Database
{
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "arsenal";
    public $conn;
    //Khởi tạo: Kết nối với CSDL
    public function __construct()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername" . ";dbname=" . $this->database, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            $this->conn = $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    //Các phương thức dùng truy xuất và CRUD dữ liệu
    public function query($sql, $params = [])
    {
        $statement = $this->conn->prepare($sql);
        $statement->execute($params);
        return $statement;
    }
    // Hiển thị danh sách tất cả các mẫu tin
    public function getAll($sql)
    {
        $statement = $this->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    //Hiển thị 1 mẫu tin
    public function getOne($sql)
    {
        $statement = $this->query($sql);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    //Thêm
    public function insert($sql)
    {
        $statement = $this->query($sql);
        return $this->conn->lastInsertId();
    }
    //Cập nhật
    public function update($sql)
    {
        $this->query($sql);
    }
    //Xóa
    public function delete($sql)
    {
        $this->query($sql);
    }
}