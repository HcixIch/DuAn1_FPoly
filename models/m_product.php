<?php
class Product extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    //Hàm lấy sản phẩm theo Id
    public function getProductsById($id)
    {
        $sql = "SELECT * FROM product WHERE id_product = $id";
        return $this->db->getone($sql);
    }
    //Hàm lấy sản phẩm theo danh mục
    public function getProductsByCategory($id_cate, $different)
    {
        $sql = "SELECT * FROM product WHERE id_category = $id_cate";
        if ($different) {
            $sql .= " AND id_product NOT IN (SELECT id_product FROM product WHERE id_product = $different)";
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
    public function getProductsByPage($quantitypage, $category, $pro_one_page)
    {
        $sql = "SELECT * FROM product";
        if (isset($_GET['id_cate'])) {
            $sql .= " WHERE id_category = $category";
        }
        $limit1  = ($quantitypage - 1) * $pro_one_page;
        $limit2 = $pro_one_page;
        $sql .= " ORDER BY id_product limit " . $limit1 . "," . $limit2;
        return $this->db->getAll($sql);
    }

    //Hàm đếm số lượng sản phẩm theo danh mục
    public function countProductsByCategory($id)
    {
        $sql = "SELECT COUNT(*) as total_product FROM product WHERE id_category = $id";
        return $this->db->getAll($sql);
    }
    // Hàm tìm giá nhỏ nhất lớn nhất của sản phẩm
    public function getMinMaxPriceProduct($minmax)
    {
        $sql = "SELECT MIN(price) as min_price, MAX(price) as max_price FROM product";
        if ($minmax == 'MIN') {
            return $this->db->getone($sql);
        } elseif ($minmax == 'MAX') {
            return $this->db->getone($sql);
        }
    }
    // Hàm lấy ảnh sản phẩm từ bảng ảnh
    public function getProductImages($id_product)
    {
        $sql = "SELECT * FROM product_img WHERE id_product = $id_product";
        return $this->db->getOne($sql);
    }
}
