<?php
include 'includes/header.inc';
include 'includes/db_connect.inc';

$query = $_GET['query'] ?? '';
$type = $_GET['type'] ?? '';

$sql = "SELECT * FROM pets WHERE name LIKE ? OR type LIKE ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(['%' . $query . '%', '%' . $type . '%']);
?>

<h1>Search Results</h1>
<form method="GET">
    <input type="text" name="query" placeholder="Search by name or description" value="<?php echo htmlspecialchars($query); ?>">
    <input type="text" name="type" placeholder="Type" value="<?php echo htmlspecialchars($type); ?>">
    <button type="submit">Search</button>
</form>

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
