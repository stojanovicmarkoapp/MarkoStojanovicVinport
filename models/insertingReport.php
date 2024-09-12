<?php
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "../config/conn.php";
        include "functions.php";
        try{
            $response = [];
            $errors = [];
            $title = $_POST['title'];
            $carName = $_POST['carName'];
            $size = $_POST['size'];
            $manufacturer = $_POST['manufacturer'];
            $country = $_POST['country'];
            $epoch = $_POST['epoch'];
            $reportKernel = $_POST['reportKernel'];
            if($title==""){
                $errors[]="The field for the title must not be left blank!";
            }
            if($carName==""){
                $errors[]="The field for the car name must not be left blank!";
            }
            if($size==""){
                $errors[]="The field for the size must not be left blank!";
            }
            if($manufacturer==""){
                $errors[]="The field for the manufacturer must not be left blank!";
            }
            if($country==""){
                $errors[]="The field for the country must not be left blank!";
            }
            if($epoch==""){
                $errors[]="The field for the epoch must not be left blank!";
            }
            if($reportKernel==""){
                $errors[]="The field for the report kernel must not be left blank!";
            }
            if(isset($_FILES['carImage'])){
                $carImage = $_FILES['carImage'];
                $carImageName = time()."Inserting".$carImage['name'];
                $carImagePath = "../assets/img/".$carImageName;
                $carImageTmpName = $carImage['tmp_name'];
                $carImageMimeType = mime_content_type($carImageTmpName);
                if($carImageMimeType=="image/jpeg") {
                    if($carImage["size"] >= 32000) {
                        $errors[]="Your image is too large. Upload only an image up to 32KB.";
                    }
                    else {
                        move_uploaded_file($carImageTmpName,$carImagePath);
                        $carImageSize = getimagesize($carImagePath);
                        $carImageWidth = $carImageSize[0];
                        $carImageHeight = $carImageSize[1];
                        $carThumbImageWidth = 510;
                        $carThumbImageHeight = $carImageHeight/($carImageWidth/$carThumbImageWidth);
                        $carImageResource = imagecreatefromjpeg($carImagePath);
                        $carThumbImageCanvas = imagecreatetruecolor($carThumbImageWidth,$carThumbImageHeight);
                        imagecopyresampled($carThumbImageCanvas,$carImageResource,0,0,0,0,$carThumbImageWidth,$carThumbImageHeight,$carImageWidth,$carImageHeight);
                        $carThumbImageName = time()."InsertingThumb".$carImage['name'];
                        $carThumbImagePath="../assets/img/".$carThumbImageName;
                        imagejpeg($carThumbImageCanvas,$carThumbImagePath);
                    }
                }
                else {
                    $errors[]="You have not uploaded allowed type of file. Upload only a JPEG image.";
                } 
            }
            else {
                $errors[]="You have not uploaded an image.";
            }
            if(count($errors)==0){
                $sizeExists = sizeExists($size);
                $manufacturerExists = manufacturerExists($manufacturer);
                $countryExists = countryExists($country);
                $epochExists = epochExists($epoch);
                if(!$sizeExists){
                    $addingSize = addingSize($size);
                }
                $sizeId = getSizeId($size)->id;
                if(!$manufacturerExists){
                    $addingManufacturer = addingManufacturer($manufacturer);
                }
                $manufacturerId = getManufacturerId($manufacturer)->id;
                if(!$countryExists){
                    $addingCountry = addingCountry($country);
                }
                $countryId = getCountryId($country)->id;
                if(!$epochExists){
                    $addingEpoch = addingEpoch($epoch);
                }
                $epochId = getEpochId($epoch)->id;
                insertingReport($title,$carName,$carImageName,$carThumbImageName,$sizeId,$manufacturerId,$countryId,$epochId,$reportKernel);
                $response = ["message"=>"You have inserted a report successfully!"];
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