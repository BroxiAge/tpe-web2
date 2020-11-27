<?php

require_once "./View/SpareView.php";
require_once "./Model/SpareModel.php";
require_once "./Model/UserModel.php";



class SpareController{

    private $view;
    private $model;
    private $userModel;

    function __construct(){
        $this->view = new SpareView();
        $this->model = new SpareModel();
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
    
    function EditSpare (){
        $this->checkLoggedIn();
        
        $name = $_POST["input_name"];
        $vehicle = $_POST["input_vehicle"];
        $categorie = $_POST["select_categorie"];
        $price = $_POST["input_price"];
        $description = $_POST["input_description"];
        
        if (($name != '') && ($vehicle!= '') && ($categorie!= '') && ($price!= '')){ //comprueba que no esten los campos vacíos.
            
            $algo = $this->model->getSpareByNameAndVehicle($name,$vehicle); //comprueba si existe en la db.
            if(!isset($algo->name )){ //Se pregunta por el primer item, porque si devolvió de la db, es que existe.
                $this->model->InsertSpare($name,$vehicle,$categorie,$price,$description);  
            }
            else{
                $this->model->modifySpare($name,$vehicle,$categorie,$price,$description);
            }
        }   
        $this->Spares();
        
    }

    function DeleteSpare(){
        $this->checkLoggedIn();

        $name = $_POST["input_name"];
        $vehicle = $_POST["input_vehicle"];
        
        if (($name != '') && ($vehicle!= '')){
            $algo = $this->model->getSpareByNameAndVehicle($name,$vehicle); //comprueba si existe en la db.
            if($algo->name = $name){ //Se pregunta por el primer item, porque si devolvió de la db, es que existe.
                $this->model->deleteSpare($name,$vehicle);  
            }//else{
               // $this->view->showError("El repuesto no existe");
            //}
        }
        $this->Spares();
    }

    
    
    
}

?>


