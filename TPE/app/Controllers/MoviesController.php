<?php
require_once './app/Models/MoviesModel.php';
require_once './app/Views/MoviesView.php';
require_once "./app/models/DirsModel.php";
require_once "./app/views/ErrorView.php";





class MoviesController {
    private $model;
    private $view;
    private $dirModel;



    public function __construct() {
        // verifico logueado
        

        $this->model = new MoviesModel();
        $this->view = new MoviesView();
        $this->dirModel = new DirsModel();

        
    }
    public function showMovies($dirId = -1) {
        if($dirId == -1) {
            $movies = $this->model->getMovies();
        } else {
            $movies = $this->model->getMoviesByDirId($dirId);
        }
        $dirs = $this->dirModel->getDirs();
        
        
        $this->view->showMovies($movies, $dirs);
    }

    public function showAddMovie() {
        $dirs = $this->dirModel->getDirs();
        $this->view->showAddMovie($dirs);
    }

    public function addNewMovie() {
        if (AuthHelper::isLogged()) {
            $this->model->addMovie();
        }
        header('Location: ' . BASE_URL);
    }

    public function showMovieById($id) {
        $movie = $this->model->getMovieById($id);
        if($movie) {
            $this->view->showMovie($movie);
        } else {
            $ErrorView = new ErrorView();
            $ErrorView->showError('El juego seleccionado no existe.');
        }
    }

    public function deleteMovie($id) {
        if (AuthHelper::isLogged()) {
            $this->model->deleteMovie($id);

        }
        header('Location: ' . BASE_URL);
    }
    public function editMovie($id) {
        $movie = $this->model->getMovieById($id);
        $dirs = $this->dirModel->getDirs();
        $this->view->showEditMovie($movie, $dirs);
    }
    public function movieEdited($id) {
        if (AuthHelper::isLogged()) {
       
            $this->model->editMovie($id);
        }
        header('Location: ' . BASE_URL);
    }
}