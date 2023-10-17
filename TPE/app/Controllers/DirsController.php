<?php
require_once './app/Models/DirsModel.php';
require_once './app/Views/DirsView.php';
require_once "./app/helpers/AuthHelper.php";


class DirsController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new DirsModel();
        $this->view = new DirsView();
    }

    public function showDirs() {
        $dirs = $this->model->getDirs();
        
        $this->view->showDirs($dirs);
    }

    public function showAddDir() {
        $this->view->showAddDir();
    }

    public function addNewDir() {
        
        if (empty($_POST['nombreDirector']) || empty($_POST['Edad']) || empty($_POST['cantidadPeliculas'])) {
            ErrorView::showError('No se pueden enviar datos vacíos!');
        } elseif (AuthHelper::isLogged()) {
            $this->model->addDir();
            header('Location: ' . BASE_URL );
        } else{
            header('Location: ' . BASE_URL );
        }
        }
       
    

    public function deleteDir($id) {
        if (AuthHelper::isLogged()) {
        $this->model->deleteDir($id);
        header('Location: ' . BASE_URL . '/dirs');
    } 
        header('Location: ' . BASE_URL . '/dirs');

    }
}