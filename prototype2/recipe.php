<?php require "main/header.php" ?>

<section class="content">

    <section id="recipeHeader">
        <h1>Name of Dish</h1>
        <div class="otherNames">
            <h3>Other Names : ...</h3>
            <h3>General Description : ....</h3>
        </div>

    </section>

    <section id="recipe-tags">
        <p>tag</p>
        <p>tag</p>
        <p>tag</p>
        <p>tag</p>
        <p>tag</p>
        <p>tag</p>
    </section>

    <section id="recipePrep">
        <h4>Servings: <span>2</span></h4>
        <h4>Preparation time : <span>1h</span></h4>
        <h4>Cooking time : <span>1h</span></h4>
    </section>


    <section>
        <h2>Ingredients</h2>

        <div class="list">
            <p>Carrots 100g</p>
            <p>Carrots 100g</p>
            <p>Carrots 100g</p>
            <p>Carrots 100g</p>
            <p>Carrots 100g</p>
        </div>
    </section>

    <section>
        <h2>Process</h2>

        <div class="list">
            <ol>
                <li>Peel carrots</li>
                <li>Peel carrots</li>
                <li>Peel carrots</li>
                <li>Peel carrots</li>
            </ol>
        </div>
    </section>
</section>

<section id="dataviz">
    <div id="chart-container">
        <canvas id="myChart"></canvas>
    </div>

    <div>
        <h2>Nutritional Value</h2>
        <!-- https://www.w3schools.com/tags/tag_output.asp -->
        <form oninput="totalCal.value = parseInt(calRange.value)">
            <p>Based on a <output id="totalCal" name="totalCal" for="calRange"> 2000 </output>calorie diet </p>
            <input type="range" id="calRange" value="2000" min="500" max="5000">

            <button type="submit" class="button teal" id="personaliseCalBtn">Personalise</button>
        </form>

        <div id="nutriDataContainer">


            <div class="nutriData">
                <p>Calorie</p>
                <div class="greyBar">
                    <div class="activeBar yellow" style="width:25%">25%</div>
                </div><br>
            </div>

            <div class="nutriData">
                <p>Total Fat</p>
                <div class="greyBar">
                    <div class="activeBar yellow" style="width:65%">65%</div>
                </div><br>
            </div>

            <div class="nutriData">
                <p>Cholesterol</p>
                <div class="greyBar">
                    <div class="activeBar yellow" style="width:31%">31%</div>
                </div><br>
            </div>

            <div class="nutriData">
                <p>Sodium</p>
                <div class="greyBar">
                    <div class="activeBar yellow" style="width:15%">15%</div>
                </div><br>
            </div>

            <div class="nutriData">
                <p>Total Carbohydrate</p>
                <div class="greyBar">
                    <div class="activeBar yellow" style="width:20%">20%</div>
                </div><br>
            </div>

            <div class="nutriData">
                <p>Protein</p>
                <div class="greyBar">
                    <div class="activeBar yellow" style="width:55%">55%</div>
                </div><br>
            </div>
        </div>
    </div>
</section>


<?php require "upselling-recipes.php" ?>

<?php require "main/footer.php" ?>