<?php
require "main/header.php";
require('openDB.php');



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // get from link
    $clickedRecipe = $_GET['recipe'];

    try {
        $sql_select = "SELECT * FROM recipeCollection WHERE recipeID = $clickedRecipe";

        $result = $file_db->query($sql_select);
        if (!$result) die("Cannot execute query.");

        $res = array();
        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // note the result from SQL is ALREADy ASSOCIATIVE
            $res[$i] = $row;
            // $i++;

            // var_dump($row);

            // echo $row["recipeID"];
?>

            <section class="content">
                <section id="recipeHeader">
                    <h1><?php echo $row["recipeName"]; ?></h1>
                    <div class="otherNames">
                        <h3> <?php echo "Other Names : ";
                                if ($row["otherName"]) {
                                    echo $row["otherName"];
                                } else echo "none";  ?></h3>
                        <h3> <?php echo "General Description : " . $row["descript"];  ?></h3>
                    </div>

                </section>

                <section id="recipe-tags">
                    <?php
                    // echo $row["allTags"];


                    // 
                    $tags = explode(",", $row["allTags"]);
                    // var_dump($tags);
                    for ($i = 0; $i < count($tags) - 1; $i++) {
                        echo "<p>" . $tags[$i] . "</p>";
                    }


                    ?>

                </section>

                <section id="recipePrep">

                    <h4>Servings:
                        <span>
                            <?php
                            $lhs = str_replace("intval(", " ", $row["numServing"]);
                            $complete =  str_replace(")", " ", $lhs);
                            echo $complete;
                            ?>
                        </span>
                    </h4>
                    <h4>Preparation time :
                        <span>
                            <?php
                            $lhs = str_replace("intval(", " ", $row["prepTime"]);
                            $complete =  str_replace(")", " ", $lhs);
                            echo $complete . "min";
                            ?>
                        </span>
                    </h4>

                    <h4>Cooking time :
                        <span>
                            <?php
                            $lhs = str_replace("intval(", " ", $row["cookingTime"]);
                            $complete =  str_replace(")", " ", $lhs);
                            echo $complete . "min";
                            ?>
                        </span>
                    </h4>

                </section>


                <section>
                    <h2>Ingredients</h2>

                    <div class="list">
                        <?php
                        $ingName = explode(",", $row["ingNames"]);
                        $ingQtyUnits = explode(",", $row["ingQtyUnits"]);

                        $lhs = str_replace("intval(", " ", $row["ingQties"]);
                        $complete =  str_replace(")", " ", $lhs);
                        $IngQty = explode(",", $complete);


                        for ($i = 0; $i < count($ingName); $i++) {
                            echo "<p>" . $ingName[$i] . " " . $IngQty[$i] . " " . $ingQtyUnits[$i] . "</p>";
                        }
                        ?>

                    </div>
                </section>

                <section>
                    <h2>Process</h2>

                    <div class="list">
                        <p><?php echo $row["process"]; ?> </p>

                    </div>
                </section>
            </section>

        <?php

            // foreach ($row as $key => $entry) {

            //     echo "<p>" . $key . " :: " . $entry . "</p>";
            // }
        } //end while
        // endcode the resulting array as JSON
        // $myJSONObj = json_encode($res);
        // echo $myJSONObj;



        ?>



<?php
    } catch (PDOException $e) {
        echo $e->getMessage(); // Print PDOException message
    };

    exit;
}

require "main/footer.php";
