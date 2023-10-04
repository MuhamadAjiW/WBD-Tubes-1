<?php

namespace app\controllers;

use app\models\UserModel;
use app\core\Controller;

class AddUser extends Controller{
    public function index(){
        $this->view('AddUser', ['name' => 'Hello!']);
    }
    
    public function add() {
        if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['bio']) && isset($_POST['admin'])) {
            $usermodel = $this->model("UserModel");
            
            $usernameexist = $usermodel->checkUsernameExists($_POST['username']);

            if ($usernameexist) {
                http_response_code(409);
                echo json_encode(array("message" => "Username can't be the same"));
            } else {
                $rows = $usermodel->addUser($_POST['email'], $_POST['username'], $_POST['password'], $_POST['name'], $_POST['bio'], $_POST['admin']);

                if ($rows) {
                    http_response_code(200);
                    echo json_encode(array("message" => "Add user success"));
                } else {
                    http_response_code(500);
                    echo json_encode(array("message" => "Add user failed"));
                }
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Bad request."));
        }
    }
}

?>