<?php
require_once './app/Views/ErrorView.php';
require_once "./app/helpers/AuthHelper.php";

class ErrorController {
    private $view;

    public function __construct() {
        $this->view = new ErrorView();
    }

    public function notFound() {
        $this->view->showError('404 - Not Found');
    }
}