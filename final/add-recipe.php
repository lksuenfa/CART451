<?php require "main/header.php" ?>

<script>
    // here we put our JQUERY
    $(document).ready(function() {
        $("#addRecipeForm").submit(function(event) {
            //stop submit the form, we will post it manually. PREVENT THE DEFAULT behaviour ...
            event.preventDefault();
            console.log("button clicked");

            let form = $('#addRecipeForm')[0];
            let data = new FormData(form);
            /*console.log to inspect the data */
            for (let pair of data.entries()) {
                console.log(pair[0] + ', ' + pair[1]);

            }
            // let ingData = JSON.stringify(data.getAll("ingName"));
            let ingNames = data.getAll("ingName");
            data.append("ingNames", ingNames);

            let ingQties = data.getAll("ingQty");
            data.append("ingQties", ingQties);

            let ingQtyUnits = data.getAll("ingQtyUnit");
            data.append("ingQtyUnits", ingQtyUnits);

            let tags = data.getAll("tag");
            data.append("tags", tags);


            // let ing
            // console.log(JSON.stringify(data.getAll("ingName")));
            /*https://api.jquery.com/jQuery.ajax/*/
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "insertDb.php",
                data: data,
                processData: false, //prevents from converting into a query string
                /*contentType option to false is used for multipart/form-data forms that pass files.
                When one sets the contentType option to false, it forces jQuery not to add a Content-Type header, otherwise, the boundary string will be missing from it.
                Also, when submitting files via multipart/form-data, one must leave the processData flag set to false, otherwise, jQuery will try to convert your FormData into a string, which will fail. */

                /*contentType: "application/x-www-form-urlencoded; charset=UTF-8", // this is the default value, so it's optional*/

                contentType: false, //contentType is the type of data you're sending,i.e.application/json; charset=utf-8
                cache: false,
                timeout: 600000,
                success: function(response) {
                    //response is a STRING (not a JavaScript object -> so we need to convert)
                    console.log("we had success!");
                    console.log(response);
                    //use the JSON .parse function to convert the JSON string into a Javascript object
                    // let parsedJSON = JSON.parse(response);
                    // console.log(parsedJSON);



                },
                error: function() {
                    console.log("error occurred");
                }
            });
        });





    });
</script>

<!-- content -->
<section class="content add-recipe">

    <h1>Add a new recipe</h1>
    <form action="" id="addRecipeForm">

        <section id="form-name " class="form">
            <label for="recipeName" class="criteria-title">Recipe Name <span aria-label="required">* : </span>
                <input type="text" name="recipeName"> </label>
            <label for="otherName" class="criteria-title">Other Name(s) :
                <input type="text" name="otherName"> </label>
            <label for="description" class="criteria-title">General Description : <input type="text" name="description"></label>
        </section>


        <section id="form-story" class="verticalPadding form">
            <label for="story" class="criteria-title ">Background story : </label>
            <input type="text" name="story">
        </section>


        <section id="prepData" class="form">
            <label for="numServing" class="criteria-title ">Serving(s) <span aria-label="required">*</span> : <input type="number" name="numServing"></label>


            <label for="prepTime" class="criteria-title">Preparation Time (min) <span aria-label="required">*</span> : <input type="number" name="prepTime"></label>


            <label for="cookingTime" class="criteria-title">Cooking Time (min) <span aria-label="required">*</span> : <input type="number" name="cookingTime"></label>

        </section>

        <section>
            <h2>Ingredients <span aria-label="required">*</span> </h2>

            <div id="ing-wrapper">


                <ul id="ing-container">
                    <li>
                        <label class="ingName" for="ingName">Name : </label>
                        <input type="text" name="ingName">

                        <label for="ingQty">Quantity :</label>
                        <input type="number" name="ingQty">
                        <select name="ingQtyUnit" class="units">
                            <option value="g">g</option>
                            <option value="kg">kg</option>
                            <option value="ml">mL</option>
                            <option value="l">L</option>
                            <option value="cup">cup</option>
                            <option value="unit">unit</option>
                        </select>
                    </li>


                </ul>



                <!-- <button id="addIngBtn">+</button> -->

                <p id="addIngBtn" class="red button"> +</p>
            </div>
        </section>

        <section id="processMethod">
            <label for="process">
                <h2>Process : </h2>
            </label>
            <input type="text" name="process">
        </section>


        <section id="checkboxes" class="verticalPadding">
            <section class="criteriaType">
                <p class="criteria-title">Meal</p>
                <div class="options">
                    <label class="container"> breakfast
                        <input type="checkbox" name="tag" value="breakfast" class="check">
                        <span class="checkmark"></span>
                    </label>


                    <label class="container"> lunch
                        <input type="checkbox" name="tag" value="lunch" class="check">
                        <span class="checkmark"></span>
                    </label>

                    <label class="container"> dinner
                        <input type="checkbox" name="tag" value="dinner" class="check">
                        <span class="checkmark"></span>
                    </label>


                    <label class="container"> snack
                        <input type="checkbox" name="tag" value="snack">
                        <span class="checkmark"></span></label>
                </div>
            </section>


            <section class="criteriaType">
                <p class="criteria-title">Category</p>
                <div class="options">
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

            <section class="criteriaType">
                <p class="criteria-title">Tags</p>
                <div class="options">
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

                    <label for="otherTags">Other : <input type="text" name="tag"></label>

                </div>
            </section>

            <section>
                <label for="origin" class="criteria-title">Origin <input type="text" name="origin"> </label>
            </section>
        </section>

        <section>
            <h2>Let the world know more about you</h2>
            <label for="authorName">Your Name : <span aria-label="required">*</span> <input type="text" name="authorName"> </label>
            <label for="authorLocation">Location : <input type="text" name="authorLocation"> <br></label>
            <!-- <label for="authorURL">Personal website : <input type="url" name="authorURL"></label> -->

        </section>


        <section id="uploadPhoto">
            <p>Upload a photo of the dish <span aria-label="required">*</span> </p>
            <input type="file" id="myFile" name="filename">
        </section>



        <br>

        <input type="submit" value="Save Recipe" id="saveRecipeBtn" class="button red">

    </form>


</section>

<!-- <section id="confirmation-save-recipe" class="modal">
    <div class="modal-content">
        <p>You recipe has been saved in our database</p>

        <div>
            <a href="add-recipe.php" class="button red">Add a new recipe</a>
            <a href="search.php" class="button yellow">Browse recipes</a>
        </div>

    </div>

</section> -->


<?php require "main/footer.php" ?>