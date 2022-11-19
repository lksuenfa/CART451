<?php

//echo(phpinfo());

require_once __DIR__ . '/vendor/autoload.php';
//    require DIR . '/vendor/mongodb/mongodb/src/functions.php';


$client = new MongoDB\Client(
    'mongodb+srv://leanne:anegg@cluster0.m8aaynh.mongodb.net/?retryWrites=true&w=majority'

);

//      $db = $client->test;
$recipe = $client->selectCollection('BiteOfLove', 'recipe');
$document = $recipe->findOne(['name' => 'omelet']);

var_dump($document);

//  var_dump($colorGrps);
