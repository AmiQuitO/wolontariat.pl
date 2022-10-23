<?php

if(isSet($_POST["submit"])){
    $username = $_POST["username"];
    $phoneNumber = $_POST["phone-number"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeat-password"];
    $type = $_POST["user-type"];

    require_once "functions.php";
    require_once "databaseconnection.php";


    if(EmptyInputRegister($username, $phoneNumber, $password, $type) !== false){
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if(InvalidUsername($username) !== false){
        header("location: ../register.php?error=invalidusername");
        exit();
    }
    if(InvalidPhoneNumber($phoneNumber) !== false){
        header("location: ../register.php?error=invalidphonenumber");
        exit();
    }
    if(PasswordMatch($password, $repeatPassword) !== false){
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }
    if(UsernameExists($conn, $username, $phoneNumber) !== false){
        header("location: ../register.php?error=usernameorphonenumbertaken");
        exit();
    }

    CreateUser($conn, $username, $phoneNumber, $type, $password);

    $sql = "INSERT INTO users (usersUsername, usersPhoneNumber, usersType, usersPassword) VALUES ('$username', '$phoneNumber', '$type', '$password');";
    mysqli_query($conn, $sql);
    header("Location: ../index.php?register=success");
    exit();
}else{
    header("Location: ../register.php");
    exit();
}

?>