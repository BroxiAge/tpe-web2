<?php

require_once "./View/CategoriesView.php";
require_once "./Model/CategoriesModel.php";
require_once "./Model/UserModel.php";



class CategoriesController{

    private $view;
    private $model;
    private $userModel;

    function __construct(){
        $this->view = new CategoriesView();
        $this->model = new CategoriesModel();
        $this->userModel = new UserModel();
    }

    private function checkLoggedIn(){
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(!isset($_SESSION["USER"])){
            header("Location: ". LOGIN);
            die();
        }else{
            if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) { 
                header("Location: ". LOGOUT);
                die();
            } 
        
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }

    function Categories(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION["USER"])){
            $user= $this->userModel->GetUser($_SESSION["USER"]);
        }else{
            $user = $this->userModel->GetUser("invitado");
        }
        $categories = $this->model->getCategories();
        $this->view->showCategories($categories, $user);
    }

    function FilterByCategorie($params = null){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION["USER"])){
            $user= $this->userModel->GetUser($_SESSION["USER"]);
        }else{
            $user = $this->userModel->GetUser("invitado");
        }
        $categorie_name = $params[':ID'];
        $categorie_id = $this->model->getCategorieId($categorie_name);
        $sparesByCategorie = $this->model->getSparesByCategorie($categorie_id);
        $this->view->ShowSparesByCategorie($sparesByCategorie, $categorie_name, $user);
        
    }

    function AddCategorie(){
        
        $categorie_name = $_POST['input_categorie'];
        if ($categorie_name != ''){
            $categorie = $this->model->getCategorie($categorie_name);
            if (!isset($categorie->name)){
                $this->model->AddCategorie($categorie_name);
            }
            
        }
        $this->Categories();
    }
    
    function DeleteCategorie(){
        $categorie_name = $_POST['input_categorie'];
        if ($categorie_name != ''){
            $categorie_id = $this->model->getCategorieId($categorie_name);
            if (isset($categorie_id)){
                $this->model->deleteCategorie($categorie_name);
            }
        $this->Categories();
        }
    }  
    
    function ModifyCategorie(){
        $categorie_name = $_POST['input_categorie'];
        $new_name = $_POST['input_new_name'];
        if ($categorie_name != ''){
            $categorie_id = $this->model->getCategorieId($categorie_name);
            if (isset($categorie_id)){
                $this->model->modifyCategorie($categorie_name, $new_name);
            }
        $this->Categories();
        }
    }
    
}
?>

