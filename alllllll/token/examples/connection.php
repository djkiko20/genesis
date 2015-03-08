<?php

try {
    $host = "localhost";
    $dbname = "cordova";
    $username = "root";
    $password = "";


    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);



} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}

?>