<?php
require('openDB.php');

try {
  $theQuery = "CREATE TABLE recipeCollection (
  recipeID INTEGER PRIMARY KEY NOT NULL, 
  recipeName TEXT, 
  otherName TEXT,
  descript TEXT, 
  story TEXT,
  numServing INTEGER ,
  prepTime INTEGER,
  cookingTime INTEGER,

  ingNames TEXT,
  ingQties INTEGER,
  ingQtyUnits TEXT,

  process TEXT,

  allTags TEXT,
  
  origin TEXT,

  authorName TEXT,
  authorLocation TEXT,

  recipeImg TEXT
  )";
  $file_db->exec($theQuery);
  echo ("Table animalCollection created successfully<br>");
  $file_db = null;
} catch (PDOException $e) {
  // Print PDOException message
  echo $e->getMessage();
}
