<?php
class WishList extends Database
{
    private $conn;
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    // Thêm sản phẩm vào danh sách yêu thích
    public function addProductToWishlist($id_product, $id_user)
    {
        $sql = "INSERT INTO wishlist (id_product, id_user) VALUES ($id_product, $id_user)";
        return $this->db->insert($sql);
    }
    public function checkProductInWishlist($id_product, $id_user)
    {
        $sql = "SELECT COUNT(*) as count FROM wishlist WHERE id_product = $id_product AND id_user = $id_user";

        $result = $this->db->getOne($sql);
        return $result['count'] > 0;
    }
    // Xóa sản phẩm kh��i danh sách yêu thích
    public function removeProductFromWishlist($id_product, $id_user)
    {
        $sql = "DELETE FROM wishlist WHERE id_product = $id_product AND id_user = $id_user";
        return $this->db->delete($sql);
    }
    // Lấy danh sách sản phẩm trong wishlist
    public function getWishlistProducts($id_user)
    {
        $sql = "SELECT p.* FROM wishlist w INNER JOIN product p ON w.id_product = p.id_product WHERE w.id_user = $id_user";
        return $this->db->getAll($sql);
    }
    // Lấy 5 Sản phẩm được yêu thích nhất
    public function getTop5WishlistProducts()
    {
        $sql = "SELECT p.* FROM wishlist w INNER JOIN product p ON w.id_product = p.id_product GROUP BY w.id_product ORDER BY COUNT(*) DESC LIMIT 5";
        return $this->db->getAll($sql);
    }
    // Đếm trong wishlist
    public function countWishlist($id_product)
    {
        $sql = "SELECT COUNT(*) as count FROM wishlist WHERE id_product = $id_product";
        return $this->db->getAll($sql);
    }
}
