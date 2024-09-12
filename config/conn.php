<?php
    include "config.php";
    try {
        $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);

        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
    }
    catch(PDOException $exception){
        echo $exception->getMessage();
    }
?>