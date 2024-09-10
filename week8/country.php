<?php
require_once 'includes/header.inc';
require_once 'includes/db_connect.inc';
$result = $con->query('SELECT * FROM country');
while ($row = $result->fetch_assoc()) {
    echo '<h2>' . $row['countryid'] . ' ' . $row['countryname'] . '</h2>';
    echo '<p>Description: ' . $row['description'] . '</p>';
}

require_once 'includes/footer.inc';
