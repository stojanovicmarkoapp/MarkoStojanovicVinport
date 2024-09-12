<?php
    if(!isset($_SESSION['user'])){
    $page = "sign in";
?>
<div class="container-fluid lightYellowBackgroundColor">
    <div class="container">
        <form class="d-flex flex-column pt-5 pb-5">
            <h3 class="text-center blackColor pb-4">Signing in form</h3>
            <div class="form-group text-center">
                <label class="blackColor" for="username">Username</label>
                <input type="text" class="form-control blackBackgroundColor lightYellowColor" id="username"/>
            </div>
            <div class="form-group text-center">
                <label class="blackColor" for="password">Password</label>
                <input type="password" class="form-control blackBackgroundColor lightYellowColor" id="password"/>
            </div>
            <button type="button" id="signIn" class="btn btn-primary blackBackgroundColor lightYellowColor">Sign in!</button>
        </form>
    </div>
</div>
<?php
    }
    else {
        header("Location: index.php?page=404");
    }
?>