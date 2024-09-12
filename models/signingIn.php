<?php
    session_start();
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "../config/conn.php";
        include "functions.php";
        try{
            $response = [];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $encodedPassword=md5($password);
            $usernameExists = usernameExists($username);
            if($usernameExists){
                if($usernameExists->locked==null){
                    $user = findUser($username,$encodedPassword);
                    if($user){
                        $_SESSION['user']=$user;
                        if($user->roleId==1 && $user->password=="872b79d0cc75dffde95e324a38658db9"){
                            $response = ["message"=>$user->username];
                        }
                        else {
                            $response = ["message"=>"You have signed in successfully!"];
                        }
                        $date = date("Y-m-d");
                        $signingInData = $username.";".$date."\n";
                        $signingInLogFile = fopen("../data/signingInLog.txt","a");
                        fwrite($signingInLogFile,$signingInData);
                        fclose($signingInLogFile);
                    }
                    else {
                        $userId = $usernameExists->id;
                        increaseNumberOfWrongSigningInAttempts($userId);
                        $dateAndTime = date("Y-m-d h:i:s A", strtotime("-5 minutes"));
                        $numberOfWrongSigningInAttemptsInTheLastFiveMinutes = getNumberOfWrongSigningInAttemptsInTheLastFiveMinutes($dateAndTime,$userId);
                        if($numberOfWrongSigningInAttemptsInTheLastFiveMinutes->numberOfWrongSigningInAttemptsInTheLastFiveMinutes==3){
                            lockingUser($userId);
                            deletingSigningInAttempts($userId);
                            $response = ["message"=>"Your account is locked!"];
                        }
                        else {
                            $numberOfSigningInAttemptsLeft = 3 - $numberOfWrongSigningInAttemptsInTheLastFiveMinutes->numberOfWrongSigningInAttemptsInTheLastFiveMinutes;
                            $response = ["message"=>"You have entered a wrong password. Number of signing in attempts left: ".$numberOfSigningInAttemptsLeft];
                        }
                    }
                }
                else {
                    $response = ["message"=>"Your account is locked!"];
                }
            }
            else {
                 $response = ["message"=>"There is not an user with that username."];
            }
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