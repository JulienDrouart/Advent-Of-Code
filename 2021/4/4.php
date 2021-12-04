<?php

$listOfNumbers = array(73,42,95,35,13,40,99,92,33,30,83,1,36,93,59,90,55,25,77,44,37,62,41,47,80,23,51,61,21,20,76,8,71,34,58,5,52,22,39,57,17,2,26,0,10,72,19,3,64,65,82,46,31,63,91,24,18,12,9,79,50,98,69,4,78,54,43,68,87,7,67,48,28,89,94,53,85,81,49,88,6,96,29,56,97,66,38,16,32,70,74,27,84,86,45,75,60,15,14,11);
$grids = parseGrids(file_get_contents("grids.txt"));

$listOfNumbers = array(7,4,9,5,11,17,23,2,0,14,21,24,10,16,13,6,15,25,12,22,18,20,8,19,3,26,1);
$grids = parseGrids("22 13 17 11  0
8  2 23  4 24
21  9 14 16  7
6 10  3 18  5
1 12 20 15 19

3 15  0  2 22
9 18 13 17  5
19  8  7 25 23
20 11 10 24  4
14 21 16 12  6

14 21 17 24  4
10 16 15  9 19
18  8 23 26 20
22 11 13  6  5
2  0 12  3  7");

/*$gridWinId = 0;
$numberEnd = 0;
foreach($listOfNumbers as $number)
{
    foreach($grids as $keyGrid => $grid)
    {
        foreach($grid as $keyLine => $line)
        {
            foreach($line["number"] as $kk => $vv)
            {
                if($vv == $number)
                {
                    $grids[$keyGrid][$keyLine]["tiré"][$kk] = 1;
                }
            }
            $gridWin = checkIfGridWin($grids[$keyGrid]);
            if($gridWin == true)
            {
                $numberEnd = $number;
                $gridWinId = $keyGrid;
                goto end;
            }
        }
    }
}

end:
$sum = 0;
foreach($grids[$gridWinId] as $key => $line)
{
    foreach($line["tiré"] as $kk => $lineDetails)
    {
        if($lineDetails == 0)
        {
            $sum+=$grids[$gridWinId][$key]["number"][$kk];
        }
    }
}
print("1 => ".$sum*$number);echo"<br>";
*/
// PART 2
$gridWinId = 0;
$numberEnd = 0;
$gridToWin = array();
foreach($listOfNumbers as $number)
{
    foreach($grids as $keyGrid => $grid)
    {
        foreach($grid as $keyLine => $line)
        {
            foreach($line["number"] as $kk => $vv)
            {
                if($vv == $number)
                {
                    $grids[$keyGrid][$keyLine]["tiré"][$kk] = 1;
                }
            }
            
        }
        $gridWin = checkIfGridWin($grids[$keyGrid]);
        if($gridWin == true)
        {
            print_r($number);echo"<br>";
            if(!in_array($keyGrid,$gridToWin))
            {
                $numberEnd = $number;
                $gridToWin[] = $keyGrid;
                echo"<pre>";
                print_r($gridToWin);
                echo"</pre>";
            }
            
        }
    }
}
echo"<pre>";
print_r($numberEnd);
echo"</pre>";
die;
$sum = 0;
foreach($grids[$gridWinId] as $key => $line)
{
    foreach($line["tiré"] as $kk => $lineDetails)
    {
        if($lineDetails == 0)
        {
            $sum+=$grids[$gridWinId][$key]["number"][$kk];
        }
    }
}
print("2 => ".$sum*$number);

function checkIfGridWin($grid)
{

    foreach($grid as $k => $line)
    {
        //recherche par ligne
        $elementByLine = array_count_values($line["tiré"]);
        if($elementByLine == array(1=>5))
        {
            return true;
        }
        $elementByColumn =array(); //recherche par colonne
        for($i=0;$i<5;$i++)
        {
            $elementByColumn[$i] = $line["number"][$i];
        }
        $elementByColumnArray = array_count_values($elementByColumn);
        if($elementByColumnArray == array(1 => 5))
        {
            return true;
        }
        
    }
    return false;
}

function parseGrids($gridsFile)
{
    $gridsFileParsed= explode(PHP_EOL.PHP_EOL,$gridsFile);
    foreach($gridsFileParsed as $k => $grid)
    {
        $gridParsed= explode(PHP_EOL,$grid);
        foreach($gridParsed as $kk => $line)
        {
            $gridsFileParsedResult[$k][$kk]["number"]= explode(" ",str_replace("  ", " ",$line));
            $gridsFileParsedResult[$k][$kk]["tiré"][4] =  $gridsFileParsedResult[$k][$kk]["tiré"][3] = $gridsFileParsedResult[$k][$kk]["tiré"][2] = $gridsFileParsedResult[$k][$kk]["tiré"][1] = $gridsFileParsedResult[$k][$kk]["tiré"][0] = 0;
        }
    }
    return array_filter($gridsFileParsedResult);
}



