<?php
    if(!isset($_SESSION['user'])){
    $page = "sign up";
?>
<div class="container-fluid lightYellowBackgroundColor">
    <div class="container">
        <form class="d-flex flex-column  pt-5 pb-5">
            <h3 class="text-center blackColor pb-4">Signing up form</h3>
            <div class="form-row">
                <div class="form-group col-md-6 text-center">
                    <label class="blackColor" for="firstName">First name</label>
                    <input type="text" class="form-control blackBackgroundColor lightYellowColor" id="firstName"/>
                    <small id="firstNameNote" class="form-text"></small>
                </div>
                <div class="form-group col-md-6 text-center">
                    <label class="blackColor" for="lastName">Last name</label>
                    <input type="text" class="form-control  blackBackgroundColor lightYellowColor" id="lastName"/>
                    <small id="lastNameNote" class="form-text"></small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 text-center">
                    <label class="blackColor" for="emailAddress">Email address</label>
                    <input type="text" class="form-control blackBackgroundColor lightYellowColor" id="emailAddress"/>
                    <small id="emailAddressNote" class="form-text"></small>
                </div>
                <div class="form-group col-md-6 text-center">
                    <label class="blackColor" for="username">Username</label>
                    <input type="text" class="form-control  blackBackgroundColor lightYellowColor" id="username"/>
                    <small id="usernameNote" class="form-text"></small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 text-center">
                    <label class="blackColor" for="password">Password</label>
                    <input type="password" class="form-control blackBackgroundColor lightYellowColor" id="password"/>
                    <small id="passwordNote" class="form-text"></small>
                </div>
                <div class="form-group col-md-6 text-center">
                    <label class="blackColor" for="confirmPassword">Confirm password</label>
                    <input type="password" class="form-control  blackBackgroundColor lightYellowColor" id="confirmPassword"/>
                    <small id="confirmPasswordNote" class="form-text"></small>
                </div>
            </div>
            <button type="button" id="signUp" class="btn btn-primary blackBackgroundColor lightYellowColor">Sign up!</button>
        </form>
    </div>
</div>
<?php
    }
    else {
        header("Location: index.php?page=404");
    }
?>