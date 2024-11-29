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
        extract($data);
        $sql = "INSERT INTO checkout (id_user, total_all, shipping_cost, address, phone, full_name, provisional_total, payment_option, id_voucher) 
            VALUES ($id_user, $total_price, $shipping_cost, '$address', '$phone', '$fullname', $provisional_price, '$payment_method', " . ($voucher === NULL ? "NULL" : "'$voucher'") . ")";
        return $this->db->insert($sql);
    }
}
