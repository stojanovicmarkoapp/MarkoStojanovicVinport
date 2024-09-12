<?php
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        include "../config/conn.php";
        include "functions.php";
        try{
            $sizeIds = null;
            $manufacturerIds = null;
            $countryIds = null;
            $epochIds = null;
            $name = null;
            $sortingCategoryId = null;
            $limit = 0;
            if(!empty($_GET['sizeIdsString'])){
                $sizeIds = explode(",",$_GET['sizeIdsString']);
            }
            if(!empty($_GET['manufacturerIdsString'])){
                $manufacturerIds = explode(",",$_GET['manufacturerIdsString']);
            }
            if(!empty($_GET['countryIdsString'])){
                $countryIds = explode(",",$_GET['countryIdsString']);
            }
            if(!empty($_GET['epochIdsString'])){
                $epochIds = explode(",",$_GET['epochIdsString']);
            }
            if(!empty($_GET['name'])||(isset($_GET['name']) && $_GET['name']==0)){
                $name = $_GET['name'];
            }
            if(!empty($_GET['sortingCategoryId'])){
                $sortingCategoryId = $_GET['sortingCategoryId'];
            }
            if(!empty($_GET['limit'])){
                $limit = $_GET['limit'];
            }
            $jsonReports = showReports($sizeIds,$manufacturerIds,$countryIds,$epochIds,$name,$sortingCategoryId,$limit);
            $jsonNumberOfReports = showNumberOfReports($sizeIds,$manufacturerIds,$countryIds,$epochIds,$name);
            $jsonPages = ceil($jsonNumberOfReports->numberOfReports/OFFSET);
            // if(isset($_GET['limit'])){
            //     $limit = $_GET['limit'];
            //     $jsonReports = showReports($limit);
            // }
            // else{
            //     $jsonReports = showReports();
            // }
            // $jsonPages = showPages();
            echo json_encode([
                "reports"=>$jsonReports,
                "pages"=>$jsonPages
                //"pages"=>$jsonPages
            ]);
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