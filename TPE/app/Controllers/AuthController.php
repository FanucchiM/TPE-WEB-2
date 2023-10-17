<?php
require_once "./app/Models/UsersModel.php";
require_once "./app/Views/AuthView.php";
require_once "./app/helpers/AuthHelper.php";

class AuthController {
    private $view;
    private $model;

    public function __construct() {
        $this->view = new AuthView();
        $this->model = new UsersModel();
    }

    public function showLogin($message = null) {
        if (!AuthHelper::isLogged()) {
            $this->view->showLogin($message);
        } else {
            header('Location: ' . BASE_URL);
        }
    }

    public function auth() {

        if (empty($_POST['user']) || empty($_POST['password'])) {
            $this->showLogin('Faltan completar campos');
            die();
        }

        $user = $this->model->getUser();
        if(empty($user)) {
            $this->showLogin('El usuario no existe');
            die();
        }

        AuthHelper::login($user);
        header('Location: ' . BASE_URL);
    }

    public function logout() {
        if (AuthHelper::isLogged()) {
            AuthHelper::logout();
        }
        header('Location: ' . BASE_URL);
    }
}