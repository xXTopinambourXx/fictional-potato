<?php

$cssPaths = ["../../../stylesheets/pages/users/form.css"];
$pageTitle = "Register";
$isSubmitted = isset($_POST["userName"]);

if ($isSubmitted)
    include_once "../../../controllers/pages/users/login.php";

include_once "../../includes/header.php";

$hasError = isset($errorState);
?>

<?php if (($_GET["a"] ?? "") == "register") { ?>
    <form method="post" action="./login.php?a=register">
        <div class="form-container container">

            <div class="form-name container">
                <label for="name">Username&nbsp;</label><br>
                <input type="text" id="name" placeholder="Username" name="userName" maxlength="255" required />
                <?php if ($hasError && $errorState == "USERNAME_OUT_OF_RANGE") { ?>
                    <p>Username out of range</p>
                <?php } ?>
            </div>

            <div class="form-mail container">
                <label for="mail">Email address&nbsp;</label><br>
                <input type="email" id="mail" placeholder="Email address" name="userEmail" required />
                <?php if ($hasError) { ?>
                    <?php if ($errorState == "EMAIL_INVALID" ) { ?>
                        <p>E-mail invalid</p>
                    <?php } else if ($errorState == "EMAIL_ALREADY_EXISTS") { ?>
                        <p>E-mail already exists</p>
                    <?php }
                    } ?>
            </div>

            <div class="form-pswd container">
                <label for="pswd">Password&nbsp;</label><br>
                <input type="password" id="pswd" placeholder="Password" name="userPswd" maxlength="255" required />
                <?php if ($hasError && $errorState == "PASSWORD_OUT_OF_RANGE") { ?>
                    <p>Password out of range</p>
                <?php } ?>
            </div>

            <div class="form-confirm-pswd container">
                <label for="conf-pswd">Confirm Password&nbsp;</label><br>
                <input type="password" id="conf-pswd" name="userPswdConf" minlength="7" required />
            </div>

            <div class="form-submit-button container">
                <input type="submit" value="Sign In" />
            </div>

            <div class="authentification">
                <?php
                if ($hasError && $errorState == "PASSWORD_NOT_MATCH") {
                    echo "<p>Veuillez confirmer <strong>le bon</strong> mot de passe !</p>";
                }
                ?>
            </div>
        </div>
    </form>
<?php } else { ?>
    <!-- en php: sinon afficher le formulaire sign in -->
    <form method="post" action="./login.php">
        <div class="form-container container">
            <div class="form-mail container">
                <label for="mail">Email address&nbsp;</label><br>
                <input type="email" id="mail" placeholder="Email address" name="userEmail" required />
                <?php if ($hasError && $errorState == "EMAIL_INVALID") { ?>
                    <p style="color:red">E-mail invalid</p>
                <?php } ?>
            </div>
            <div class="form-pswd container">
                <label for="pswd">Password&nbsp;</label><br>
                <input type="password" id="pswd" placeholder="Password" name="userPswd" maxlength="255" required />
                <?php if ($hasError && $errorState == "PASSWORD_OUT_OF_RANGE") { ?>
                    <p style="color:red">Password out of range</p>
                <?php } ?>
            </div>
        </div>
    </form>
<?php } ?>

<?php
include_once("../../includes/footer.php");
?>