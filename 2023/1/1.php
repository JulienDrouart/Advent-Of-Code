<?php

$data = explode(PHP_EOL, file_get_contents("data.txt"));


$sum = 0;

foreach ($data as $currentLine) {
    $currentLine = str_split(preg_replace("/[^0-9]/", '', $currentLine));
    $result = $currentLine[0] . $currentLine[count($currentLine) - 1];
    $sum += intval($result);
}

echo '<pre>';
print_r($sum);
echo '</pre>';

// part 2

$sum = 0;


$arrayOfDays = array("one", "two", "three", "four", "five", "six", "seven", "eight", "nine");
foreach ($data as $currentLine) {
    $stringToCheck = null;
    $listOfCharacters = str_split($currentLine);
    foreach ($listOfCharacters as $char) {
        $stringToCheck .= $char;
        foreach ($arrayOfDays as $key => $day) {
            $stringToCheck = str_replace($day, ($key + 1) . $char, $stringToCheck);
        }
    }
    $currentLine = str_split(preg_replace("/[^0-9]/", '', $stringToCheck));
    $result = $currentLine[0] . $currentLine[count($currentLine) - 1];
    $sum += $result;
}

echo '<pre>';
print_r($sum);
echo '</pre>';
die();
