<?php
include_once "models/m_database.php";
class Product extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllProduct()
    {
        $sql = "SELECT * FROM product";
        return $this->db->query($sql);
    }
}
