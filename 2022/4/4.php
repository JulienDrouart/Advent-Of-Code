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

$result = 0;

foreach($data as $k => $v)
{

    $explodedData = explode(",",$v);
    
    $range1min = explode("-",$explodedData[0])[0];
    $range1max = explode("-",$explodedData[0])[1];
    $range2min = explode("-",$explodedData[1])[0];
    $range2max = explode("-",$explodedData[1])[1];
    $range1 = range($range1min,$range1max); 
    $range2 = range($range2min,$range2max);

    if(count(array_intersect($range1,$range2)) > 0)
    {
        $result++;
    }
}

echo "<pre>";
print_r($result);
echo "</pre>";

