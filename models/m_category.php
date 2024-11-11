<?php
class Category extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    // Hàm lấy tất cả danh mục
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        return $this->db->getAll($sql);
    }
}
