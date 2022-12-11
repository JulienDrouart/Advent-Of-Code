<?php

$data = explode(PHP_EOL.PHP_EOL,file_get_contents("data.txt"));

$result = "";
$cargoArray = array();

$cargo = explode(PHP_EOL,$data[0]);
foreach($cargo as $k => $lineCargo)
{
    $explodedLine = str_split($lineCargo,4);
    foreach($explodedLine as $keyExplodedLine => $valueExplodedLine)
    {
        $letter = substr($valueExplodedLine,1,1);
        if (ctype_alpha($letter))
        {
            $cargoArray[$keyExplodedLine+1][] = $letter;
        }
    }
}
ksort($cargoArray);
$cargoArrayoriginal = $cargoArray;
$data[1] = explode(PHP_EOL,$data[1]);

foreach($data[1] as $key => $dataLine)
{
    $explodedLine = explode(" from ",$data[1][$key]);
    $numberOfCratesToMove = str_replace("move ", "",$explodedLine[0]);
    $explodedOriginAndDirection = explode(" to ",$explodedLine[1]);
    $origin = $explodedOriginAndDirection[0];
    $direction = $explodedOriginAndDirection[1];
    $partToMove = array_slice($cargoArray[$origin],0,$numberOfCratesToMove);
    array_splice($cargoArray[$origin],0,$numberOfCratesToMove); //remove to origin
    
    foreach($partToMove as $singlePartToMove)
    {
        array_unshift($cargoArray[$direction],$singlePartToMove); //add to direction
    }
}
foreach($cargoArray as $keyCargoArray => $lineCargoArray)
{
    $result .= $lineCargoArray[0];
}
echo "<pre>";
print_r($result);echo "<br>";
echo "</pre>";
$cargoArray = $cargoArrayoriginal;
$result = "";
foreach($data[1] as $key => $dataLine)
{
    $explodedLine = explode(" from ",$data[1][$key]);
    $numberOfCratesToMove = str_replace("move ", "",$explodedLine[0]);
    $explodedOriginAndDirection = explode(" to ",$explodedLine[1]);
    $origin = $explodedOriginAndDirection[0];
    $direction = $explodedOriginAndDirection[1];
    $partToMove = array_slice($cargoArray[$origin],0,$numberOfCratesToMove);
    array_splice($cargoArray[$origin],0,$numberOfCratesToMove); //remove to origin

    $partToMove = array_reverse($partToMove);
    
    foreach($partToMove as $singlePartToMove)
    {
        array_unshift($cargoArray[$direction],$singlePartToMove); //add to direction
    }
}
foreach($cargoArray as $keyCargoArray => $lineCargoArray)
{
    $result .= $lineCargoArray[0];
}

echo "<pre>";
print_r($result);
echo "</pre>";

