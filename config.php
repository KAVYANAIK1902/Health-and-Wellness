<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "ecommerce_health";

$conn = new mysqli($server, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection error : " . $conn->connect_error);
}

if (!isset($_SESSION)) {
    session_start();
}
