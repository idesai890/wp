<?php
$host = "localhost";
$user = "root";
$password = '';
$database = "destination";

// Create a connection to the database
$conn = new mysqli($host, $user, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
