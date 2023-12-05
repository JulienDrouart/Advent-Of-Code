<?php

$data = explode(PHP_EOL, file_get_contents("data.txt"));

echo '<pre>';
print_r($data);
echo '</pre>';

$sum = 0;

foreach ($data as $currentLine) {
    $currentLine = str_split(preg_replace("/[^0-9]/", '', $currentLine));
    $result = $currentLine[0] . $currentLine[count($currentLine) - 1];
    $sum += intval($result);
}

echo '<pre>';
print_r($sum);
echo '</pre>';
die('<br>stop');

