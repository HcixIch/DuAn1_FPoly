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
}
