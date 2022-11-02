<?php require "main/header.php" ?>

<section id="tab-menu">


  <!-- content -->
  <div id="search" class="tabcontent">
    <div>
      <h3>We live <br> to eat.</h3>
      <p>Join a community of health-conscious foodies celebrating culinary diversity and the sharing of knowledge. </p>
      <a href="search.php">Browse cookbook</a>
    </div>
  </div>

  <div id="add" class="tabcontent">
    <div>
      <h3>Eat together, learn together</h3>
      <p>Contribute to the communal cookbook. Share your knowledge and inspire culinary creativity all around the world.</p>
      <a href="add-recipe.php">Add a recipe</a>
    </div>
  </div>

  <div id="about" class="tabcontent">
    <div>
      <h3>About Us</h3>
      <p>Read about why and how Bite of Love was born and explore our methodology</p>
      <a href="about.php">Learn More</a>
    </div>
  </div>

  <!-- tabs -->
  <div class="tab">
    <button id="defaultOpen" class="tablinks search" onclick="openTab(event, 'search')">
      <img src="assets/icons/magnify.svg" alt=""> </button>
    <button class="tablinks add-recipe" onclick="openTab(event, 'add')"> <img src="assets/icons/plus-circle.svg" alt="add recipe"> </button>
    <button class="tablinks about" onclick="openTab(event, 'about')"> <img src="assets/icons/account-heart-outline.svg" alt=""></button>
  </div>
</section>

<?php require "main/footer.php" ?>