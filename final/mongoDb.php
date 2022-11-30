<?php

//echo(phpinfo());

require_once __DIR__ . '/vendor/autoload.php';
//    require DIR . '/vendor/mongodb/mongodb/src/functions.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


// $client = new MongoDB\Client(
//     'mongodb+srv://leanne:anegg@cluster0.m8aaynh.mongodb.net/?retryWrites=true&w=majority'
// );

$client = new MongoDB\Client(
    'mongodb+srv://' . $_ENV['MDB_USER'] . ':' . $_ENV['MDB_PASS'] . '@' . $_ENV['ATLAS_CLUSTER_SRV'] . '/?retryWrites=true&w=majority'
);



//      $db = $client->test;
$recipe = $client->selectCollection('BiteOfLove', 'recipe');
$document = $recipe->findOne(['recipeName' => 'omelet']);

var_dump($document);

echo "hhhhh";
echo $document['recipeName'];

//  var_dump($colorGrps);
