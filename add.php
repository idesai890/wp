<?php include 'includes/header.inc'; ?>
<form action="add_process.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Pet Name" required>
    <input type="file" name="image" required>
    <input type="text" name="type" placeholder="Type" required>
    <input type="number" name="age" placeholder="Age (months)" required>
    <input type="text" name="location" placeholder="Location" required>
    <button type="submit">Add Pet</button>
</form>
<?php include 'includes/footer.inc'; ?>
