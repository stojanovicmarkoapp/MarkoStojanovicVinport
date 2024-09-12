<?php
 header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "../config/conn.php";
        include "functions.php";
        try{
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $emailAddress = $_POST['emailAddress'];
            $subjectId = $_POST['subjectId'];
            $message = $_POST['message'];
            $errors = [];
            if($firstName == ""){
                $errors[]="The field for the first name must not be left blank!";
            }
            else if(!preg_match("/^[A-ZČĆŽŠĐ][A-zČĆŽŠĐčćžšđ']+([ ][A-ZČĆŽŠĐ][A-zČĆŽŠĐčćžšđ']+)*$/",$firstName)){
                $errors[]="You have not filled the field for the first name properly. Example: Al McKay";
            }
            if($lastName == ""){
                $errors[]="The field for the last name must not be left blank!";
            }
            else if(!preg_match("/^[A-ZČĆŽŠĐ][A-zČĆŽŠĐčćžšđ']+([ ][A-ZČĆŽŠĐ][A-zČĆŽŠĐčćžšđ']+)*$/",$lastName)){
                $errors[]="You have not filled the field for the last name properly. Example: O'Bryant Junior";
            }
            if($emailAddress == ""){
                $errors[]="The field for the email address must not be left blank!";
            }
            else if(!preg_match("/^(?=.{6,30}@)[0-9a-z]+(?:\.[0-9a-z]+)*@[a-z0-9]{2,}(?:\.[a-z]{2,})+$/",$emailAddress)){
                $errors[]="You have not filled the field for the email address properly. Example: 1james.caa1n@3mail.co.us";
            }
            if($subjectId == 0){
                $errors[]="You have to select a subject matter. Example: Compliment";
            }
            if($message == ""){
                $errors[]="The field for the message must not be left blank!";
            }
            if(count($errors)==0){
                $sendingMessage = sendingMessage($firstName,$lastName,$emailAddress,$subjectId,$message);
                $response = ["message"=>"You have sent your message successfully!"];
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