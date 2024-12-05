<?php
class Checkout extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getCheckout()
    {
        $sql = "SELECT * FROM checkout";
        return $this->db->getAll($sql);
    }

    public function insertCheckout($data)
    {
        $time = date('Y-m-d H:i:s');
        extract($data);
        $sql = "INSERT INTO checkout (id_user, total_all, shipping_cost, address, phone, full_name, provisional_total, payment_option, id_voucher, date_order) 
                VALUES ($id_user, $total_price, $shipping_cost, '$address', '$phone', '$fullname', $provisional_price, '$payment_method', " . ($voucher === NULL ? "NULL" : "'$voucher'") . ",'$time')";
        return $this->db->insert($sql);
    }

    public function getCheckoutNewMost()
    {
        $sql = "SELECT * FROM checkout ORDER BY id_checkout DESC LIMIT 1";
        return $this->db->getAll($sql);
    }
    public function GetHistoryCheckout()
    {
        $sql = "SELECT 
       checkout.*, order_detail.*, product.*
        FROM checkout 
        INNER JOIN order_detail ON checkout.id_checkout = order_detail.id_checkout
        INNER JOIN product ON order_detail.id_product = product.id_product";
        return $this->db->getAll($sql);
    }
}
