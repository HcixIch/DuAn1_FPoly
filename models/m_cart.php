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
        $sql = "SELECT * FROM cart WHERE id_product = $product_id";
        return $this->db->getone($sql);
    }
    // Add to cart
    public function addToCart($data, $id_user)
    {
        extract($data);
        // Check trùng
        $duplicate = $this->checkDuplicate($product_id);
        if ($duplicate) {
            $new_quantity = $duplicate['quantity'] + $quantity;
            $subtotal = $new_quantity * $price;
            $sql = "UPDATE cart SET quantity = $new_quantity, subtotal = $subtotal WHERE id_product = $product_id";
            return $this->db->update($sql);
        } else {
            // Thêm mới
            $subtotal = $quantity * $price;
            $sql = "INSERT INTO cart (id_product,id_user,quantity,subtotal) VALUES ($product_id,$id_user,$quantity,$subtotal)";
            return $this->db->insert($sql);
        }
    }
    public function getAllCartItems($id_user)
    {
        $sql = "SELECT *, product.img_product, product.name_product, product.price_product 
            FROM cart
            INNER JOIN product ON cart.id_product = product.id_product
            WHERE cart.id_user = $id_user";
        return $this->db->getAll($sql);
    }
    // Delete Cart
    public function deleteCartItem($id_cart)
    {
        $sql = "DELETE FROM cart WHERE id_cart = $id_cart";
        return $this->db->delete($sql);
    }
    // Count product in cart
    public function countProductInCart($id_user)
    {
        $sql = "SELECT COUNT(*) as total_cart FROM cart WHERE id_user = $id_user";
        return $this->db->getone($sql);
    }
}
