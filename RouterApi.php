<?php
require_once 'RouterClass.php';
require_once 'api/ApiSparesController.php';

// instacio el router
$router = new Router();

// armo la tabla de ruteo de la API REST
    $router->addRoute('spares', 'GET', 'ApiSparesController', 'getSpares');
    $router->addRoute('spare/:ID', 'GET', 'ApiSparesController', 'getSpare');
    $router->addRoute('spare/:ID', 'DELETE', 'ApiSparesController', 'deleteSpare');
    $router->addRoute('spare', 'POST', 'ApiSparesController', 'insertSpare');
    $router->addRoute('spare/:ID', 'PUT', 'ApiSparesController', 'updateSpare');


 //run
 $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 