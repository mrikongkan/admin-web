<?php

if(!isset($_SESSION)){
    session_start();
    ob_start();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bmwtatk1_bmwusrs";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
?>