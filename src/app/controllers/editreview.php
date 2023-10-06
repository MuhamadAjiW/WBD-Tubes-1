<?php

namespace app\controllers;

use app\core\Controller;

class EditReview extends Controller{
    public function index(){
        if (isset($_GET['user_id']) && isset($_GET['book_id'])) {
            $reviewmodel = $this->model("ReviewModel");

            $reviewdata = $reviewmodel->fetchReviewByUserNBookID($_GET['book_id'], $_GET['user_id']);

            $this->view('EditReview', ['reviewdata' => $reviewdata]);
        }
    }

    public function edit() {
        if (isset($_POST['user_id']) && isset($_POST['book_id']) && isset($_POST['username']) && isset($_POST['title']) && isset($_POST['rating']) && isset($_POST['reviewtext'])) {
            $reviewmodel = $this->model("ReviewModel");
            $usermodel = $this->model("UserModel");
            $bookmodel = $this->model("BookModel");

            $bookexist = $bookmodel->checkBookExistsByTitle($_POST['title']);
            $userexist = $usermodel->checkUsernameExists($_POST['username']);

            if (count($userexist) > 0) {
                if (count($bookexist) > 0) {
                    $deleterows = $reviewmodel->deleteReview($_POST['book_id'], $_POST['user_id']);

                    if ($deleterows > 0) {
                        $user = $usermodel->fetchUserIDByUsername($_POST['username']);
                        $book = $bookmodel->fetchBookIDByTitle($_POST['title']);
                        $rows = $reviewmodel->addReview($book['book_id'], $user['user_id'], $_POST['rating'], $_POST['reviewtext']);
                        if ($rows) {
                            http_response_code(200);
                            echo json_encode(array("message" => "Edit review success", "redirect" => "/admin/reviews"));
            
                        } else {
                            http_response_code(500);
                            echo json_encode(array("message" => "Edit review failed"));
                        }
                    } else {
                        http_response_code(500);
                        echo json_encode(array("message" => "Edit review failed"));
                    }
                } else {
                    http_response_code(409);
                    echo json_encode(array("message" => "Book doesn't exist"));
                }
            } else {
                http_response_code(409);
                echo json_encode(array("message" => "User doesn't exist"));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Bad request."));
        }
    }
}

?>