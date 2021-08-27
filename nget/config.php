<?php
session_start();
$servername = "localhost";
$username = "u241746118_voltas";
$pasword = "Y:vP6Y#Pu2";
$dbname = "u241746118_voltas";

//PDO Connection for Database
try {
    $conn = new PDO("mysql:host = " . $servername . ";dbname =" . $dbname, $username, $pasword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// try {
//     $conn = new PDO("mysql:host = " . $servername . ";dbname =" . $dbname, $username, $pasword);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     if (isset($conn)) {
//         echo "Connected successfully";
//     }
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }
