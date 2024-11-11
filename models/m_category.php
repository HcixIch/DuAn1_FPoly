<?php
class Category extends Database {
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
}
