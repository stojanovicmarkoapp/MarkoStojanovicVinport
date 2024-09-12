<?php
    if(isset($_SESSION['user'])){
    $page = "contribute";
?>
<div class="container-fluid lightYellowBackgroundColor">
    <div class="container">
        <form class="d-flex flex-column pt-5 pb-5" enctype="multipart/form-data">
            <h3 class="text-center blackColor pb-4">Contribution form</h3>
            <div class="form-group text-center">
                <label class="blackColor" for="carName">Car name</label>
                <input type="text" class="form-control blackBackgroundColor lightYellowColor" id="carName"/>
            </div>
            <div class="form-group text-center">
                <label class="blackColor" for="carManufacturer">Car manufacturer</label>
                <input type="text" class="form-control blackBackgroundColor lightYellowColor" id="carManufacturer"/>
            </div>
            <div class="form-group text-center">
                <label class="blackColor" for="carEpoch">Car epoch</label>
                <input type="text" class="form-control blackBackgroundColor lightYellowColor" id="carEpoch"/>
            </div>
            <div class="form-group text-center">
                <label class="blackColor" for="carImage">Car image</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="carImage"/>
                    <label for="carImage" class="custom-file-label blackBackgroundColor lightYellowColor">Choose file</label>
                </div>
                <small id="carImageNote" class="form-text"></small>
            </div>
            <button type="button" id="contribute" class="btn btn-primary blackBackgroundColor lightYellowColor">Contribute!</button>
        </form>
    </div>
</div>
<?php
    }
    else {
        header("Location: index.php?page=404");
    }
?>