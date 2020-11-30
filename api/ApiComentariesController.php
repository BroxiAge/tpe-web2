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
            $this->view->response("", 404);
    }
    
    public function insertCommentary(){
        
        $body = $this->getData(); //es un OBJ
        $ok =$this->model->insertCommentary($body->commentary, $body->score, $body->id_user, $body->id_spare);
        
        if (!empty($ok)) // verifica si la tarea existe
            $this->view->response( $this->model->getCommentary($ok), 201);
        else
            $this->view->response("El comentario no se pudo insertar", 404);
    }

    public function deleteCommentary($params = null) {
        $id = $params[':ID'];
        $result =  $task = $this->model->deleteCommentaryById($id);

        if($result > 0)
            $this->view->response("La tarea con el id=$id fue eliminada", 200);
        else
            $this->view->response("La tarea con el id=$id no existe", 404);
    }
    
    public function getRol() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION["USER"])){
            $user= $this->userModel->GetUser($_SESSION["USER"]);
        }else{
            $user = $this->userModel->GetUser("invitado");
        }
        
        if ($user) // verifica si la tarea existe
            $this->view->response($user->rol, 200);
        else
            $this->view->response("", 404);


    }




}
                                                    
                                                    