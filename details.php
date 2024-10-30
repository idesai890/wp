<?php
include 'includes/header.inc';
include 'includes/db_connect.inc';

$id = $_GET['id'] ?? null;  // Get the pet ID from the URL

if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM pets WHERE id = ?");
    $stmt->execute([$id]);
    $pet = $stmt->fetch();
}
?>

<?php if ($pet): ?>
    <h1><?php echo htmlspecialchars($pet['name']); ?></h1>
    <img src="images/<?php echo htmlspecialchars($pet['image']); ?>" class="img-fluid">
    <p><?php echo htmlspecialchars($pet['type']); ?> | <?php echo htmlspecialchars($pet['age']); ?> months | <?php echo htmlspecialchars($pet['location']); ?></p>
    <p><?php echo htmlspecialchars($pet['description']); ?></p>

    <?php if (isset($_SESSION['user'])): ?>
        <a href="delete.php?id=<?php echo $pet['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
    <?php endif; ?>
<?php else: ?>
    <p>Pet not found!</p>
<?php endif; ?>

<?php include 'includes/footer.inc'; ?>
