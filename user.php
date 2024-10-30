<?php
include 'includes/header.inc';
include 'includes/db_connect.inc';

$username = $_GET['user'] ?? null;

if ($username) {
    $stmt = $pdo->prepare("SELECT * FROM pets WHERE user_id = (SELECT id FROM users WHERE username = ?)");
    $stmt->execute([$username]);
}
?>

<h1><?php echo htmlspecialchars($username); ?>'s Pets</h1>
<div class="row">
    <?php while ($pet = $stmt->fetch()): ?>
        <div class="col-md-4">
            <img src="images/<?php echo htmlspecialchars($pet['image']); ?>" class="img-fluid">
            <h2><?php echo htmlspecialchars($pet['name']); ?></h2>
            <p><?php echo htmlspecialchars($pet['type']); ?> | <?php echo htmlspecialchars($pet['age']); ?> months</p>
        </div>
    <?php endwhile; ?>
</div>

<?php include 'includes/footer.inc'; ?>
