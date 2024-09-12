<?php
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        include "../config/conn.php";
        include "functions.php";
        try{
            $reportId = $_GET['reportId'];
            $jsonComments = showComments($reportId);
            echo json_encode($jsonComments);
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