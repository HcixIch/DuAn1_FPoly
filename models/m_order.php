<?php
class Order extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllOrder()
    {
        $sql = "SELECT * FROM order_detail ";
        return $this->db->getAll($sql);
    }
    public function getOrderById($id)
    {
        $sql = "SELECT * FROM order_detail WHERE id_order =?";
        return $this->db->getOne($sql, [$id]);
    }
    public function addOrder($data)
    {
        extract($data);
        $sql = "INSERT INTO order_detail(quantity, price, unit_price, id_product,id_checkout) VALUES('$quantity','$price','$subtotal','$id_product','$id_checkout')";
        return $this->db->insert($sql);
    }
}
