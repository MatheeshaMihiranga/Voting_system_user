<?php

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputsLogin($email, $pwd) !== false) {

        exit();
    }

    LoginUser($conn, $email, $pwd);
} else {

    header("Location:../login.php");
    exit();

}