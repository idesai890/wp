<?php
session_start();
include 'includes/db_connect.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['user'] = $username;
        header("Location: index.php");
    } else {
        echo "Invalid login credentials.";
    }
}
?>
