<?php

require_once "./View/UserView.php";
require_once "./Model/UserModel.php";


class UserController{

    private $view;
    private $model;
    private $userModel;
 

    function __construct(){
        $this->view = new UserView();
        $this->model = new UserModel();
        $this->userModel = new UserModel();
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
                
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                
                    $newUser = $this->userModel->GetUser($user);    
                    $this->view->ShowHome($newUser);
                }
            }
            else{
                echo 'usr ya existe';
            }
        
        } else {
            echo 'escribi algo';
        }
    }
        
        function Users() {
            
            if(isset($_SESSION["USER"])){
                $user = $this->Model->GetUser($_SESSION["USER"]);
            
                if ($user->rol == 1){
                    $users = $this->userModel->getUsers();
                    $this->view->showUsers($users);
                }    
            }
            else{
                echo 'no hay nada en SESSION';
            }
        }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    







}
?>