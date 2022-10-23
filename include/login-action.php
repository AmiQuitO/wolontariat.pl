<?php

if(isSet($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once "functions.php";
    require_once "databaseconnection.php";


    if(EmptyInputLogin($username, $password) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    LoginUser($conn, $username, $password);


    $sql = "INSERT INTO users (username, phone_number, user_type, password) VALUES ('$username', '$phoneNumber', '$type', '$password');";
    mysqli_query($conn, $sql);
    header("Location: ../index.php?register=success");
    exit();
}else{
    header("Location: ../login.php");
    exit();
}

?>