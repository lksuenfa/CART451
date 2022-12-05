<?php
require('openDB.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $searchCrit =  "%" . $_POST['searchBar'] . "%";
    // echo $searchCrit;

    try {
        $sql_select = "SELECT * FROM recipeCollection WHERE recipeName LIKE '$searchCrit'";

        $result = $file_db->query($sql_select);
        if (!$result) die("Cannot execute query.");

        $res = array();
        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // note the result from SQL is ALREADy ASSOCIATIVE
            $res[$i] = $row;
            $i++;
        } //end while
        // endcode the resulting array as JSON
        $myJSONObj = json_encode($res);
        echo $myJSONObj;
    } catch (PDOException $e) {
        echo $e->getMessage(); // Print PDOException message
    };

    exit;
}
