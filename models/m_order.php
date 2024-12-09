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
    //Hàm lưu đơn hàng
    public function SaveOrder($data)
    {
        extract($data); // Lấy các giá trị từ mảng $data

        // Chuẩn bị câu lệnh SQL
        $sql = "INSERT INTO order_detail (quantity, price, unit_price, id_product, id_checkout) 
                VALUES ($quantity, $price, $unit_price, '$id_product', '$id_checkout')";

        // Thực thi lệnh SQL
        return $this->db->insert($sql);
    }
    // Cập nhật trạng thái 
    public function UpdateStatus($id_checkout, $status)
    {
        $sql = "UPDATE checkout SET status = '".$status."' WHERE id_checkout = '".$id_checkout."'";
        return $this->db->update($sql);
    }
}
