<?php

require_once "./View/SpareView.php";
require_once "./Model/SpareModel.php";
require_once "./Model/UserModel.php";
require_once "./Model/ComentariesModel.php";



class SpareController{

    private $view;
    private $model;
    private $userModel;

    function __construct(){
        $this->view = new SpareView();
        $this->model = new SpareModel();
        $this->userModel = new UserModel();
        $this->comentariesModel = new ComentariesModel();
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

    
    
    function Spares(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION["USER"])){
            $user= $this->userModel->GetUser($_SESSION["USER"]);
        }else{
            $user = $this->userModel->GetUser("invitado");
        }
        
        $repuestos = $this->model->getSpares();
        $categorias = $this->model->getCategories();
        $this->view->showTable($repuestos, $categorias,$user); 
         
            
         
    }
    
    function SpareDetail($params = null){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION["USER"])){
            $user= $this->userModel->GetUser($_SESSION["USER"]);
        }else{
            $user = $this->userModel->GetUser("invitado");
        }
        $repuesto_id = $params[':ID'];
        $_SESSION['SPARE'] = $repuesto_id;
        $repuesto = $this->model->getSpare($repuesto_id);
        $categorias = $this->model->getCategories();
        $this->view->ShowSpare($repuesto,$categorias,$user);
    }
    
    function EditSpare (){ //es el agregar
        $this->checkLoggedIn();
        
        $name = $_POST["input_name"];
        $vehicle = $_POST["input_vehicle"];
        $categorie = $_POST["select_categorie"];
        $price = $_POST["input_price"];
        $description = $_POST["input_description"];
        
        if (($name != '') && ($vehicle!= '') && ($categorie!= '') && ($price!= '')){ //comprueba que no esten los campos vacíos.
            $agregar = true;
        }
            if ($agregar) {
                if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png" ) {
                    
                    $this->model->InsertSpare($name,$vehicle,$categorie,$price,$description,$_FILES['input_name']['tmp_name']); 
                }
                else {
                    $this->model->InsertSpare($name,$vehicle,$categorie,$price,$description); 
                }
            }
        $this->Spares();
        
    }
    function EditarSpare($params = null){
        $id_spare = $params[':ID'];
        
        $name = $_POST["input_spare_name"];
        $vehicle = $_POST["input_vehicle"];
        $categorie = $_POST["select_categorie"];
        $price = $_POST["input_price"];
        $description = $_POST["input_description"];
        $delete_image = $_POST["input-delete-image"];

        if(isset($delete_image)){
            $this->model->deleteImage($id_spare);
        }
        
        $spare = $this->model->getSpare($id_spare);
        
        if ($name == ''){
            $name = $spare->name;
        }
        if ($vehicle == ''){
            $vehicle = $spare->vehicle;
        }
        if ($categorie == ''){
            $categorie = $spare->id_categorie;
        }
        if ($price == ''){
            $price = $spare->price;
        }
        if ($description == ''){
            $description = $spare->description;
        }
        $this->model->modifySpareById($categorie, $price, $description, $name, $vehicle, $id_spare);
        
        if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png" ){
            $this->model->modifyImagen($_FILES['input_name']['tmp_name'], $id_spare);
        }
        header("Location: ".BASE_URL."producto/".$id_spare);
        
    }

    function DeleteSpare($params = null){
        $this->checkLoggedIn();
        $id_spare = $params[':ID'];
        
         
        //esta parte es para eliminar tambien los comentarios relacionados a el producto en cuestión.
        if(isset($_SESSION["USER"])){
            $user = $this->userModel->GetUser($_SESSION["USER"]);
        
            if ($user->rol == 1){
                $this->model->deleteSpareById($id_spare); 
                $this->comentariesModel->deleteCommentaryBySpareId($id_spare);
                
            }    
        }
        
        
        $this->Spares();
    }

    
    
    
    
}

?>


