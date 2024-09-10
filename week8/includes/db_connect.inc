<?php
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    # code...
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

$con = new mysqli($host, $user, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
