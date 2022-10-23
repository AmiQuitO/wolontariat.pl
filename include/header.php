<?php session_start(); 
require_once "databaseconnection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fuzzy+Bubbles&family=Source+Sans+Pro:wght@200;400&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="include/favicon.png">
    <title>Wolontariat.pl</title>
</head>
<body class="flex-column">
    <header class="flex-row"><a href="index.php"><p>Wolontariat.pl</p></a>
        
        <?php
            if(isSet($_SESSION['username'])){
                echo '<button class="header-button-logout" onclick="window.location.href=\'include/logout-action.php\'">Wyloguj się</button>';
            }
        ?>
    
    </header>
    <main class="flex-column">