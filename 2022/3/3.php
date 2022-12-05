<?php

$data = explode(PHP_EOL,file_get_contents("data.txt"));
$prioritiesSum = 0;
foreach($data as $k => $v)
{
    $explodedData = str_split($v,strlen($v)/2);
    $itemType = array_values(array_intersect(str_split($explodedData[0]),str_split($explodedData[1])))[0]; //find the duplicates in both part
    $alphabet = array_merge(range('a', 'z'),range('A', 'Z')); //create the alphabet array
    $alphabet = array_combine(range(1, count($alphabet)), array_values($alphabet)); //increase all index by 1
    $prioritiesSum += array_search($itemType,$alphabet);
}

$prioritiesSum = 0;
$i = 0;
$array = array();
$arrayKey = 0;
foreach($data as $k => $v)
{
    $array[$arrayKey][] = $v; 
    if($i== 2)
    {
        
        $itemType = array_values(array_intersect(str_split($array[$arrayKey][0]),str_split($array[$arrayKey][1]),str_split($array[$arrayKey][2])))[0]; //find the duplicates in both part
        $alphabet = array_merge(range('a', 'z'),range('A', 'Z')); //create the alphabet array
        $alphabet = array_combine(range(1, count($alphabet)), array_values($alphabet)); //increase all index by 1
        $prioritiesSum += array_search($itemType,$alphabet);
        $arrayKey++;
        $i=0;
        continue;
    }
    $i++;
}
echo "<pre>";
print_r($prioritiesSum);
echo "<pre>";

