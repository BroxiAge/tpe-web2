<?php

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


require_once "Controller/TasksController.php";

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

// parsea la accion Ej: sumar/1/2 --> ['sumar', 1, 2]
$params = explode('/', $action);

$controller = new TasksController();

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home': 
        $controller->Home(); 
        break;
    case '': 
        $controller->Home(); 
        break;
    case 'insert': 
        $controller->InsertTask(); 
        break;
    case 'borrar': 
        $controller->BorrarLaTaskQueVienePorParametro($params[1]); 
        break;
    case 'completar': 
        $controller->MarkAsCompletedTask($params[1]); 
        break;
    default: 
        echo('404 Page not found'); 
        break;
}





?>