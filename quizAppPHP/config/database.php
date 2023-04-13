<?php

$servername = "localhost";
$username = "quizAppPHP";
$password = "D4t48453#4cc355";
$dbname = "quiz_app_php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
