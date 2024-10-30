<?php
include 'includes/header.inc';
include 'includes/db_connect.inc';

$stmt = $pdo->query("SELECT * FROM pets");
?>

<h1>All Pets</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Age (Months)</th>
            <th>Location</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($pet = $stmt->fetch()): ?>
            <tr>
                <td><?php echo htmlspecialchars($pet['name']); ?></td>
                <td><?php echo htmlspecialchars($pet['type']); ?></td>
                <td><?php echo htmlspecialchars($pet['age']); ?></td>
                <td><?php echo htmlspecialchars($pet['location']); ?></td>
                <td><a href="details.php?id=<?php echo $pet['id']; ?>">View</a></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include 'includes/footer.inc'; ?>
