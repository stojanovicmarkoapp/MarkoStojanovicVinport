 <?php
    ob_start();
    session_start();
    include "config/conn.php";
    include "models/functions.php";
    include "views/fixed/header.php";
    include "views/fixed/carousel.php";
    if(isset($_GET['page'])){
        if($_GET['page']=="signIn"){
            include "views/pages/signIn.php";
        }
        if($_GET['page']=="signUp"){
            include "views/pages/signUp.php";
        }
        if($_GET['page']=="contribute"){
            include "views/pages/contribute.php";
        }
        if($_GET['page']=="reports"){
            include "views/pages/reports.php";
        }
        if($_GET['page']=="dashboard"){
            include "views/pages/dashboard.php";
        }
        if($_GET['page']=="crudReports"){
            include "views/pages/crudReports.php";
        }
        if($_GET['page']=="crudUsers"){
            include "views/pages/crudUsers.php";
        }
        if($_GET['page']=="author"){
            include "views/pages/author.php";
        }
        if($_GET['page']=="statistics"){
            include "views/pages/statistics.php";
        }
        if($_GET['page']=="404"){
            include "views/pages/404.php";
        }
    }
    else {
        include "views/pages/index.php";
    }
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $dateAndTime = date("Y-m-d h:i:s A");
    $accessData = $ipAddress.";".$page.";".$dateAndTime."\n";
    $accessLogFile = fopen("data/accessLog.txt","a");
    fwrite($accessLogFile,$accessData);
    fclose($accessLogFile);
    include "views/fixed/footer.php";
?>