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
}
