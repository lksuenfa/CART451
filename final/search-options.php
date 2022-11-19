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
                                <input type="checkbox" name="breakfast" value="breakfast">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container"> lunch
                                <input type="checkbox" name="lunch" value="lunch">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container"> dinner
                                <input type="checkbox" name="dinner" value="dinner">
                                <span class="checkmark"></span>
                            </label>


                            <label class="container"> snack
                                <input type="checkbox" name="snack" value="snack">
                                <span class="checkmark"></span></label>
                        </div>
                    </section>

                    <section class="searchCol">
                        <p class="criteria-title">Category</p>
                        <div class="options searchCol">
                            <label class="container"> main dish
                                <input type="checkbox" name="main dish" value="main dish">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container"> side dish
                                <input type="checkbox" name="side dish" value="side dish">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container"> appetizer
                                <input type="checkbox" name="appetizer" value="appetizer">
                                <span class="checkmark"></span>
                            </label>


                            <label class="container"> dessert
                                <input type="checkbox" name="dessert" value="dessert">
                                <span class="checkmark"></span></label>

                        </div>
                    </section>

                    <section class="searchCol">
                        <p class="criteria-title">Tags</p>
                        <div class="options searchCol">
                            <label class="container"> vegetarian
                                <input type="checkbox" name="vegetarian" value="vegetarian">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container"> vegan
                                <input type="checkbox" name="vegan" value="vegan">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container"> nut-free
                                <input type="checkbox" name="nut-free" value="nut-free">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container"> spicy
                                <input type="checkbox" name="spicy" value="spicy">
                                <span class="checkmark"></span>
                            </label>

                        </div>
                    </section>


                    <section id="prepData" class="searchCol">

                        <label for="prepTime">Preparation Time (min) </label>
                        <input type="range" min="0" max="200" name="prepTime">

                        <label for="cookingTime">Cooking Time (min) </label>
                        <input type="range" min="0" max="200" name="prepTime">
                    </section>
                </div>

                <!-- <section id="submitContainer">
                <button type="submit" class="teal button" id="submit">Submit</button>
            </section> -->


            </section>
        </div>


    </form>
    <button id="advSearchBtn">Advanced Search</button>

</section>