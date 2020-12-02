<?php
    require_once 'Controller/SpareController.php';
    require_once 'Controller/CategoriesController.php';
    require_once 'Controller/UserController.php';
    require_once 'RouterClass.php';


    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');


    $r = new Router();

    
    $r->addRoute("spares", "GET", "SpareController", "Spares");
    $r->addRoute("home", "GET", "UserController", "Home");
    $r->addRoute("contacto", "GET", "UserController", "Contacto");
    $r->addRoute("producto/:ID", "GET", "SpareController", "SpareDetail"); 
    
    $r->addRoute("edit", "POST", "SpareController", "EditSpare"); 
    $r->addRoute("delete/:ID", "GET", "SpareController", "DeleteSpare"); 
    $r->addRoute("editar/:ID", "POST", "SpareController", "EditarSpare");



    $r->addRoute("categories", "GET", "CategoriesController", "Categories");
    $r->addRoute("categories/:ID", "GET", "CategoriesController", "FilterByCategorie");
    $r->addRoute("addCategorie", "POST", "CategoriesController", "AddCategorie");
    $r->addRoute("deleteCategorie/:ID", "GET", "CategoriesController", "DeleteCategorie");
    $r->addRoute("modifyCategorie/:ID", "POST", "CategoriesController", "ModifyCategorie");
    
    $r->addRoute("verifyUser", "POST", "UserController", "VerifyUser");
    $r->addRoute("registerUser", "POST", "UserController", "RegisterUser");
    $r->addRoute("users", "GET", "UserController", "Users");
    $r->addRoute("modifyRol/:ID", "GET", "UserController", "ModifyRol");
    $r->addRoute("deleteUser/:ID", "GET", "UserController", "deleteUser");

    
    
    

    $r->addRoute("logout", "GET", "UserController", "Logout");
    $r->addRoute("login", "GET", "UserController", "Login");
    
    
    
    
   

    //Ruta por defecto.
    $r->setDefaultRoute("UserController", "Home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>