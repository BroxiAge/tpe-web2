<?php
require_once "libs/smarty/Smarty.class.php";

class controller{
    function Home(){
        $smarty = new Smarty();
      
      
        $smarty->display('home.tpl'); // muestro el template 
    }
}


?>