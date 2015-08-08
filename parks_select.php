<?php

require_once 'parks_config.php';
require_once 'db_connect.php';

// $stmt = $dbc->query('SELECT * FROM national_parks');

// echo "Columns: " . $stmt->columnCount() . PHP_EOL;
// echo "Rows: " . $stmt->rowCount() . PHP_EOL;

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     print_r($row);
// }

function getParks($dbc)
{
    return $dbc->query('SELECT name FROM national_parks')->fetchAll(PDO::FETCH_ASSOC);
}

print_r(getParks($dbc));

$stmt = $dbc->query('SELECT count(*) FROM national_parks');
echo 'There are ' . $stmt->fetchColumn() . ' parks in our database.' . PHP_EOL;