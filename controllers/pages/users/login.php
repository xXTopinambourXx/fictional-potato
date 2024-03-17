<?php

include_once("../../../views/pages/users/login.php");
include_once("../../../controllers/includes/pdo.php");

$name = htmlspecialchars($_POST["userName"]);
$email = htmlspecialchars($_POST["userEmail"]);
$pswd = $_POST["userPswd"];
$confPswd = $_POST["userPswdConf"];

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

    if ($emailExistsResult) {

        $errorState = "EMAIL_ALREADY_EXISTS";

    } else {

        $createUser_stmt = $conn->prepare("INSERT INTO `users` (`username`, `email`, `password`) VALUES (:username, :email, :pswd)");
        $createUser_stmt->bindParam(':username', $name);
        $createUser_stmt->bindParam(':email', $email);
        $createUser_stmt->bindParam(':pswd', $pswd);
        $createUser_stmt->execute();

    }

}


?>