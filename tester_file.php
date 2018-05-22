<?php
/**
 * Created by PhpStorm.
 * User: ASteiness
 * Date: 21-01-2018
 * Time: 21:07
 */

?>

<html>
<head>
    <title>Testing</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/tester_style.css">

</head>
<body>

<h1>This is tester_file.php</h1>
<?php

$myfile = fopen("TxtFiles/testfile.txt", "r") or die("Unable to open file");

$lineArray = array();


while(!feof($myfile))
{
    $line = fgets($myfile);
    //echo $line[0] . "<br>";
    if ($line[0] !== "/")
    {
        //echo $line . "<br>";
        $lineArray[] = $line;
    }

}
$dataArray = array();

foreach ($lineArray as $line)
{
    $temp = explode(",- ", $line);
    array_push($dataArray, $temp);
}
$sqlString = "INSERT INTO episodes_new (episode_no, episode_title, season_no, serie_title, numOfEpisodes, last_episode, last_season) VALUES ";
//$sqlString.= " VALUES ('$epiNo', '$epiTitle', '$season', '$series', '$numOfEpisodes', '1', '0')";

$arrLength = count($dataArray);
for ($i = 0; $i < $arrLength; $i++)
{
    $sqlString .= "(";
    $seriesTitle = "'" . $dataArray[$i][0] . "', ";
    $seasonNumber = "'" . $dataArray[$i][1] . "', ";
    $episodeNumber = "'" . $dataArray[$i][2] . "', ";
    $episodeTitle = "'" . $dataArray[$i][3] . "', ";
    $numberOfEpisodes = "'" . $dataArray[$i][4] . "', ";
    $lastEpisode = "'" . $dataArray[$i][5] . "', ";
    $lastSeason = "'" . $dataArray[$i][6][0] . "'";
    //echo $seriesTitle . " - " . $seasonNumber . " - " . $episodeNumber . " - " . $episodeTitle . " - " . $numberOfEpisodes . " - " . $lastEpisode . " - " . $lastSeason . "<br>";

    //$sqlString .= "'" . $episodeNumber . "', '" . $episodeTitle . "', '" . $seasonNumber . "', '" . $seriesTitle . "', '" . $numberOfEpisodes . "', '" . $lastEpisode . "', '" . $lastSeason . "'";
    $sqlString .= $episodeNumber . $episodeTitle . $seasonNumber . $seriesTitle . $numberOfEpisodes . $lastEpisode . $lastSeason;

    //$sqlString .= "), ";

    //echo "test <br>";
    if ($i == $arrLength - 1)
    {
        $sqlString .= ");";
    }
    else
    {
        $sqlString .= "), ";
    }
}

echo $sqlString;
$connect->query($sqlString);

fclose($myfile);




























?>