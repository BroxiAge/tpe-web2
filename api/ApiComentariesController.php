<?php
require_once './Model/ComentariesModel.php';
require_once 'ApiController.php';
require_once "./Model/UserModel.php";

class ApiComentariesController extends ApiController {

  
    function __construct() {
        parent::__construct();
        $this->model = new ComentariesModel();
        $this->userModel = new UserModel();
        $this->view = new APIView();
        
    }

   

    public function getComentaries($params = null){
        $product_id = $params[':ID'];
        $ComentariesByProductId = $this->model->getComentariesByProductId($product_id);
        foreach ($ComentariesByProductId as $commentary){
            $user = $this->userModel->GetUserById($commentary->id_usuarios);
            $commentary->id_usuarios = $user->name;
        }

        if ($ComentariesByProductId) // verifica si la tarea existe
            $this->view->response($ComentariesByProductId, 200);
        else
            $this->view->response([], 404);
    }
    
    public function insertCommentary(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $spare_id = $_SESSION['SPARE'];
        if(isset($_SESSION["USER"])){
            $userFromDb = $this->userModel->GetUser($_SESSION["USER"]);
        }
        $user = $userFromDb->id_user;
        $body = $this->getData(); //es un OBJ
        $ok =$this->model->insertCommentary($body->commentary, $body->score, $user,$spare_id);
        
        if (!empty($ok)) // verifica si la tarea existe
            $this->view->response( $this->model->getCommentary($ok), 201);
        else
            $this->view->response("El comentario no se pudo insertar", 404);



    }
    



}
                                                    
                                                    