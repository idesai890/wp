<?php
session_start();
include 'includes/header.inc';
include 'includes/db_connect.inc';

// Check if a specific pet type is selected
$type = $_GET['type'] ?? 'all';

// Prepare SQL query based on the selected type
if ($type === 'all') {
    $query = "SELECT * FROM pets";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
} else {
    $query = "SELECT * FROM pets WHERE type = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$type]);
}
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Pet Gallery</h1>

    <!-- Dropdown to filter by pet type -->
    <form method="GET" class="mb-3">
        <select name="type" class="form-select" onchange="this.form.submit()">
            <option value="all" <?php if ($type === 'all') echo 'selected'; ?>>All</option>
            <option value="Dog" <?php if ($type === 'Dog') echo 'selected'; ?>>Dog</option>
            <option value="Cat" <?php if ($type === 'Cat') echo 'selected'; ?>>Cat</option>
        </select>
    </form>

    <div class="row">
        <!-- Display pets -->
        <?php while ($pet = $stmt->fetch()): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="images/<?php echo htmlspecialchars($pet['image']); ?>" 
                         class="card-img-top" 
                         alt="<?php echo htmlspecialchars($pet['name']); ?>" 
                         style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($pet['name']); ?></h5>
                        <p class="card-text">
                            <strong>Type:</strong> <?php echo htmlspecialchars($pet['type']); ?><br>
                            <strong>Age:</strong> <?php echo htmlspecialchars($pet['age']); ?> months<br>
                            <strong>Location:</strong> <?php echo htmlspecialchars($pet['location']); ?>
                        </p>
                        <a href="details.php?id=<?php echo $pet['id']; ?>" class="btn btn-outline-primary">View Details</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'includes/footer.inc'; ?>
