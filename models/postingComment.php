<?php
    session_start();
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "../config/conn.php";
        include "functions.php";
        try{
            $reportId = $_POST['reportId'];
            $comment = $_POST['comment'];
            $userId = $_SESSION['user']->id;
            $dateAndTime = date("Y-m-d h:i:s A");
            $errors = [];
            if($comment == ""){
                $errors[]="The field for the comment must not be left blank!";
            }
            if(count($errors)==0){
                postingComment($userId,$comment,$dateAndTime,$reportId);
                $response = ["message"=>"You have successfully added a comment!"];
                echo json_encode($response);
                http_response_code(200);
            }
            else {
                $response = ["message"=>$errors];
                echo json_encode($response);
                http_response_code(200);
            }
        }
        catch(PDOException $exception){
            http_response_code(500);
        }
    }
    else{
        http_response_code(404);
    }
?>