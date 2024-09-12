<?php  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "../config/conn.php";
        include "functions.php";
        header("Content-type: text/csv; charset=utf-8");   
        header('Content-Disposition: attachment; filename=reports.csv');
        try{
            $reports = getReports();
            $excelFile = fopen("php://output", "w");
            fputcsv($excelFile, ['title','carName','sizeName','manufacturerName','countryName','epochName','reportKernel']);
            foreach($reports as $report){
                fputcsv($excelFile, (array)$report);
            }
            fclose($excelFile);
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