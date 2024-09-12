<?php
    session_start();
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "../config/conn.php";
        include "functions.php";
        try{
            $response = [];
            $errors = [];
            if(isset($_FILES['carImage'])){
                $carName = null;
                $carManufacturer = null;
                $carEpoch = null;
                if(!empty($_POST['carName'])){
                    $carName = $_POST['carName'];
                }
                if(!empty($_POST['carManufacturer'])){
                    $carManufacturer = $_POST['carManufacturer'];
                }
                if(!empty($_POST['carEpoch'])){
                    $carEpoch = $_POST['carEpoch'];
                }
                $carImage = $_FILES['carImage'];
                $carImageName = time()."Contribution".$carImage['name'];
                $carImagePath = "../assets/img/".$carImageName;
                $carImageTmpName = $carImage['tmp_name'];
                $carImageMimeType = mime_content_type($carImageTmpName);
                if($carImageMimeType=="image/jpeg") {
                    if($carImage["size"] >= 32000) {
                        $errors[]="Your image is too large. Upload only an image up to 32KB.";
                    }
                }
                else {
                    $errors[]="You have not uploaded allowed type of file. Upload only a JPEG image.";
                } 
            }
            else {
                $errors[]="You have to upload image!";
            }
            
            if(count($errors)==0){
                move_uploaded_file($carImageTmpName,$carImagePath);
                $userId = $_SESSION['user']->id;
                contributing($carName,$carManufacturer,$carEpoch,$carImageName,$userId);
                $response = ["message"=>"You have made a contribution successfully!"];
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