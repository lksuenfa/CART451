<?php require "main/header.php" ?>

<!-- content -->
<section class="content">


    <?php require "search-options.php" ?>

    <section id="catDish">
        <button>Omelet</button>
        <button>Chawanmushi</button>
        <button>Frittata</button>
        <button>Egg Drop Soup</button>
        <button>Egg pudding</button>
        <button>Egg curry</button>
        <button>Egg and tomato stir fry</button>
    </section>

    <div id="resultsContainer">


        <section id="filter">
            <form action="">
                <?php require "search-criteria.php" ?>

                <button type="submit">Filter</button>
            </form>
        </section>

        <section class="product-grid">

            <h2>Omelet</h2>

            <div class="grid-wrapper">


                <a href="recipe.php" class="product">
                    <figure>
                        <img src="assets/images/image.png" alt="">

                        <figcaption>
                            <h3>Mushroom omelet</h3>
                        </figcaption>
                    </figure>

                </a>

                <a href="recipe.php" class="product">
                    <figure>
                        <img src="assets/images/image.png" alt="">

                        <figcaption>
                            <h3>Beetroot omelet</h3>
                        </figcaption>
                    </figure>

                </a>

                <a href="recipe.php" class="product">
                    <figure>
                        <img src="assets/images/image.png" alt="">

                        <figcaption>
                            <h3>Omurice</h3>
                        </figcaption>
                    </figure>

                </a>

                <a href="recipe.php" class="product">
                    <figure>
                        <img src="assets/images/image.png" alt="">

                        <figcaption>
                            <h3>Omurice</h3>
                        </figcaption>
                    </figure>

                </a>

                <a href="recipe.php" class="product">
                    <figure>
                        <img src="assets/images/image.png" alt="">

                        <figcaption>
                            <h3>Omurice</h3>
                        </figcaption>
                    </figure>

                </a>

                <a href="recipe.php" class="product">
                    <figure>
                        <img src="assets/images/image.png" alt="">

                        <figcaption>
                            <h3>Omurice</h3>
                        </figcaption>
                    </figure>

                </a>
            </div>

        </section>
    </div>
</section>

<?php require "main/footer.php" ?>