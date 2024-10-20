<?php

/*$fakeData = "Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue
Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red
Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red
Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green";
$data = explode(PHP_EOL, $fakeData);*/

$data = explode(PHP_EOL, file_get_contents("data.txt"));


$possibleSum = 0;

$check = array("red" => 12, "green" => 13, "blue" => 14);
$colors = array("red", "green", "blue");
foreach ($data as $keyLine => $currentLine) {
    $currentLineExploded = explode(":",$currentLine);
    $listOfTirage = explode(";", $currentLineExploded[1]);
    $tirageArray = [];
    $maxTirage = array("red" => 0, "green" => 0, "blue" => 0);
    foreach($listOfTirage as $key => $tirage){
        $tirageExploded = explode(",", $tirage);
        
        foreach ($tirageExploded as $element) {
            $elementParts = explode(" ",trim($element));

            if($elementParts[0] > $maxTirage[$elementParts[1]]){
                $maxTirage[$elementParts[1]] = $elementParts[0];
            }
        }
    }
    $state = true;
    foreach ($check as $color => $limit) {
        if (isset($maxTirage[$color]) && $maxTirage[$color] > $limit) {
            $state = false;
            break;
        }
    }
    if($state){
        $possibleSum += ($keyLine+1);
    }
}
/*
echo '<pre>';
print_r($possibleSum);
echo '</pre>';
*/
// part 2


$possibleSum = 0;

$check = array("red" => 12, "green" => 13, "blue" => 14);
$colors = array("red", "green", "blue");
$multiply = array();
foreach ($data as $keyLine => $currentLine) {
    $currentLineExploded = explode(":",$currentLine);
    $listOfTirage = explode(";", $currentLineExploded[1]);
    $tirageArray = [];
    $maxTirage = array("red" => 0, "green" => 0, "blue" => 0);
    foreach($listOfTirage as $key => $tirage){
        $tirageExploded = explode(",", $tirage);
        
        foreach ($tirageExploded as $element) {
            $elementParts = explode(" ",trim($element));

            if($elementParts[0] > $maxTirage[$elementParts[1]]){
                $maxTirage[$elementParts[1]] = $elementParts[0];
            }
        }
    }
    $state = true;
    $multiply[] =array_product($maxTirage);

}



echo '<pre>';
print_r(array_sum($multiply));
echo '</pre>';
