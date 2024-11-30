<?php
class Product extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    //Hàm lấy tất cả sản phẩm
    public function getAllProducts()
    {
        $sql = "SELECT * FROM product ";
        return $this->db->getAll($sql);
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
    // Hàm tìm giá nhỏ nhất lớn nhất của sản phẩm
    public function getMinMaxPriceProduct($minmax)
    {
        $sql = "SELECT MIN(price_product) as min_price, MAX(price_product) as max_price FROM product";
        if ($minmax == 'MIN') {
            return $this->db->getone($sql);
        } elseif ($minmax == 'MAX') {
            return $this->db->getone($sql);
        }
    }
    // Hàm phân trang
    public function getProductsByPage($page, $type, $limit, $min_price = 0, $max_price = PHP_INT_MAX)
    {
        // Tính toán offset cho phân trang
        $offset = ($page - 1) * $limit;

        // Khởi tạo câu SQL
        $sql = "SELECT * FROM product WHERE price_product BETWEEN $min_price AND $max_price ";

        // Kiểm tra nếu lọc theo danh mục
        if ($type == 'cate') {
            $id = isset($_GET['id_cate']) ? (int)$_GET['id_cate'] : 0;  // Lấy id_category từ $_GET và đảm bảo là số nguyên
            $sql .= "AND id_category = $id ";  // Thêm điều kiện lọc theo id_category
        }

        // Thêm phần giới hạn (LIMIT) và bỏ qua (OFFSET)
        $sql .= "LIMIT $limit OFFSET $offset";

        // Thực hiện truy vấn và trả về kết quả
        return $this->db->getAll($sql);
    }
    //Hàm đếm số lượng sản phẩm theo danh mục
    public function countProductsByCategory($id)
    {
        $sql = "SELECT COUNT(*) as total_product FROM product WHERE id_category = $id";
        return $this->db->getAll($sql);
    }
    // Hàm lấy ảnh sản phẩm từ bảng ảnh
    public function getProductImages($id_product)
    {
        $sql = "SELECT * FROM product_img WHERE id_product = $id_product";
        return $this->db->getOne($sql);
    }
    public function searchProductByPrice($minp, $maxp)
    {
        $sql = "SELECT * FROM product WHERE price_product BETWEEN $minp AND $maxp";
        return $this->db->getAll($sql);
    }
    public function getProductbySort($sort)
    {
        $sql = "SELECT * FROM product ORDER BY $sort";
        return $this->db->getAll($sql);
    }
    //Thêm sản phẩm
    public function addProduct($image, $name, $price, $description, $id_category, $quantity )
    {
        $sql = "INSERT INTO product(img_product, name_product, price_product, description_product, id_category, quantity_product ) VALUES('".$image."', '".$name."', '".$price."', '".$description."', '".$id_category."', '".$quantity."')";
        return $this->db->insert($sql);
    }
    //Xóa sản phẩm
    public function deleteProduct($id){
        $sql = "DELETE FROM product WHERE id_product = '".$id."' ";
        return $this->db->delete($sql);
    }
}
