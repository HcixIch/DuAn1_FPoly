<?php

class Cart extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    // Thêm Sản phẩm
    public function Checkproductindata($idproduct) {
       $spl = "SELECT * FROM cart WHERE id_product = $id_product";
       $kq = $this->db->getone($spl);
       if($kq === null){
        return 0;
       } else { return $kq; }
    }
    public function addProductToCart( $idproduct, $quantity) {
            if(is_array(Checkproductindata($idproduct) )){
            // Cập nhật số lượng sản phẩm nếu đã có trong giỏ hàng
            $sql = $this->db->update("UPDATE cart SET quantity_product = quantity_product + :quantity_product WHERE id_product = :id_product");
        } else {
            // Thêm sản phẩm mới vào giỏ hàng
            $sql = $this->db->isert("INSERT INTO cart ( id_product, quantity_product) VALUES ( '".$idproduct."', '".$quantity."')");
        }
        return $this->db->getone($sql);
    }
}
?>