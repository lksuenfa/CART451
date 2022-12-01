<?php
try {
    /******************************************
    * Create databases and  open connections*
    ******************************************/
 
    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:../finalDb/recipeDb.db');
  // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE,
                            PDO::ERRMODE_EXCEPTION);
    //echo("opened or connected to the database animalGallery <br>");
   }
catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
  }
