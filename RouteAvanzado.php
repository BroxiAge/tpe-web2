<?php
    require_once 'Controller/TasksController.php';
    require_once 'Controller/TasksAdvanceController.php';
    require_once 'Controller/UserController.php';
    require_once 'Controller/TestController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');


    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "TasksController", "Home");
    $r->addRoute("login", "GET", "UserController", "Login");
    $r->addRoute("logout", "GET", "UserController", "Logout");

    $r->addRoute("verifyUser", "POST", "UserController", "VerifyUser");

    $r->addRoute("mermelada", "GET", "TasksController", "Home");
    //TEST
    $r->addRoute("test", "GET", "TestController", "ShowText");
    $r->addRoute("llenarForm", "POST", "TestController", "EditarForm");
    $r->addRoute("tabla", "GET", "TestController", "MostrarTabla");

    //Esto lo veo en TasksView
    $r->addRoute("insert", "POST", "TasksController", "InsertTask");

    $r->addRoute("delete/:ID", "GET", "TasksController", "BorrarLaTaskQueVienePorParametro");
    $r->addRoute("completar/:ID", "GET", "TasksController", "MarkAsCompletedTask");
    $r->addRoute("edit/:ID", "GET", "TasksController", "EditTask");

    //Ruta por defecto.
    $r->setDefaultRoute("TasksController", "Home");

    //Advance
    $r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>