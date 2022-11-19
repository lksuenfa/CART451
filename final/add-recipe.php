<?php require "main/header.php" ?>

<!-- content -->

<section class="content add-recipe">

    <h1>Add a new recipe</h1>
    <form action="">

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

        <?php require "search-criteria.php" ?>

        <section>
            <h2>Let the world know more about you</h2>
            <label for="authorName">Your Name : <span aria-label="required">*</span> <input type="text" name="authorName"> </label>
            <label for="authorLocation">Location : <input type="text" name="authorLocation"> <br></label>
            <label for="authorURL">Personal website : <input type="url" name="authorURL"></label>

        </section>


        <section id="uploadPhoto">
            <p>Upload a photo of the dish <span aria-label="required">*</span> </p>
            <input type="file" id="myFile" name="filename">
        </section>



        <br>


    </form>
    <input type="submit" value="Save Recipe" id="saveRecipeBtn" class="button red">


</section>

<section id="confirmation-save-recipe" class="modal">
    <div class="modal-content">
        <p>You recipe has been saved in our database</p>

        <div>
            <a href="add-recipe.php" class="button red">Add a new recipe</a>
            <a href="search.php" class="button yellow">Browse recipes</a>
        </div>

    </div>

</section>
<?php require "main/footer.php" ?>