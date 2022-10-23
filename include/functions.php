<?php

function EmptyInputRegister($username, $phoneNumber, $password, $type){
    $result;
    if(empty($username) || empty($phoneNumber) || empty($password) || empty($type)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function InvalidUsername($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function InvalidPhoneNumber($phoneNumber){
    $result;
    if(!preg_match("/^[0-9]{9}$/", $phoneNumber)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function PasswordMatch($password, $repeatPassword){
    $result;
    if($password !== $repeatPassword){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function UsernameExists($conn, $username, $phoneNumber){
    $sql = "SELECT * FROM users WHERE usersUsername = ? OR usersPhoneNumber = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $phoneNumber);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function CreateUser($conn, $username, $phoneNumber, $type, $password){
    $sql = "INSERT INTO users (usersUsername, usersPhoneNumber, usersType, usersPassword) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "siss", $username, $phoneNumber, $type, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    LoginUser($conn, $username, $password);

    header("location: ../index.php");
    exit();
}

function EmptyInputLogin($username, $password){
    $result;
    if(empty($username) || empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function LoginUser($conn, $username, $password){
    $usernameExists = UsernameExists($conn, $username, $phoneNumber);

    if($usernameExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passwordHashed = $usernameExists["usersPassword"];
    $checkPassword = password_verify($password, $passwordHashed);

    if($checkPassword === false){
        header("location: ../login.php?error=wrongpassword");
        exit();
    }else if($checkPassword === true){
        session_start();
        $_SESSION["userid"] = $usernameExists["usersId"];
        $_SESSION["username"] = $usernameExists["usersUsername"];
        $_SESSION["userphonenumber"] = $usernameExists["usersPhoneNumber"];
        $_SESSION["usertype"] = $usernameExists["usersType"];
        header("location: ../index.php");
        exit();
    }
}
function EmptyInputCreateEvent($city, $title, $description){
    $result;
    if(empty($city) || empty($title) || empty($description)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function CreateEvent($conn, $city, $title, $description, $userphonenumber, $image, $userid){
    $sql = "INSERT INTO events (eventsCity, eventsTitle, eventsDesc, eventsContactInfo, eventsImage, eventsUserId) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssisi", $city, $title, $description, $userphonenumber, $image, $userid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../index.php");
    exit();
}



?>