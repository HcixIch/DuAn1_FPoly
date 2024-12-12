<?php
class User extends Database
{
    private $conn;
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    //Lấy tất cả User
    public function getAllUser()
    {
        $sql = "SELECT * FROM user";
        return $this->db->getAll($sql);
    }
    // Hàm lấy user điều kiện
    public function getOneId($id)
    {
        $sql = "SELECT * FROM user WHERE id_user = " . $id;
        return $this->db->getOne($sql);
    }
    // Hàm lấy Email
    public function getAllbyEmail($email)
    {
        $sql = "SELECT * FROM user WHERE email_user = '" . $email . "' ";
        return $this->db->getAll($sql);
    }
    // Hàm tạo mới User
    public function CreateUser($email, $password)
    {
        $sql = "INSERT INTO user(email_user, password) VALUES ('" . $email . "','" . $password . "');";
        return $sql = $this->db->insert($sql);
    }
    // Hàm cập nhật User
    public function UpdateUser($id, $fullname, $address_user, $email, $phone)
    {
        $sql = "UPDATE user SET full_name = '" . $fullname . "', address_user = '" . $address_user . "', email_user = '" . $email . "', phone_user = '" . $phone . "'  WHERE id_user = $id;";
        return $sql = $this->db->update($sql);
    }
    // Hàm cập nhật mật khẩu User
    public function UpdatePassword($id, $password)
    {
        $sql = "UPDATE user SET password = '" . $password . "' WHERE id_user = $id;";
        return $sql = $this->db->update($sql);
    }
    // Hàm xóa User
    public function DeleteUser($id)
    {
        $sql = "DELETE FROM user WHERE id_user = '" . $id . "' ";
        $params = [$id];
        return $this->db->delete($sql, $params);
    }
    // Hàm đăng nhập
    public function login($email, $password)
    {
        $sql = "SELECT * FROM user WHERE email_user ='" . $email . "' AND password = '" . $password . "' ";
        return $this->db->getAll($sql);
    }
    // Hàm Cấp quyền

    public function updateRole($id, $role)
    {
        $sql = "UPDATE user SET role = '" . $role . "' WHERE id_user = '" . $id . "';";
        return $sql = $this->db->update($sql);
    }
    // Hàm Thu Hồi quyền
    public function resetRole($id, $role)
    {
        $sql = "UPDATE user SET role = '" . $role . "' WHERE id_user = '" . $id . "'";
        return $sql = $this->db->update($sql);
    }
    public function resetRole($id, $role){
        $sql = "UPDATE user SET role = '".$role."' WHERE id_user = '".$id."'";
        return $this->db->update($sql);
}