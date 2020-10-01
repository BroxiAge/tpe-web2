<?php
require_once "./libs/smarty/Smarty.class.php";
function showHome(){
    $smarty = new Smarty();
  
  
    $smarty->display('templates/tasks.tpl'); // muestro el template 
}

?>