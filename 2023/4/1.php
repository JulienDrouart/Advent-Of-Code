<?php

// $fakeData = "Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53
// Card 2: 13 32 20 16 61 | 61 30 68 82 17 32 24 19
// Card 3:  1 21 53 59 44 | 69 82 63 72 16 21 14  1
// Card 4: 41 92 73 84 69 | 59 84 76 51 58  5 54 83
// Card 5: 87 83 26 28 32 | 88 30 70 12 93 22 82 36
// Card 6: 31 18 13 56 72 | 74 77 10 23 35 67 36 11";
// $data = explode(PHP_EOL, $fakeData);
// echo '<pre>'; print_r($data); echo '</pre>';
$totalOfPoints = 0;


$data = explode(PHP_EOL, file_get_contents("data.txt"));


foreach($data as $line)
{
    $explodedLine = trim(explode(":", $line)[1]);
    $arrayOfValues = explode(" | ", $explodedLine);
    $winningNumbers = explode(" ", $arrayOfValues[0]);
    $yourNumbers = explode(" ", $arrayOfValues[1]);
    $yourNumbers = array_filter($yourNumbers, fn($value) => !is_null($value) && $value !== '');

    $totalOfPoints += pow(2,(count(array_intersect($winningNumbers, $yourNumbers))-1));    // retourne les élements présent du tableau winning dans le tableau your numbers
    
}
echo '<pre>'; print_r($totalOfPoints); echo '</pre>';

// part 2

$totalOfCards = 0;
$cardsList = count($data)+1;
for($i = 1; $i < $cardsList; $i++)
{
    $scrachCardsToCheck[$i] = 1;
}
foreach($data as $cardLine => $line)
{

    $cardNumber = explode(":", $line)[0];
    
    $explodedLine = trim(explode(":", $line)[1]);
    
    $arrayOfValues = explode(" | ", $explodedLine);
    $winningNumbers = explode(" ", $arrayOfValues[0]);
    $yourNumbers = explode(" ", $arrayOfValues[1]);
    $yourNumbers = array_filter($yourNumbers, fn($value) => !is_null($value) && $value !== ''); //suppression des valeurs null

    $numberOfMatching = count(array_intersect($winningNumbers, $yourNumbers));   

    for($i = 1; $i <= $numberOfMatching; $i++)
    {
        $currentCardNumber = explode("Card ",$cardNumber)[1];
        // répéter l'opération ici autant de fois que la carte courante est présente dans le tableau $scrachCardsToCheck
        $scrachCardsToCheck[$cardLine+$i+1] += $scrachCardsToCheck[$cardLine+1];
        
    }
    
}
echo '<pre>'; print_r(array_sum($scrachCardsToCheck)); echo '</pre>';
