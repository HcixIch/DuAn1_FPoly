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
        product.name_product, 
        checkout.phone, 
        checkout.total_all, 
        checkout.email, 
        checkout.full_name,
        checkout.shipping_cost, 
        checkout.date_order 
        FROM checkout 
        INNER JOIN product on checkout.id_product = product.id_product";
        return $this->db->getAll($sql);
    }
}
