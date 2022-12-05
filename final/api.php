<?php
// create curl resource
$ch = curl_init();

$api_key = "IkErL35mXB9OFGmycHgGNGqHgIXP1SZwdVf4GTxM";

$var1 = "peas";

$url = "https://api.nal.usda.gov/fdc/v1/foods/search?api_key=$api_key&query=$var1";

// set url
curl_setopt($ch, CURLOPT_URL, $url);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);

// echo $output;

$dataAsObj = json_decode($output);

$foods = $dataAsObj->foods;
// echo (count($foods));
//var_dump($foods);
for ($i = 0; $i < count($foods); $i++) {
    echo ($foods[$i]->description);
    echo ("<br>");
    var_dump($foods[$i]->foodNutrients);
    echo ("<br>");
    echo ("888888888<br>");
}
