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
    // Hàm lấy danh mục theo id
    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM categories WHERE id_category =?";
        return $this->db->getOne($sql, [$id]);
    }
    public function getNameCategoryByProduct($id)
    {
        $sql =
            "SELECT name_category
        FROM product
        INNER JOIN categories ON product.id_category = categories.id_category
        WHERE product.id_product =$id";
        return $this->db->getone($sql);
    }
    public function updateCategory($id, $name_category)
    {
        $sql = "UPDATE categories SET name_category = ? WHERE id_category = ?";
        return $this->db->update($sql, [$name_category, $id]);
    }
}
