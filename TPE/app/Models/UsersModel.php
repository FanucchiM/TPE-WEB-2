<?php

class UsersModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe;charset=utf8', 'root', '');
    }

    public function getUser() {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE username = ?');
        $query->execute([$_POST['user']]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}