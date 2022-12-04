<?php

$grids = explode(PHP_EOL,file_get_contents("data.txt"));
$formattedArray = array(0 => 0);

$indexOfFormattedArray = 0;
for($i=0;$i<count($grids);$i++)
{
    if($grids[$i] == null)
    {
        $indexOfFormattedArray++;
        $formattedArray[$indexOfFormattedArray] = 0;
    }else{
        $formattedArray[$indexOfFormattedArray] += $grids[$i];
    }
}

rsort($formattedArray);

echo "<pre>";
print_r("p1 ".$formattedArray[0]);
echo "<pre>";

echo "<pre>";
print_r("p1 ".($formattedArray[0]+$formattedArray[1]+$formattedArray[2]));
echo "<pre>";

