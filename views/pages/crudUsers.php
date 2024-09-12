<?php
    if($_SESSION['user']->roleId==1){
    $page = "crud reports";
?>
<div class="container-fluid lightYellowBackgroundColor pt-5 pt-md-0">
    <div class="container pt-5 pt-md-0">
        <div class="row pt-3 pt-md-0">
            <div class="col-12">
                <table id="users" class="w-100">
                </table>
                <div id="userModals">
                </div>
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