<?php

try {
    $host = "localhost";
    $dbname = "hakaton";
    $username = "root";
    $password = "";


    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}

?>