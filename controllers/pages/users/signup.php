<?php

include_once "../../../views/pages/users/signup.php";

$name = htmlspecialchars($_POST["userName"]);
$mail = htmlspecialchars($_POST["userEmail"]);
$pswd = $_POST["userPswd"];
$confPswd = $_POST["userPswdConf"];

if ($confPswd != $pswd) {
    $errorState = "PASSWORD_NOT_MATCH";
} else if (strlen($name) > 32 || strlen($name) < 3) {
    $errorState = "USERNAME_OUT_OF_RANGE";
} else if (strlen($mail) > 150 || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $errorState = "EMAIL_INVALID";
} else if (strlen($pswd) > 150 || strlen($pswd) < 7) {
    $errorState = "PASSWORD_OUT_OF_RANGE";
} else {
    $sql = "INSERT INTO `bitking` VALUES ('', '$name', '$mail', '$pswd')";
	$conn->exec($sql);
}
?>