<?php



//Obtiene y devuelve de la base de datos todas las tareas
function getMovies (){
    $db = new PDO ('mysql:host=localhost;dbname=tpe;charset=utf8', 'root', '');

    $query = $db ->prepare('SELECT * FROM peliculas');
    $query->execute();

    //$movies un arreglo de peliculas
    $movies = $query -> fetchAll(PDO :: FETCH_OBJ);


    return $movies;
}


function getDirector (){
    $db = new PDO ('mysql:host=localhost;dbname=tpe;charset=utf8', 'root', '');

    $query = $db ->prepare('SELECT * FROM director');
    $query->execute();

    //$movies un arreglo de peliculas
    $directors = $query -> fetchAll(PDO :: FETCH_OBJ);


    return $directors;
}