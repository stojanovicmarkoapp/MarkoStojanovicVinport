<?php
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "../config/conn.php";
        include "functions.php";
        try{
            if(!empty($_POST['userLineToDeleteString'])){
                $userLineToDelete = explode(",",$_POST['userLineToDeleteString']);
                deletingUsers($userLineToDelete);
                $response = ["message"=>"You have deleted users successfully!"];
                echo json_encode($response);
                http_response_code(200);
            }
            else {
                $response = ["message"=>"You have not put any users in the line to delete!"];
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