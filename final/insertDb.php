

<?php
require('openDB.php');

//check if there has been something posted to the server to be processed
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // need to process
    $recipeName = $_POST['recipeName'];
    $otherName = $_POST['otherName'];
    $description = $_POST['description'];
    $story = $_POST['story'];
    $numServing = $_POST['numServing'];
    $prepTime = $_POST['prepTime'];
    $cookingTime = $_POST['cookingTime'];

    $ingName = $_POST['ingNames'];
    $ingQty = $_POST['ingQties'];
    $ingQtyUnit = $_POST['ingQtyUnits'];

    $process = $_POST['process'];

    $tags = $_POST['tags'];


    $origin = $_POST['origin'];
    $authorName = $_POST['authorName'];
    $authorLocation = $_POST['authorLocation'];


    if ($_FILES) {
        //echo "file name: ".$_FILES['filename']['name'] . "<br />";
        //echo "path to file uploaded: ".$_FILES['filename']['tmp_name']. "<br />";
        $fname = $_FILES['filename']['name'];
        move_uploaded_file($_FILES['filename']['tmp_name'], "assets/images/" . $fname);

        try {
            /*The data from the text box is potentially unsafe; 'tainted'. Use the quote() - puts quotes around things..
               It escapes a string for use as a query parameter.
               This is common practice to avoid malicious sql injection attacks.
               PDO::quote() places quotes around the input string (if required)
               and escapes special characters within the input string, using a quoting style appropriate to the underlying driver. */
            // $artist_es = $file_db->quote($artist);
            // $title_es = $file_db->quote($title);
            // $loc_es = $file_db->quote($loc);
            // $description_es = $file_db->quote($description);
            // $creationDate_es = $file_db->quote($creationDate);
            // the file name with correct path
            $imageWithPath = "assets/images/" . $fname;
            // $rnNum = rand(5, 100);

            $queryInsert = "INSERT INTO recipeCollection(recipeName,otherName,descript,story,numServing,prepTime,cookingTime,ingNames,ingQties,ingQtyUnits,process,allTags,origin,authorName,authorLocation,recipeImg)VALUES ('$recipeName' ,'$otherName' ,'$description' , '$story' , 'intval($numServing)' ,'intval($prepTime)' , 'intval($cookingTime)' , '$ingName', 'intval($ingQty)', '$ingQtyUnit', '$process', '$tags', '$origin' , '$authorName' , '$authorLocation', '$imageWithPath')";
            // $queryInsert = "INSERT INTO recipeCollection(recipeName)VALUES('$recipeName')";

            $file_db->exec($queryInsert);
            $file_db = null;
            echo ("done");
            exit;
        } catch (PDOException $e) {
            // Print PDOException message
            echo $e->getMessage();
        }

        exit();
    } //FILES
}//POST
