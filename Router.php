<?php
    require_once 'RouterClass.php';
    require_once 'controller.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "controller", "Home");

    //Esto lo veo en TasksView


    //Ruta por defecto.
    $r->setDefaultRoute("controller", "Home");

    //Advance


    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>