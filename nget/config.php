<?php
session_start();
$servername = "localhost";
$username = "bmwtatk1_nget";
$pasword = "gwc[fn0?Cb3S";
$dbname = "bmwtatk1_nget";

//PDO Connection for Database
try {
    $conn = new PDO("mysql:host = " . $servername . ";dbname =" . $dbname, $username, $pasword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
