<?php
include_once 'includes/header.inc';
?>
<main>
    <?php
    require 'includes/db_connect.inc';
    $result = $conn->query("SELECT * FROM country");
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . $row['countryid'] . ' ' . $row['countryname'] . "</h2>";
        echo "<p>" . $row['description'] . "</p>";
    }
    ?>
</main>
<?php
include_once 'includes/footer.inc';
?>