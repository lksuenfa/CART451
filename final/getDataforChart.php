<?php
require('openDB.php');
try {
    // count number of countries and count them
    // https://www.sqlitetutorial.net/sqlite-count-function/
    $sql_select = 'SELECT origin, count(*) FROM recipeCollection GROUP BY
	origin';
    $result = $file_db->query($sql_select);
    if (!$result) die("Cannot execute query.");

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $jsonArray[] = $row;
    }

    echo json_encode($jsonArray);
} catch (PDOException $e) {
    echo $e->getMessage(); // Print PDOException message
}
