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
    public function getProductNameByIdProductOrder()
    {
        $sql = "SELECT 
        order_detail.id_product, 
        product.img_product, 
        product.name_product, 
        order_detail.quantity, 
        order_detail.price, 
        order_detail.id_cart_detail, 
        order_detail.date_order 
        FROM order_detail 
        INNER JOIN product on order_detail.id_product = product.id_product";
        return $this->db->getAll($sql);
    }
}
