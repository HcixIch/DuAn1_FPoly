<?php
include_once "models/m_database.php";
class Product extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllProducts()
    {
        $sql = "SELECT * FROM product";
        return $this->db->query($sql);
    }
    public function getAllProductsByProductId($id)
    {
        $sql = "SELECT * FROM product WHERE id = $id";
        return $this->db->query($sql);
    }
    public function getProductsByCategory($id_cate, $limit)
    {
        $sql = "SELECT * FROM product WHERE id_category = $id_cate";
        if ($limit && $limit > 0) {
            $sql .= " LIMIT $limit";
        }
        return $this->db->query($sql);
    }
    public function getNewProducts($limit)
    {
        $sql = "SELECT * FROM product ORDER BY id_product DESC LIMIT $limit";
        return $this->db->query($sql);
    }
    public function getHotProducts($limit)
    {
        $sql = "SELECT * FROM product WHERE hot=1 LIMIT $limit";
        return $this->db->query($sql);
    }
    public function getSaleProducts($limit)
    {
        $sql = "SELECT * FROM product WHERE sale > 0 LIMIT $limit";
        return $this->db->query($sql);
    }
}
