<?php

include_once("../../../controllers/includes/pdo.php");

$name = htmlspecialchars($_POST["userName"]);
$email = htmlspecialchars($_POST["userEmail"]);
$pswd = $_POST["userPswd"];
$confPswd = $_POST["userPswdConf"];

if (isset($_POST["userLoginEmail"], $_POST["userLoginPswd"])) {

    $userLoginEmail = $_POST["userLoginEmail"];
    $userLoginPswd = $_POST["userLoginPswd"];
}

if ($confPswd != $pswd) {

    $errorState = "PASSWORD_NOT_MATCH";
} else if (strlen($name) > 32 || strlen($name) < 3) {

    $errorState = "USERNAME_OUT_OF_RANGE";
} else if (strlen($email) > 150 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $errorState = "EMAIL_INVALID";
} else if (strlen($pswd) > 150 || strlen($pswd) < 7) {

    $errorState = "PASSWORD_OUT_OF_RANGE";
} else {

    // test si l'email existe déjà
    $emailExists_stmt = $conn->prepare("SELECT email FROM users WHERE email = :email ");
    $emailExists_stmt->bindParam(':email', $email);
    $emailExists_stmt->execute();
    $emailExistsResult = $emailExists_stmt->fetch();

    // si l'email rentré dans le formulaire existe dans la bdd
    if ($emailExistsResult) {

        $errorState = "EMAIL_ALREADY_EXISTS";
    } else { // sinon on créé l'user et on l'ajoute dans la bdd

        $createUser_stmt = $conn->prepare("INSERT INTO `users` (`username`, `email`, `password`) VALUES (:username, :email, :pswd)");
        $createUser_stmt->bindParam(':username', $name);
        $createUser_stmt->bindParam(':email', $email);
        $createUser_stmt->bindParam(':pswd', $pswd);
        $createUser_stmt->execute();
    }

    if (isset($_POST["userLoginEmail"], $_POST["userLoginPswd"])) {
        //login verification avec la bdd
        $userLogin_stmt = $conn->prepare("SELECT email,pswd FROM users WHERE email = :email AND pswd = :pswd");
        $userLogin_stmt->bindParam(':email', $userLoginEmail);
        $userLogin_stmt->bindParam(':pswd', $userLoginPswd);
        $userLogin_stmt->execute();
        $userLoginResult = $userLogin_stmt->fetch();

        if ($userLoginResult) {

            $errorState = "EMAIL_AND_PASSWORD_NOT_MATCH";
        } else {
            echo "Test, your name is $name and your email is $userLoginEmail :)";
        }
    }
}
