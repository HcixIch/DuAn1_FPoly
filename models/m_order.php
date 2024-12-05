<?php
class Order extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    //Hàm lấy tất cả đơn hàng
    public function getAllOrder()
    {
        $sql = "SELECT * FROM order_detail ";
        return $this->db->getAll($sql);
    }
    //Hàm lấy tên product đơn hàng theo id_product
    public function GetDetailOrder()
    {
        $sql = "SELECT 
       checkout.*, order_detail.*, product.*
        FROM checkout 
        INNER JOIN order_detail ON checkout.id_checkout = order_detail.id_checkout
        INNER JOIN product ON order_detail.id_product = product.id_product";
        return $this->db->getAll($sql);
    }
    //Hàm lấy thông tin đơn hàng theo id_checkout
    public function GetOrderById($id_checkout)
    {
        $sql = "SELECT 
        checkout.*, order_detail.*, product.*
        FROM order_detail 
        INNER JOIN checkout ON checkout.id_checkout = order_detail.id_checkout
        INNER JOIN product ON order_detail.id_product = product.id_product
        WHERE checkout.id_checkout = $id_checkout";
        return $this->db->getAll($sql);
    }
}
