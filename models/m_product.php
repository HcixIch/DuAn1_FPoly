<?php
include_once "models/m_database.php";
class Product extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getProductByCodition($cate,$new,$hot,$sale,$limit);
    {
        $sql = "SELECT * FROM product WHERE";
        if($cate!=0&&$cate!=""){
            $sql.=" id_category = $cate";
        }
        if($new==1){
            $sql.=" AND new = 1";
        }
        return $this->db->query($sql);
    }