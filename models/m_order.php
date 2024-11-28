<?php
class Order extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllOrder(){
        $sql = "SELECT * FROM order_detail ";
        return $this->db->getAll($sql);
    }
}
?>