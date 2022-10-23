<?php
session_start();

if(isSet($_POST["submit"])){
    $city = $_POST["city"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $image = $_POST["image"];

    require_once "functions.php";
    require_once "databaseconnection.php";


    if(EmptyInputCreateEvent($city, $title, $description) !== false){
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    /*
    if(InvalidCity($city) !== false){
        header("location: ../register.php?error=invalidcity");
        exit();
    }
    */

    CreateEvent($conn, $city, $title, $description, $_SESSION['userphonenumber'], $image, $_SESSION['userid']);

    $sql = 'INSERT INTO events (eventsCity, eventsTitle, eventsDesc, eventsContactInfo, eventsImage, eventsUserId) VALUES ("$city", "$title", "$description", "$_SESSION[\'userphonenumber\']","$image","$_SESSION[\'userid\']");';
    mysqli_query($conn, $sql);
    header("Location: ../index.php?createevent=success");
    exit();
}else{
    header("Location: ../index.php");
    exit();
}

?>