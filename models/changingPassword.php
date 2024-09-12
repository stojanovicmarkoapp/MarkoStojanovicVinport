<?php
 header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "../config/conn.php";
        include "functions.php";
        try{
            $username = $_POST['username'];
            $newPassword = $_POST['newPassword'];
            $encodedNewPassword = md5($newPassword);
            changingPassword($username,$encodedNewPassword);
            $response = ["message"=>"You have successfully changed your password!"];
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