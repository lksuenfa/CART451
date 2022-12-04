<?php
//check if there has been something posted to the server to be processed
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require('openDB.php');
    try {
        // need to process
        // could have different types of queries
        $criteria = $_POST['searchBar'];
        if ($criteria == "ALL") {
            $querySelect = 'SELECT * FROM recipeCollection';
            $result = $file_db->query($querySelect);
            if (!$result) die("Cannot execute query.");
        }

        if ($criteria == "ONE") {
            $querySelect = "SELECT * FROM recipeCollection WHERE recipeName = 'ube ice cream'";
            $result = $file_db->query($querySelect);
            if (!$result) die("Cannot execute query.");
        }
        // get a row...
        // MAKE AN ARRAY::
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
    } //end try
    catch (PDOException $e) {
        // Print PDOException message
        echo $e->getMessage();
    }
    exit;
} //POST
?>

<script>
    $(document).ready(function() {
        $("#searchForm").submit(function(event) {
            event.preventDefault();
            console.log("submit Search");

            let form = $('#searchForm')[0];
            let data = new FormData(form);

            $.ajax({
                type: "POST",
                enctype: 'text/plain',
                url: "search.php",
                data: data,
                processData: false, //prevents from converting into a query string
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function(response) {
                    console.log(response);
                    //use the JSON .parse function to convert the JSON string into a Javascript object
                    let parsedJSON = JSON.parse(response);
                    console.log(parsedJSON);
                    displayResponse(parsedJSON);
                },
                error: function() {
                    console.log("error occurred");
                }
            });
        });


    });
</script>

<section id="searchHeader">
    <form action="" id="searchForm">

        <div class="center">
            <input id="searchBar" type=" text" name="searchBar" placeholder="Find a dish">
            <button type="submit" class="red button" id="searchBtn">Search</button>
        </div>


        <div class="center">
            <section id="advancedSearch-container">

                <h2>Advanced Search Criteria</h2>

                <label for="searchByIng">Ingredients </label>
                <input id="transparentBox" type="text" name="searchByIng">

                <div class="flex">

                    <section class="searchCol">
                        <p class="criteria-title">Meal</p>
                        <div class="options searchCol">
                            <label class="container "> breakfast
                                <input type="checkbox" name="tag" value="breakfast">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container"> lunch
                                <input type="checkbox" name="tag" value="lunch">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container"> dinner
                                <input type="checkbox" name="tag" value="dinner">
                                <span class="checkmark"></span>
                            </label>


                            <label class="container"> snack
                                <input type="checkbox" name="tag" value="snack">
                                <span class="checkmark"></span></label>
                        </div>
                    </section>

                    <section class="searchCol">
                        <p class="criteria-title">Category</p>
                        <div class="options searchCol">
                            <label class="container"> main dish
                                <input type="checkbox" name="tag" value="main dish">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container"> side dish
                                <input type="checkbox" name="tag" value="side dish">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container"> appetizer
                                <input type="checkbox" name="tag" value="appetizer">
                                <span class="checkmark"></span>
                            </label>


                            <label class="container"> dessert
                                <input type="checkbox" name="tag" value="dessert">
                                <span class="checkmark"></span></label>

                        </div>
                    </section>

                    <section class="searchCol">
                        <p class="criteria-title">Tags</p>
                        <div class="options searchCol">
                            <label class="container"> vegetarian
                                <input type="checkbox" name="tag" value="vegetarian">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container"> vegan
                                <input type="checkbox" name="tag" value="vegan">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container"> nut-free
                                <input type="checkbox" name="tag" value="nut-free">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container"> spicy
                                <input type="checkbox" name="tag" value="spicy">
                                <span class="checkmark"></span>
                            </label>

                        </div>
                    </section>

                </div>
            </section>
        </div>


    </form>
    <button id="advSearchBtn">Advanced Search</button>

</section>