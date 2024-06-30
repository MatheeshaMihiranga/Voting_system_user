<?php

if (isset($_POST["submit"])) {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $dateofbirth = $_POST["dateofbirth"];
    $country = $_POST["country"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdConfirm = $_POST["pwdConfirm"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    $emptyInputs = emptyInputSignup($firstname, $lastname, $dateofbirth, $country, $email, $pwd, $pwdConfirm);
    $invalidEmail = invalidEmail($email);
    $pwdConfirm = matchPassword($pwd, $pwdConfirm);
    $emailExists = emailExists($conn, $email);


    if ($emptyInputs !== false) {

        header("Location:../signup.php?error=emptyinput");

        exit();
    }
    if ($invalidEmail !== false) {

        header("Location:../signup.php?error=invalidemail");

        exit();
    }
    if ($pwdConfirm !== false) {

        header("Location:../signup.php?error=passwordnotmatch");

        exit();
    }

    if ($emailExists !== false) {

        header("Location:../signup.php?error=emailalreadyexists");

        exit();
    }

    createUser($conn, $firstname, $lastname, $dateofbirth, $country, $email, $pwd, $pwdConfirm);
} else {

    header("Location:../login.php");
    exit();
}