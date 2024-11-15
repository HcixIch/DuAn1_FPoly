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
    public function addToCart($data)
    {
        extract($data);
        // Check trùng
        $duplicate = $this->checkDuplicate($id_product);
        if ($duplicate) {
            $new_quantity = $duplicate['quantity_product'] + $quantity;
            $sql = "UPDATE cart_detail SET quantity_product = $new_quantity WHERE id_product = $id_product";
            return $this->db->update($sql);
        } else {
            // Thêm mới
            $sql = "INSERT INTO cart_detail (id_product, quantity_product) VALUES ($product_id,$quantity)";
            return $this->db->insert($sql);
        }
    }
    public function getAllCartItems($id_cart)
    {
        $sql = "SELECT *, product.img_product, product.name_product, product.price_product 
            FROM cart
            INNER JOIN product ON cart.id_product = product.id_product
            WHERE cart.id_cart = $id_cart";
        return $this->db->getAll($sql);
    }
}
