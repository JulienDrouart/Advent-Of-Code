<?php

$data = explode(PHP_EOL,file_get_contents("data.txt"));
$score = 0;

/*
A Rock
B Paper
C Scissors

X Rock
Y Paper
Z Scissors

1 for Rock, 2 for Paper, and 3 for Scissors
*/

foreach($data as $k => $v)
{
    $lineData = explode(" ",$v);
    if($lineData[0] == "A") //Rock
    {
        if($lineData[1] == "X") //Rock
        {
            $score += 3;
            $score += 1;
        }
        if($lineData[1] == "Y") //Paper
        {
            $score += 6;
            $score += 2;
        }
        if($lineData[1] == "Z") //Scissors
        {
            $score += 3;
        }
    }
    if($lineData[0] == "B") //Paper
    {
        if($lineData[1] == "X") //Rock
        {
            $score += 1;
        }
        if($lineData[1] == "Y") //Paper
        {
            $score += 3;
            $score += 2;
        }
        if($lineData[1] == "Z") //Scissors
        {
            $score += 6;
            $score += 3;
        }
    }
    if($lineData[0] == "C") //Scissors
    {
        if($lineData[1] == "X") //Rock
        {
            $score += 6;
            $score += 1;
        }
        if($lineData[1] == "Y") //Paper
        {
            $score += 2;
        }
        if($lineData[1] == "Z") //Scissors
        {
            $score += 3;
            $score += 3;
        }
    }
    echo "<pre>";
    print_r($lineData);echo "<br>";
print_r($score);
echo "<pre>";
}


echo "<pre>";
print_r("");
echo "<pre>";

