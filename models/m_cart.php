<?php

class Cart extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    // Add to cart
    public function addToCart($product_id, $quantity)
    {
        $sql = "INSERT INTO cart (product_id, quantity) VALUES ($product_id, $quantity)";
        return $this->db->insert($sql);
    }
    // Get all items in cart
    public function getAllCartItems()
    {
        $sql = "SELECT * FROM cart";
        return $this->db->getAll($sql);
    }
}
