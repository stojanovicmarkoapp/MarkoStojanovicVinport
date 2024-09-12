<?php
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        include "../config/conn.php";
        include "functions.php";
        try{
            $pieceOfInformationId = $_GET['pieceOfInformationId'];
            $jsonAuthorInformation2 = showAuthorInformation2($pieceOfInformationId);
            echo json_encode($jsonAuthorInformation2);
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