<?php
include_once "models/m_database.php";
class Product extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    //Hàm lấy sản phẩm theo danh muc
    public function getAllProductsByProductId($id)
    {
        $sql = "SELECT * FROM product WHERE id = $id";
        return $this->db->getAll($sql);
    }
    //Hàm lấy sản phẩm theo danh mục
    public function getProductsByCategory($id_cate, $limit)
    {
        $sql = "SELECT * FROM product WHERE id_category = $id_cate";
        if ($limit && $limit > 0) {
            $sql .= " LIMIT $limit";
        }
        return $this->db->getAll($sql);
    }
    // Hàm lấy sản phẩm theo điều kiện
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
        return $this->db->getAll($sql);
    }
    // Hàm phân trang
    public function getProductsByPage($quantitypage, $pro_one_page)
    {
        $sql = "SELECT * FROM product";
        $limit1  = ($quantitypage - 1) * $pro_one_page;
        $limit2 = $pro_one_page;
        $sql .= " ORDER BY id_product limit " . $limit1 . "," . $limit2;
        return $this->db->getAll($sql);
    }
}
