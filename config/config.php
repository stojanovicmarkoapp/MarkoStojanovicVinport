<?php
    define("SERVER", env("SERVER"));
    define("DATABASE", env("DATABASE"));
    define("USERNAME", env("USERNAME"));
    define("PASSWORD", env("PASSWORD"));
    function env($flag){
        $envFileData = file("http://127.0.0.1/MarkoStojanovicVinport/config/.env",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $flagValue = "";
        foreach($envFileData as $pieceOfEnvFileData){
            list($key, $value) = explode("=", $pieceOfEnvFileData);
            if($key == $flag){
                $flagValue = $value;
            }
        }  
        return $flagValue;
    }
?>