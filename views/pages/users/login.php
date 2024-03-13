<?php include "../../includes/header.php"; ?>

<form method="post" action="./data.php">
    <div class="form-container container">
        <div class="form-mail container">
            <label for="mail">E-mail&nbsp;</label><br>
            <input type="email" id="mail" name="userEmail" />
        </div>
        <div class="form-pswd container">
            <label for="pswd">Password&nbsp;</label><br>
            <input type="password" id="pswd" name="userPswd" minlength="9" />
        </div>
        <div class="form-submit-button container">
            <button type="submit">Log in</button>
        </div>
    </div>
</form>

<?php include "../../includes/footer.php"; ?>
