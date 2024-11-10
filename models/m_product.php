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

    public function getProductsByCondition($condition, $limit)
    {
        $sql = "SELECT * FROM product";
        switch ($condition) {
            case 'all':
                break;
            case 'hot':
                $sql .= " WHERE hot = 1";
                break;
            case 'sale':
                $sql .= " WHERE sale > 0";
                break;
            case 'new':
                $sql .= " ORDER BY id_product DESC";
                break;
        }
        if ($limit && $limit > 0) {
            $sql .= " LIMIT $limit";
        }
        return $this->db->query($sql);
    }
}
