<?php

require "main/header.php";

// get the contents from the db and output. ..
require('openDB.php');

?>

<!-- content -->
<section class="content">
    <?php
    require "search-options.php";
    ?>

    <!-- display all results by default -->
    <section id="catDish">
        <?php
        try {
            $sql_select = 'SELECT * FROM recipeCollection';
            // the result set

            $result = $file_db->query($sql_select);
            if (!$result) die("Cannot execute query.");
            // get a row...
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <button> <?php echo $row["descript"]; ?></button>
        <?php
            } //end while
        } catch (PDOException $e) {
            // Print PDOException message
            echo $e->getMessage();
        }

        ?>
    </section>

    <div id="resultsContainer">
        <section class="product-grid">

            <h2>All results</h2>

            <div class="grid-wrapper">
                <?php

                try {
                    $sql_select = 'SELECT * FROM recipeCollection';
                    // the result set

                    $result = $file_db->query($sql_select);
                    if (!$result) die("Cannot execute query.");
                    // get a row...
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <a href="recipe.php" class="product">
                            <figure>
                                <img src="<?php echo $row["recipeImg"]; ?>">

                                <figcaption>
                                    <h3> <?php echo $row["recipeName"]; ?></h3>
                                </figcaption>
                            </figure>

                        </a>
                <?php
                    } //end while
                } catch (PDOException $e) {
                    // Print PDOException message
                    echo $e->getMessage();
                }

                ?>

            </div>

        </section>
    </div>
</section>

<?php require "main/footer.php";
?>