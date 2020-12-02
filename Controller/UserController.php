<?php

require_once "./View/UserView.php";
require_once "./Model/UserModel.php";
require_once "./Model/ComentariesModel.php";

class UserController{

    private $view;
    private $model;
    private $userModel;
 

    function __construct(){
        $this->view = new UserView();
        $this->model = new UserModel();
        $this->userModel = new UserModel();
        $this->comentariesModel = new ComentariesModel();
    }

    function Login(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
      
        $this->view->ShowLogin();

    }

    function Logout(){
        session_start();
        session_destroy();
        header("Location: ".LOGIN);

    }

    function Home(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION["USER"])){
            $user= $this->userModel->GetUser($_SESSION["USER"]);
        }else{
            $user = $this->userModel->GetUser("invitado");
        }
        $this->view->showHome($user);
    }

    function Contacto(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION["USER"])){
            $user= $this->userModel->GetUser($_SESSION["USER"]);
        }else{
            $user = $this->userModel->GetUser("invitado");
        }
        $this->view->showContacto($user);
    }

    function VerifyUser(){
        $user = $_POST["input_user"];
        $pass = $_POST["input_pass"];

        if(isset($user)){
            $userFromDB = $this->model->GetUser($user);

            if(isset($userFromDB) && $userFromDB){
                // Existe el usuario

                if (password_verify($pass, $userFromDB->password)){

                    session_start();
                    $_SESSION["USER"] = $userFromDB->name;
                    $_SESSION['LAST_ACTIVITY'] = time();

                    header("Location: ".BASE_URL."home");
                }else{
                    $this->view->ShowLogin("Contraseña incorrecta");
                }

            }else{
                // No existe el user en la DB
                $this->view->ShowLogin("El usuario no existe");
            }
        }
    }

    function RegisterUser(){
        $user = $_POST["input_register_user"];
        $pass = $_POST["input_register_pass"];

        if( ($user != '') && ($pass != '') ){
            $userFromDB = $this->model->GetUser($user);
            
            if (!isset($userFromDB->name)){
                $passHash = password_hash ($pass , PASSWORD_DEFAULT );
                $this->model->insertNewUser($user, $passHash);
                
                session_start();
                $_SESSION["USER"] = $user;
                $_SESSION['LAST_ACTIVITY'] = time();

                header("Location: ".BASE_URL."home");
            }
            else{
                $this->view->ShowLogin('El usuario ya existe ');
            }
        
        } else {
            $this->view->ShowLogin('Por favor, ingrese usuario y contraseña ');
        }
    }
        
    function Users() {
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(isset($_SESSION["USER"])){
            $user = $this->model->GetUser($_SESSION["USER"]);
        
            if ($user->rol == 1){
                $users = $this->model->getUsers();
                $this->view->showUsers($users, $user);
            }    
        }
        else{
            echo 'no hay nada en SESSION';
        }
    }

    function ModifyRol($params = null){
        $id_user = $params[':ID'];
        $userFromDB = $this->model->GetUserById($id_user);
        $rolActual = $userFromDB->rol;
        if ($rolActual == 1){
            $nuevoRol = 0;
            $this->model->editRol($nuevoRol, $id_user);
        }elseif ($rolActual == 0) {
            $nuevoRol = 1;
            $this->model->editRol($nuevoRol, $id_user);
        }else{
            echo 'no te pases de piyo';
        }
        
        $this->Users();
    }

    function deleteUser($params = null){
        $id_user = $params[':ID'];
       
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(isset($_SESSION["USER"])){
            $user = $this->model->GetUser($_SESSION["USER"]);
        
            if ($user->rol == 1){
                $this->model->deleteUser($id_user);
                $this->comentariesModel->deleteCommentaryByUsrId($id_user);
                
            }    
        }
        $this->Users();
        
    }



    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    







}
?>