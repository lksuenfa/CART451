<?php
require('openDB.php');
try {

    $myStr = "SELECT * FROM recipeCollection";
    // $myStrTwo="SELECT day,weather, COUNT(*) FROM dataStuff GROUP BY day";
    $result = $file_db->query($myStr);

    if (!$result) die("Cannot execute query.");
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        var_dump($row);

        foreach ($row as $key => $entry) {

            echo "<p>" . $key . " :: " . $entry . "</p>";
        }
        echo "<br> ----- <br>";
    } //end while


} catch (PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
}
exit;
