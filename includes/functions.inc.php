<?php

function emptyInputSignup($firstname, $lastname, $dateofbirth, $country, $email, $pwd, $pwdConfirm)
{

    $results;
    if (empty($firstname) || empty($lastname) || empty($dateofbirth) || empty($country) || empty($email) || empty($pwd) || empty($pwdConfirm)) {

        $results = true;
    } else {
        $results = false;
    }

    return $results;
}

function invalidEmail($email)
{

    $results;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $results = true;
    } else {
        $results = false;
    }

    return $results;
}

function matchPassword($pwd, $pwdConfirm)
{

    $results;
    if ($pwd != $pwdConfirm) {

        $results = true;
    } else {
        $results = false;
    }

    return $results;
}

function emailExists($conn, $email)
{

    $sql = "SELECT *FROM user_login WHERE uEmail =?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location:../singup.php?error=stmfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultsData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultsData)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $firstname, $lastname, $dateofbirth, $country, $email, $pwd, $pwdConfirm)
{


    $stmt = mysqli_stmt_init($conn);
    $sql = "INSERT INTO user_details (Uemail,uFirstname,uLastname,country,dob) VALUES (?,?,?,?,?);";

    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location:../singup.php?error=stmfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $email, $firstname, $lastname, $country, $dateofbirth);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $stmt = mysqli_stmt_init($conn);
    $sql = "INSERT INTO user_login (uPassword,Uemail) VALUES (?,?)";
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location:../singup.php?error=stmfailed");
        exit();
    }
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ss", $hashedpwd, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php");
    exit();
}

function emptyInputsLogin($email, $pwd)
{

    $results;
    if (empty($email) || empty($pwd)) {

        $results = true;
    } else {
        $results = false;
    }

    return $results;
}

function LoginUser($conn, $email, $pwd)
{

    $emailExists = emailExists($conn, $email);
    if ($emailExists === false) {
        header("Location:/singup.php?error=wronglogin1");
        exit();
    }
    $hashedpwd = $emailExists["uPassword"];
    $pwdcheck = password_verify($pwd, $hashedpwd);


    if ($pwdcheck === false) {
        header("Location:/singup.php?error=wronglogin2");
        exit();
    } elseif ($pwdcheck === true) {
        session_start();
        $_SESSION["email"] = $emailExists["uEmail"];

        header("Location: ../index.php");
        exit();
    }
}
