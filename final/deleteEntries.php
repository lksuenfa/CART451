<?php
require('openDB.php');
?>
<?php
try {
} catch (PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
}

// $sql_delete = "DELETE FROM recipeCollection";

$sql_delete = "DELETE FROM recipeCollection WHERE recipeID = '2'";
$file_db->exec($sql_delete);
echo ("DELETION successful");
?>