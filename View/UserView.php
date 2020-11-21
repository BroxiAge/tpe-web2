<?php

require_once "./libs/smarty/Smarty.class.php";

class UserView{

    private $title;
    

    function __construct(){
        $this->title = "Login";
    }

    function ShowLogin($message = ""){

        $smarty = new Smarty();
        $smarty->assign('titulo_s', $this->title);
        $smarty->assign('message', $message);

        $smarty->display('templates/login.tpl'); // muestro el template 
    }

    function showHome($user){
        $smarty = new Smarty();
        $smarty->assign('title', "Canary S.A.");
        $smarty->assign ('user', $user);
        $smarty->display('templates/home.tpl');
    }

    function showContacto($user){
        $smarty = new Smarty();
        $smarty->assign('title', "Contacto");
        $smarty->assign ('user', $user);
        $smarty->display('templates/contacto.tpl');
    }
    
    

    function showUsers($user, $users) {
        $smarty = new Smarty();
        $smarty->assign('title', "Canary S.A.");
        $smarty->assign ('user', $user);
        $smarty->assign ('users', $users);
        $smarty->display('templates/users.tpl');
    }
}
?>