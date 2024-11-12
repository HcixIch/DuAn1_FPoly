<?php
class User extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    //Hàm Lấy tất cả User
    public function getAllUser(){
        $sql = "SELECT * FROM user";
        return $this->db->getAll($sql);
    }
    // Hàm lấy user điều kiện
    public function getOneId($id){
        $sql = "SELECT * FROM user WHERE id = ".$id;
        return $this->db->getOne($sql);
    }
    
    public function getAllbyEmail($email){
        $sql="SELECT * FROM user WHERE email = '".$email."' ";
        return $this->db->getAll($sql);
    }
    public function CreateUser($name, $password, $email){
        $sql = "INSERT INTO user(username, password, email) VALUES ('".$name."','".$password."','".$email."');";
        return $sql = $this->db->insert($sql);
    }
    public function UpdateUser($id,$data){
        $sql = "UPDATE user SET username = ?, email = ? WHERE id = ";
        $params = [$data['name'],$data['email'],$id];
        return $sql = $this->db->update($sql,$params);
    }
    public function DeleteUser($id){
        $sql = "DELETE FROM user WHERE id = ?";
        return $this->db->update($sql,[$id]);
    }
    public function login($email, $password){
        $sql = "SELECT * FROM user WHERE email ='".$email."' AND password = '".$password."' ";
        return $this->db->getAll($sql);
    }
}