<?php
    if($_SESSION['user']->roleId==1){
    $page = "dashboard";
?>
<div class="container-fluid pt-5 pb-5 lightYellowBackgroundColor">
    <div class="container pt-5 pt-md-0">
        <div class="row pt-3 pt-md-0">
            <div class="col-12 d-flex justify-content-between">
                <a href="index.php?page=crudReports" id="crudReports" class="blackColor" data-toggle="tooltip" data-placement="top" title="Click on link bellow to create, update or delete reports."><span class="bi bi-file-earmark-richtext-fill"></span></a>
                <a href="index.php?page=crudUsers" id="crudUsers" class="blackColor" data-toggle="tooltip" data-placement="top" title="Click on link bellow to create, update or delete users."><span class="bi bi-file-earmark-person-fill"></span></a>
                <a href="index.php?page=statistics" id="statistics" class="blackColor" data-toggle="tooltip" data-placement="top" title="Click on link bellow to see current site statistics."><span class="bi bi-clipboard-data"></span></a>
            </div>
        </div>
    </div>
</div>
<?php
    }
    else {
        header("Location: index.php?page=404");
    }
?>