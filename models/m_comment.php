<?php
class Comment extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllComments()
    {
        $sql = "SELECT * FROM comment";
        return $this->db->getAll($sql);
    }
    public function addComment($id_product, $comment, $id_user, $date)
    {
        $sql = "INSERT INTO comment(id_product, text_cmt, id_user, date) VALUES($id_product, '$comment', $id_user, '$date')";
        return $this->db->insert($sql);
    }
}
