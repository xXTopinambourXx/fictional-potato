<?php include "../../includes/header.php";?>

<form method="post" action="./signup.php">
    <div class="form-container container">
        <div class="form-name container">
            <label for="name">Name&nbsp;</label><br>
            <input type="text" id="name" name="userName" minlength="2" maxlength="20"/>
        </div>
        <div class="form-mail container">
            <label for="mail">E-mail&nbsp;</label><br>
            <input type="email" id="mail" name="userEmail" />
        </div>
        <div class="form-pswd container">
            <label for="pswd">Password&nbsp;</label><br>
            <input type="password" id="pswd" name="userPswd" minlength="7"/>
        </div>
        <div class="form-confirm-pswd container">
            <label for="conf-pswd">Confirm Password&nbsp;</label><br>
            <input type="password" id="conf-pswd" name="userPswdConf" minlength="7"/>
        </div>
        <div class="form-submit-button container">
            <button type="submit">Sign up</button>
        </div>
        <div class="authentification">
            <?php
                $name = htmlspecialchars($_POST["userName"]);
                $mail = htmlspecialchars($_POST["userEmail"]);
                $pswd = htmlspecialchars($_POST["userPswd"]);
                $confPswd = htmlspecialchars($_POST["userPswdConf"]);

                if($pswd != $confPswd) {
                    echo "<p>Veuillez confirmer <strong>le bon</strong> mot de passe !</p>";
                }
            ?>
        </div>
    </div>
</form>

<?php include "../../includes/footer.php"; ?>