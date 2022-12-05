<?php
require "main/header.php";
?>



<section class="content">
    <?php
    require "search-options.php";
    ?>

    <!-- display all results by default -->
    <section id="catDish"> </section>

    <!-- <div id="regions_div" style="width: 900px; height: 500px;"></div> -->
    <!-- <div id="chart_div"></div> -->

    <div id="resultsContainer">
        <section class="product-grid">

            <!-- <h2>All results</h2> -->

            <div class="grid-wrapper" id="grid-wrapper"></div>

        </section>
    </div>
</section>

<?php require "main/footer.php"; ?>