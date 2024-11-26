<?php
class Order extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllOrder(){
        $sql = "SELECT * FROM order ";
        return $this->db->getAll($sql);
    }
}
?>