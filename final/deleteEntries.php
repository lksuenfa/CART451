<?php
require('openDB.php');
?>
<?php
try {
} catch (PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
}

$sql_delete = "DELETE FROM recipeCollection ";
$file_db->exec($sql_delete);
echo ("DELETION OF entry in animalCollection successful");
?>