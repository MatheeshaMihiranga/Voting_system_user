<?php
session_start();
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

$sql = "SELECT * FROM user_details WHERE uEmail='{$_SESSION['email']}'";
$results = mysqli_query($conn, $sql);

if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_assoc($results)) {
        $uEmail = $row['uEmail'];
        $uFirstname = $row['uFirstname'];
        $uLastname = $row['uLastname'];
        $country = $row['country'];
        $dob = $row['dob'];
    }
}

if (isset($_POST['saveChanges'])) {
    $newEmail = $_POST['eMail'];
    $newFirstname = $_POST['firstName'];
    $newLastname = $_POST['lastName'];
    $newCountry = $_POST['Country'];
    $newDob = $_POST['doB'];

    $sqlUpdateQuery = "UPDATE user_details SET uEmail = '$newEmail', uFirstname = '$newFirstname', uLastname = '$newLastname', country = '$newCountry', dob = '$newDob' WHERE uEmail='{$_SESSION['email']}'";

    $results = mysqli_query($conn, $sqlUpdateQuery);
    if ($results) {
        $_SESSION["email"] = $newEmail;
        header("Location: ./accountinformation.php");
    }
}

if (isset($_POST['changePassword'])) {
    echo "hello";
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    $passwordQuery = "SELECT uPassword FROM user_login WHERE uEmail='{$_SESSION['email']}'";
    $passwordResult = mysqli_query($conn, $passwordQuery);
    if (mysqli_num_rows($passwordResult) > 0) {
        $row = mysqli_fetch_assoc($passwordResult);
        $storedPassword = $row['uPassword'];

        if (password_verify($currentPassword, $storedPassword)) {

            if ($newPassword !== $confirmPassword) {

                header("Location: ../accountinformation.php?error=password_mismatch");
                exit();
            }

            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $updatePasswordQuery = "UPDATE user_login SET uPassword = '$hashedPassword' WHERE uEmail='{$_SESSION['email']}'";

            $results = mysqli_query($conn, $updatePasswordQuery);
            if ($results) {

                session_destroy();
                header("Location: ./index.php");
                exit();
            } else {
                header("Location: ../accountinformation.php?error=update_failed");
                exit();
            }
        } else {

            header("Location: ../accountinformation.php?error=incorrect_password");
            exit();
        }
    } else {

        header("Location: ../accountinformation.php?error=password_retrieval");
    }
}
