<?php
session_start();
include 'includes/db_connect.inc';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'] ?? null;

if ($id) {
    // Delete the pet's image file
    $stmt = $pdo->prepare("SELECT image FROM pets WHERE id = ?");
    $stmt->execute([$id]);
    $pet = $stmt->fetch();
    if ($pet) {
        unlink("images/" . $pet['image']);  // Delete the image file
    }

    // Delete the pet record from the database
    $stmt = $pdo->prepare("DELETE FROM pets WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: pets.php");
    exit();
}
?>
