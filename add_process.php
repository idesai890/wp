<?php
include 'includes/db_connect.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $image = $_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'], "images/$image");

    $stmt = $pdo->prepare("INSERT INTO pets (name, image, type, age, location) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $image, $type, $age, $location]);

    header("Location: gallery.php");
}
?>
