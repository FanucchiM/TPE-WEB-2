<?php

class MoviesModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe;charset=utf8', 'root', '');
    }

    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getMovies() {
        $query = $this->db->prepare('SELECT * FROM peliculas');
        $query->execute();

        // $movies es un arreglo de tareas
        $movies = $query->fetchAll(PDO::FETCH_OBJ);

        return $movies;
    }
    public function getMoviesByDirId($dirId) {
        $query = $this->db->prepare('SELECT peliculas.*, director.Nombre FROM peliculas JOIN director ON peliculas.Id_Director = director.id WHERE director.id = ?');
        $query->execute([$dirId]);
        return $query->fetchAll(PDO::FETCH_OBJ);
        
    }
    public function getMovieById($id) {
        $query = $this->db->prepare('SELECT * FROM peliculas JOIN director ON peliculas.Id_Director = director.id WHERE peliculas.id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function addMovie() {
        $query = $this->db->prepare('INSERT INTO peliculas (Titulo, Anio, Genero, Id_Director) VALUES (?, ?, ?, ?)');
        $query->execute([$_POST['nombreTitulo'], $_POST['Anio'], $_POST['Genero'], $_POST['Id_Director']]);
    }
    
    function deleteMovie($id) {
        $query = $this->db->prepare('DELETE FROM peliculas WHERE id = ?');
        $query->execute([$id]);
        header('Location: ' . BASE_URL);
        
    }
    public function editMovie($id) {
        $query = $this->db->prepare('UPDATE peliculas SET Titulo = ?, Anio = ?, Genero = ?, Id_Director = ? WHERE id = ?');
        $query->execute([$_POST['nombreJuego'], $_POST['Anio'], $_POST['Genero'], $_POST['Director'], $id]);
        header('Location: ' . BASE_URL);
    }
}
