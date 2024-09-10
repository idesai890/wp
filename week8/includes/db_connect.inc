<?php
if ($_SERVER['SERVER_NAME'] == "localhost") {
    $host = "localhost";
    $user = "root";
    $password = '';
    $database = "destination";
} else {
    $host = "talsprddb02.int.its.rmit.edu.au";
    $user = "e102767";
    $password = 'JACOB5_pw';
    $database = "e102767";
}


// Create a connection to the database
$conn = new mysqli($host, $user, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
