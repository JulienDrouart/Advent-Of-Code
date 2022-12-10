<?php

$data = explode(PHP_EOL,file_get_contents("data.txt"));
$result = 0;

foreach($data as $k => $v)
{

    $explodedData = explode(",",$v);

    $range1min = explode("-",$explodedData[0])[0];
    $range1max = explode("-",$explodedData[0])[1];
    $range2min = explode("-",$explodedData[1])[0];
    $range2max = explode("-",$explodedData[1])[1];
    
    if($range1min <= $range2min && $range1max >= $range2max || $range1min >= $range2min && $range1max <= $range2max)
    {
        $result++;
    }
}


echo "<pre>";
print_r($result);
echo "</pre>";

