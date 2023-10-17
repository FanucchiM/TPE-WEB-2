<?php
// Hacemos un require_once de los controllers que usamos
require_once './app/controllers/MoviesController.php';
require_once './app/controllers/DirsController.php';
require_once './app/controllers/AuthController.php';
require_once './app/views/ErrorView.php';

// Definimos la constante "BASE_URL"
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'movies'; // Accion por defecto
// Verificamos que la acción exista
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// TABLA DE RUTEO:
// games        ->      gamesController->showGames()
// developers   ->      devsController->showDevs()
// game         ->      gamesController->showGameById()
// add-game     ->      gamesController->showAddGame()
// add-new-game ->      gamesController->addNewGame()


// parseamos la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'movies':
        $controller = new MoviesController();
        if(isset($params[1]) && $params[1] == 'director') {
            $controller->showMovies($params[2]);
        } else {
            $controller->showMovies();
        }
        break;
    case 'movie':
        $controller = new MoviesController();
        $controller->showMovieById($params[1]);
        break;
    case 'add-movie':
        $controller = new MoviesController();
        $controller->showAddMovie();
        break;
    case 'add-new-movie':
        $controller = new MoviesController();
        $controller->addNewMovie();
        break;
    case 'delete-game':
        $controller = new MoviesController();
        $controller->deleteMovie($params[1]);
        break;
    case 'add-director':
        $controller = new DirsController();
        $controller->showAddDir();
        break;
    case 'add-new-dir':
        $controller = new DirsController();
        $controller->addNewDir();
        break;
    case 'delete-dir':
        $controller = new DirsController();
        $controller->deleteDir($params[1]);
        break;
    case 'edit-movie':
        $controller = new MoviesController();
        $controller->editMovie($params[1]);
        break;
    case 'movie-edited':
        $controller = new MoviesController();
        $controller->movieEdited($params[1]);
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'hash':
        echo password_hash('admin', PASSWORD_DEFAULT);
        break;
    default: 
        $controller = new ErrorController();
        $controller->notFound();
        break;
}