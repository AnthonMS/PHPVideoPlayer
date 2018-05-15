<?php
/**
 * Created by PhpStorm.
 * User: Anthon
 * Date: 13-05-2018
 * Time: 12:45
 */

session_start();
if (empty($_SESSION["username"]))
{
    include ("Includes/login_form.php");
} else {
    echo "<a href='Includes/logout.php' id='logoutBtn'>Logout</a>";
}

?>

<html>
<head>
    <title>Watch Episode</title>
    <meta charset="UTF-8">
    <script src="js/js.js"></script>
</head>
<body>

<div class="centerStyle_noMarg">
    <button id="testBtn">Next video</button>

    <?php

    /*echo getcwd() . "<br>";
    $dir = "media/series";
    $files = scandir($dir);
    foreach ($files as $file)
    {
        echo $file."<br>";
        if ($file == "south_park")
        {
            echo "Yay it found it!";
        }
    }*/


    if (isset($_GET["watch"]))
    {
        if (isset($_GET["season"]))
        {
            if (isset($_GET["episode"]))
            {
                $orgSeries = checkInput($_GET["watch"]);
                $orgSeries = mysqli_real_escape_string($connect, $orgSeries);

                $series = str_replace("_", " ", $orgSeries, $count);
                $season = checkInput($_GET["season"]);
                $season = mysqli_real_escape_string($connect, $season);
                $episode = checkInput($_GET["episode"]);
                $episode = mysqli_real_escape_string($connect, $episode);

                $fileName = "$series S$season"."E$episode";

                //echo "$series, $season, $episode";
                $sql = "SELECT episode_title, last_episode, last_season FROM `episodes_new` WHERE episode_no='$episode' AND serie_title='$orgSeries' AND season_no='$season'";
                $result = $connect->query($sql);
                if ($result->num_rows > 0)
                {
                    $row = $result->fetch_assoc();
                    $episode_title = $row['episode_title'];
                    $lastEpisode = $row['last_episode'];
                    $lastSeason = $row['last_season'];
                }


                echo "<h3 class='watchTitle'>$episode_title</h3>";

                $numOfEpisodes = $_GET['numOfEpisodes'];
                $numOfSeasons = $_GET['numOfSeasons'];

                echo    "<div class='video_container'>
                            <video id='videoID' width='960' height='540' controls autoplay data-episode='$episode' data-season='$season' data-lastseason='$lastSeason' data-lastepisode='$lastEpisode' data-numOfEpisodes='$numOfEpisodes' data-numOfSeasons='$numOfSeasons'>
                                <source src='media/series/$orgSeries/$fileName.mp4' type='video/mp4'>
                                Your browser does not support the video tag.
                            </video>
                        </div>";

                // Make table with all the episodes and seasons, so the user can switch easily
                include ("show_episodes.php");


            } else { echo "Error!"; }
        } else { echo "Error!"; }
    }
    else { echo "Error!"; }
    ?>


</div>


<script>
    var baseSrc = "media/series/";
    var vid = document.getElementById("videoID");
    var vidSource = vid.getElementsByTagName('source')[0];

    var seaNo = vid.getAttribute('data-season');
    var nextSea = seaNo;
    var prevSea = seaNo;
    var epiNo = vid.getAttribute('data-episode');
    var nextEpi = epiNo;
    var prevEpi = epiNo;
    //var numOfEpisodes = getQueryStringParam('numOfEpisodes');
    var numOfEpisodes = document.getElementById('episodesHolder').getAttribute("data-numOfEpisodes");
    var numOfSeasons = getQueryStringParam('numOfSeasons')

    //console.log(numOfSeasons + ", " + numOfEpisodes);

    window.onload = windowLoad();

    function windowLoad() {
        //console.log("numOfEpisodes: " + numOfEpisodes + ", numOfSeasons: " + numOfSeasons);
        //if (epiNo < numOfEpisodes) {
            // Current episode is lower than number of episodes
            nextEpi++;
        //}

       // if (seaNo < numOfSeasons) {
            nextSea++;
        //}

        if (epiNo != 1) {
            prevEpi--;
        }

        if (seaNo != 1) {
            prevSea--;
        }

        //console.log("PrevSea: " + prevSea + ", PrevEpi: " + prevEpi);
        //console.log("CurrentSea: " + seaNo + ", CurrentEpi: " + epiNo);
        //console.log("NextSea: " + nextSea + ", NextEpi: " + nextEpi);
    }

    $('#testBtn').click(function () {
        loadNextEpisode();
    });

    vid.onended = function (event)
    {
        // This will change to the next episode automatically
        //loadNextEpisode();
    }

    function loadNextEpisode() {

        // Get URL param for series
        var orgWatch = getQueryStringParam("watch");
        // Replace _ with spaces
        var fixedTitle = orgWatch.replace("_", " ");
        // Create the newSrc
        var newSrc = baseSrc + orgWatch;

        //console.log("Episode: " + epiNo+ ", Season: " + seaNo);

        // Check if next Episode is larger than total number of episodes
        if (nextEpi > numOfEpisodes) {
            // If it is, set the new Episode to episode 1
            epiNo = 1;
            nextEpi = 1;
            seaNo++;
            nextSea++;

            // Call method that changes url params to the next season and fist episode
            updateQueryStringParam("season", seaNo);
            updateQueryStringParam("episode", epiNo);
            window.location.reload(false);
        } else {
            // Append the next episode to the new source
            newSrc = newSrc + "/" + fixedTitle + " S" + seaNo + "E" + nextEpi + ".mp4";

            console.log(newSrc);

            // Set the new source on the video player
            vidSource.setAttribute("src", newSrc);
            // Load the new source
            vid.load();
            // Play the new source
            vid.play();
            // Update episode in url, but don't reload.
            updateQueryStringParam("episode", nextEpi);


            //console.log("Episode: " + epiNo+ ", Season: " + seaNo);
        }

        //console.log("Episode: " + epiNo+ ", Season: " + seaNo);

        epiNo++; nextEpi++;
    }


</script>