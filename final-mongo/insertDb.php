

<?php

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new MongoDB\Client(
    'mongodb+srv://' . $_ENV['MDB_USER'] . ':' . $_ENV['MDB_PASS'] . '@' . $_ENV['ATLAS_CLUSTER_SRV'] . '/?retryWrites=true&w=majority'
);


//check if there has been something posted to the server to be processed
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // need to process
    $recipeName = $_POST['recipeName'];
    $otherName = $_POST['otherName'];
    $description = $_POST['description'];
    $story = $_POST['story'];
    $numServing = $_POST['numServing'];
    $prepTime = $_POST['prepTime'];
    $cookingTime = $_POST['cookingTime'];

    $ingName = $_POST['ingNames'];
    $ingQty = $_POST['ingQties'];
    $ingQtyUnit = $_POST['ingQtyUnits'];

    $process = $_POST['process'];

    $tags = $_POST['tags'];

    // $otherTags = $_POST['otherTags'];
    $origin = $_POST['origin'];
    $authorName = $_POST['authorName'];
    $authorLocation = $_POST['authorLocation'];


    if ($_FILES) {
        //echo "file name: ".$_FILES['filename']['name'] . "<br />";
        //echo "path to file uploaded: ".$_FILES['filename']['tmp_name']. "<br />";
        $fname = $_FILES['filename']['name'];
        move_uploaded_file($_FILES['filename']['tmp_name'], "assets/images/" . $fname);
        $recipe = $client->selectCollection('BiteOfLove', 'recipe');



        $document = array(
            "recipeName" => $recipeName,
            "otherName" => $otherName,
            "description" => $description,
            "story" => $story,
            "numServing" => $numServing,
            "prepTime" => $prepTime,
            "cookingTime" => $cookingTime,

            "ing" =>  array(
                "ingNames" => $ingName,
                "ingQties" => $ingQty,
                "ingQtyUnits" => $ingQtyUnit
            ),

            "process" => $process,

            "allTags" => array(
                "tags" => $tags,
            ),

            "origin" => $origin,

            "authorName" => $authorName,
            "authorLocation" => $authorLocation,

            "image" => $fname,
        );

        $recipe->insertOne($document);
        // $recipe->insertMany($document);
        echo "Document inserted successfully";
        //package the data and echo back...
        /* make  a new generic php object (note:: php also supports objects - 
   but we are NOT doing that in this class - you can if you want ;)  )*/
        // $myPackagedData = new stdClass();
        // $myPackagedData->artist = $artist;
        // $myPackagedData->title = $title;
        // $myPackagedData->location = $loc;
        // $myPackagedData->description = $description;
        // $myPackagedData->creation_Date = $creationDate;
        // $myPackagedData->fileName = $fname;
        /* Now we want to JSON encode these values as a JSON string ..
    to send them to $.ajax success  call back function... */
        // $myJSONObj = json_encode($myPackagedData);
        // echo $myJSONObj;
        //  echo "done";
        exit();
    } //FILES
}//POST
