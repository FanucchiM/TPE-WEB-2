<?php

class DirsModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe;charset=utf8', 'root', '');
    }

    public function getDirs() {
        $query = $this->db->prepare('SELECT * FROM director');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function addDir() {
        $query = $this->db->prepare('INSERT INTO director (Nombre, Edad, CantidadDePeliculas) VALUES (?, ?, ?)');
        $query->execute([$_POST['nombreDirector'], $_POST['Edad'], $_POST['cantidadPeliculas']]);
    }

    public function deleteDir($id) {
        $query = $this->db->prepare('DELETE FROM director WHERE id = ?');
        $query->execute([$id]);
    }
}