<?php
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "../config/conn.php";
        include "functions.php";
        try{
            $reportId = $_POST['reportId'];
            $comments = showComments($reportId);
            if(count($comments)!=0){
                $commentIds = [];
                foreach($comments as $comment){
                    array_push($commentIds,$comment->commentId);
                }
                deletingComments($reportId,$commentIds);
            }            
            deletingReport($reportId);
            $response = ["message"=>"You have deleted a report successfully!"];
            echo json_encode($response);
            http_response_code(200);
        }
        catch(PDOException $exception){
            http_response_code(500);
        }
    }
    else{
        http_response_code(404);
    }
?>