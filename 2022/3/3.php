<?php

$data = explode(PHP_EOL,file_get_contents("data.txt"));
/*$data = explode(PHP_EOL,"vJrwpWtwJgWrhcsFMMfFFhFp
jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL
PmmdzqPrVvPwwTWBwg
wMqvLMZHhHMvwLHjbvcjnnSBnvTQFn
ttgJtRGJQctTZtZT
CrZsJsPPZsGzwwsLwLmpwMDw");*/
$prioritiesSum = 0;
foreach($data as $k => $v)
{
    $explodedData = str_split($v,strlen($v)/2);
    $itemType = array_values(array_intersect(str_split($explodedData[0]),str_split($explodedData[1])))[0]; //find the duplicates in both part
    $alphabet = array_merge(range('a', 'z'),range('A', 'Z')); //create the alphabet array
    $alphabet = array_combine(range(1, count($alphabet)), array_values($alphabet)); //increase all index by 1
    $prioritiesSum += array_search($itemType,$alphabet);
}

echo "<pre>";
print_r($prioritiesSum);
echo "<pre>";

