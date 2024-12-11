<?php
class Voucher extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    // Hàm lấy tất cả mã giảm giá
    public function getAllVoucher()
    {
        $sql = "SELECT * FROM voucher";
        return $this->db->getAll($sql);
    }
    // Hàm lấy mã giảm giá theo id
    public function getVoucherById($id)
    {
        $sql = "SELECT * FROM voucher WHERE id_voucher = ?";
        return $this->db->getOne($sql, [$id]);
    }
    // Hàm check điều kiện voucher
    public function checkVoucher($code, $total)
    {
        $sql = "SELECT COUNT(*) as count 
            FROM voucher 
            WHERE id_voucher = '$code' 
              AND condition_voucher <= $total 
              AND dealine_voucher >= CURDATE()";

        $result = $this->db->getOne($sql);

        return isset($result['count']) && $result['count'] > 0;
    }
}
