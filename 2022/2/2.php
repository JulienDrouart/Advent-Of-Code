<?php

$data = explode(PHP_EOL,file_get_contents("data.txt"));
$score = 0;

foreach($data as $k => $v)
{
    $lineData = explode(" ",$v);
    if($lineData[0] == "A") //Rock
    {
        if($lineData[1] == "X") //Rock
        {
            $score += 4;
        }
        if($lineData[1] == "Y") //Paper
        {
            $score += 8;
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
            $score += 5;
        }
        if($lineData[1] == "Z") //Scissors
        {
            $score += 9;
        }
    }
    if($lineData[0] == "C") //Scissors
    {
        if($lineData[1] == "X") //Rock
        {
            $score += 7;
        }
        if($lineData[1] == "Y") //Paper
        {
            $score += 2;
        }
        if($lineData[1] == "Z") //Scissors
        {
            $score += 6;
        }
    }

}
echo "<pre>";
print_r($score);
echo "<pre>";

/*
X means you need to lose, Y means you need to end the round in a draw, and Z means you need to win
1 for Rock, 2 for Paper, and 3 for Scissors
0 if you lost, 3 if the round was a draw, and 6 if you won
*/
$score = 0;
foreach($data as $k => $v)
{
    $lineData = explode(" ",$v);
    if($lineData[0] == "A") //Rock
    {
        if($lineData[1] == "X") //lose
        {
            $score += 3;
        }
        if($lineData[1] == "Y") //draw
        {
            $score += 4;
        }
        if($lineData[1] == "Z") //win
        {
            $score += 8;
        }
    }
    if($lineData[0] == "B") //Paper
    {
        if($lineData[1] == "X") //lose
        {
            $score += 1;
        }
        if($lineData[1] == "Y") //draw
        {
            $score += 5;
        }
        if($lineData[1] == "Z") //win
        {
            $score += 9;
        }
    }
    if($lineData[0] == "C") //Scissors
    {
        if($lineData[1] == "X") //lose
        {
            $score += 2;
        }
        if($lineData[1] == "Y") //draw
        {
            $score += 6;
        }
        if($lineData[1] == "Z") //win
        {
            $score += 7;
        }
    }
}

echo "<pre>";
print_r($score);
echo "<pre>";

