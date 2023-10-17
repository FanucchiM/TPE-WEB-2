<?php

class MoviesView {
    public function showMovies($movies, $dirs) {
        
        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion

        // mostrar el template
        require 'templates2/MovieList.phtml';
    }

    public function showMovie($movie) {
        require 'templates2/movie.phtml';
    }
    public function showAddMovie($dirs, $message = null) {
        require './templates2/addMovie.phtml';
    }
    public function showEditMovie($movie, $dirs) {
        require './templates2/editMovie.phtml';
    }
}

?>
