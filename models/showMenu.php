<?php
    session_start();
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        include "../config/conn.php";
        include "functions.php";
        try{
            $jsonMenu = "";
            if(isset($_SESSION['user'])){
                $user = $_SESSION['user'];
                if($user->roleId==1){
                    $jsonMenu = showMenuForStaffMember();
                }
                else {
                    $jsonMenu = showMenuForCommunityMember();
                }
            }
            else{
                $jsonMenu = showMenuForNonSignedInUser();
            }
            echo json_encode($jsonMenu);
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