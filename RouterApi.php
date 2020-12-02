<?php
require_once 'RouterClass.php';
require_once 'api/ApiComentariesController.php';

// instacio el router
$router = new Router();

// armo la tabla de ruteo de la API REST
    

    $router->addRoute('comentaries/:ID', 'GET', 'ApiComentariesController', 'getComentaries');
    $router->addRoute('comentaries', 'POST', 'ApiComentariesController', 'insertCommentary');
    $router->addRoute('comentaries/:ID', 'DELETE', 'ApiComentariesController', 'deleteCommentary');
    $router->addRoute('rol', 'GET', 'ApiComentariesController', 'getRol');

 //run
 $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 
 