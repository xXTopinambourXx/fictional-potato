<?php

$cssPaths = ["../../../stylesheets/pages/users/form.css"];
$pageTitle = "Register";
$isSubmitted = isset($_POST["userName"]);

if ($isSubmitted) 
    include_once "../../../controllers/pages/users/signup.php";

include_once "../../includes/header.php";

$hasError = isset($errorState);
?>

<form method="post" action="./signup.php">
    <div class="form-container container">
        <div class="form-name container">
            <label for="name">Name&nbsp;</label><br>
            <input type="text" id="name" name="userName" minlength="3" required/>
            <?php if($hasError && $errorState == "USERNAME_OUT_OF_RANGE"){ ?>
                <p style="color:red">Username out of range</p>
            <?php } ?>
        </div>
        <div class="form-mail container">
            <label for="mail">E-mail&nbsp;</label><br>
            <input type="email" id="mail" name="userEmail" required/>
            <?php if($hasError && $errorState == "EMAIL_INVALID"){ ?>
                <p style="color:red">E-mail invalid</p>
            <?php } ?>
        </div>
        <div class="form-pswd container">
            <label for="pswd">Password&nbsp;</label><br>
            <input type="password" id="pswd" name="userPswd" minlength="7" required/>
            <?php if($hasError && $errorState == "PASSWORD_OUT_OF_RANGE"){ ?>
                <p style="color:red">Password out of range</p>
            <?php } ?>
        </div>
        <div class="form-confirm-pswd container">
            <label for="conf-pswd">Confirm Password&nbsp;</label><br>
            <input type="password" id="conf-pswd" name="userPswdConf" minlength="7" required/>
        </div>
        <div class="form-submit-button container">
            <button type="submit">Sign up</button>
        </div>
        <div class="authentification">
            <?php
                if($hasError && $errorState == "PASSWORD_NOT_MATCH") {
                    echo "<p>Veuillez confirmer <strong>le bon</strong> mot de passe !</p>";
                }
            ?>
        </div>
    </div>
</form>

<?php include "../../includes/footer.php"; ?>