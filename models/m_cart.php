<?php

class Cart extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    // Check trùng 
    public function checkDuplicate($product_id)
    {
        $sql = "SELECT * FROM cart_detail WHERE id_product = $product_id";
        return $this->db->getone($sql);
    }
    // Add to cart
    public function addToCart($product_id, $quantity)
    {
        // Check trùng
        $duplicate = $this->checkDuplicate($product_id);
        if ($duplicate) {
            $new_quantity = $duplicate['quantity_produc'] + $quantity;
            $sql = "UPDATE cart_detail SET quantity_product = $new_quantity WHERE id_product = $product_id";
            return $this->db->update($sql);
        } else {
            // Thêm mới
            $sql = "INSERT INTO cart_detail (id_product, quantity_product) VALUES ($product_id,$quantity)";
            return $this->db->insert($sql);
        }
    }
    public function getAllCartItems($id_cart)
    {
        $sql = "SELECT *,img_product,name_product,price_product 
        FROM cart
        INNER JOIN product ON cart.id_product = product.id_product
        WHERE cart.id_cart = $id_cart";
        return $this->db->getAll($sql);
    }
}
